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
use yii\data\ActiveDataProvider;

class PermissionController extends \yii\web\Controller
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
                        'actions' => ['index','create','update','view','delete'],
                        'roles' => ['admin'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }
    
    /**
    * Lists all User  permissions, return auth item models.
    * @return mixed
    */
    public function actionIndex()
    {
        $searchModel = new AuthItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['type' => 2]);
        $data =[
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        ];
        
        return $this->render('index',$data);
    }

    /**
    * Lists all User  permissions, return auth item models.
    * @return mixed
    */
    public function actionUpdate($permission)
    {
        $modelAuthItem =  AuthItem::find()->where(['type' => 2,'name' => $permission])->one();

        if (!empty(Yii::$app->request->post()) && $modelAuthItem->validate()) {
                $model = Yii::$app->request->post('AuthItem');
                //create an instance of new permission item 
                $new_permission = new yii\rbac\Item;
                $new_permission->name = $model[0]['name'];
                $new_permission->description = $model[0]['description'];
                $new_permission->type = 2;
                //update permission item with old name and new permission object
                Yii::$app->authManager->update($permission,$new_permission);
                //set flash for success message
                Yii::$app->session->setFlash('success_message','Success! Permission updated.');
                //redirect to index
                $this->redirect('index');
        }
        return $this->render('update',[
        'modelAuthItem' => [$modelAuthItem],
        ]);
    }
    
    
    /**
    * Creates a new User model.
    * If creation is successful, the browser will be redirected to the 'index' page.
    * @return mixed
    */
    
    public function actionCreate()
    {
        $modelAuthItem = [new AuthItem];

        if (!empty(Yii::$app->request->post())) {
            
            //create multiple instances of auth item child model
            $modelAuthItem = Model::createMultiple(AuthItem::classname());
            //load post data in all instances of auth item child model
            $modelAuthItem = Model::loadMultiple($modelAuthItem, Yii::$app->request->post('AuthItem'));
            $authManager = Yii::$app->authManager;

            foreach ($modelAuthItem as $index => $each) {
                // add new permission using auth Manager
                if(!empty($each->name) && empty($authManager->getPermission($each->name))){
                    $permission = $authManager->createPermission($each->name);
                    $permission->description = $each->description;
                    $authManager->add($permission);
                }
            }
            //set flash for success message
            Yii::$app->session->setFlash('success_message','Success! Permission created.');
            $this->redirect('index');
        }
        
        return $this->render('create', [
        'modelAuthItem' => (empty($modelAuthItem)) ? [new AuthItem] : $modelAuthItem,
        ]);
    }

     /**
     * Deletes an existing Permission.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $permission
     * @return mixed
     */
    public function actionDelete($permission)
    {
        $authManager = Yii::$app->authManager;
        $model =  AuthItemChild::find()->select('auth_item_child.parent')->where(['child' => $permission])->all();
        if(empty($model)){
            $authPermission = $authManager->getPermission($permission);
            $authManager->remove($authPermission);
            Yii::$app->session->setFlash('permissionDeleted','Success! Permission "'.$permission.'" deleted.');
        }
        else{
            Yii::$app->session->setFlash('permissionDeleteFail','Permission "'.$permission.'" can\'t be deleted, it is assigned to roles');
        }
        return $this->redirect(['index']);
    }
}