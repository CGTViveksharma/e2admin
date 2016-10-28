<?php

namespace backend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\base\Controller;
use backend\models\Model;
use backend\models\AuthItem;
use backend\models\AuthItemChild;
use backend\models\AuthItemSearch;
use backend\models\User;
use yii\data\ActiveDataProvider;

class RolesController extends \yii\web\Controller
{
        
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index','create','update','view','delete'],
                        'rules' => [
                            // allow authenticated users
                            [
                                'allow' => true,
                                'roles' => ['admin'],
                            ],
                            // everything else is denied
                        ],
                    ],          
        ];
    }

    /**
     * Lists all User  roles, return auth item models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new AuthItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['type' => 1]);
        $data =[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ];

        return $this->render('index',$data);
    }       


    /**
     * Lists all User  roles, return auth item models.
     * @return mixed
     */
    public function actionUpdate($role)
    {
        $modelAuthItem = new AuthItem();

        if ($modelAuthItem->load(Yii::$app->request->post())) {
            //create multiple instances of auth item child model
            $modelAuthItemChild = Model::createMultiple(AuthItemChild::classname());
            //load post data in all instances of auth item child model
            $modelAuthItemChild = Model::loadMultiple($modelAuthItemChild, Yii::$app->request->post('AuthItemChild'));

            // set type attribute for auth item model and validate
            $modelAuthItem->type = 1;
            $valid = $modelAuthItem->validate();

            if ($valid) {

                        $old_role = Yii::$app->request->post('old_role');
                        //update user role
                        $authManager = Yii::$app->authManager;
                        
                        //create an instance of new role item 
                        $new_role = new yii\rbac\Item;
                        $new_role->name = $modelAuthItem->name;
                        $new_role->description = $modelAuthItem->description;
                        $new_role->type = 1;
                        //update role item with old name and new role object
                        if (Yii::$app->authManager->update($old_role,$new_role)) {
                            $AuthItemChilds =  Yii::$app->request->post('AuthItemChild');
                            $authManager->removeChildren($new_role);
                            foreach ($AuthItemChilds as $each) {
                                   $permission = $authManager->getPermission($each['name']);
                                   $authManager->addChild($new_role,$permission);
                            }
                            Yii::$app->session->setFlash('updatedPermission','Success! Permission updated.');
                        }
                         return $this->redirect(['index']);
                        
        }
        }

        //get auth item child model rows related to auth item model
        $authItemChild =  AuthItemChild::find()->select('auth_item.name')->rightJoin('auth_item', '`auth_item_child`.`child` = `auth_item`.`name`')->where(['auth_item_child.parent' => $role])->all();
        $data =[
            'modelAuthItem' => $modelAuthItem->find()->where(['name'=>$role])->one(),
            'modelAuthItemChild' => !empty($authItemChild) ? $authItemChild : [new AuthItemChild],
            'permissionsList' => AuthItem::find()->where(['type' => 2])->all()
        ];
        
        return $this->render('update',$data);
    }       


  /**
    * Creates a new User model.
    * If creation is successful, the browser will be redirected to the 'index' page.
    * @return mixed
    */

   public function actionCreate()
    {
        $modelAuthItem = new AuthItem;
        $modelAuthItemChild = [new AuthItemChild];

        if ($modelAuthItem->load(Yii::$app->request->post())) {

            //create multiple instances of auth item child model
            $modelAuthItemChild = Model::createMultiple(AuthItemChild::classname());
            //load post data in all instances of auth item child model
            $modelAuthItemChild = Model::loadMultiple($modelAuthItemChild, Yii::$app->request->post('AuthItemChild'));

            // set type attribute for auth item model and validate
            $modelAuthItem->type = 1;
            $valid = $modelAuthItem->validate();

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelAuthItem->save(false)) {
                        foreach ($modelAuthItemChild as $index => $each) {

                            if ($flag === false) {
                                break;
                            }

                            //save auth item child model
                            $each->parent = $modelAuthItem->name;
                            $each->child = $each->name;

                            if (!($flag = $each->save(false))) {
                                break;
                            }

                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'modelAuthItem' => $modelAuthItem,
            'modelAuthItemChild' => empty($modelAuthItemChild) ? [new AuthItemChild] : $modelAuthItemChild,
            'permissionsList' => AuthItem::find()->where(['type' => 2])->all()
        ]);
    }


    /**
     * Deletes an existing Role.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $role
     * @return mixed
     */
    public function actionDelete($role)
    {
        $authManager = Yii::$app->authManager;
        $authrole = $authManager->getRole($role);
        $assignedUsers  = $authManager->getUserIdsByRole($role);
        if(empty($assignedUsers)){
            Yii::$app->session->setFlash('roleDeleted','Success! Role "'.$role.'" deleted.');
            $authManager->remove($authrole);
        }
        else{
            Yii::$app->session->setFlash('roleDeleteFail','Role "'.$role.'" can\'t be deleted, it is assigned to users');
        }
        return $this->redirect(['index']);
    }

}
