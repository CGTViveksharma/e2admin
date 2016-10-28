   //submit themes form
   jQuery('body').on('beforeSubmit', 'form#form_themes', function() {
       var form = jQuery(this);

       if (form.find('.has-error').length) {
           return false;
       }
       var formData = new FormData($('form#form_themes')[0]);
       formData._csrf =  $('meta[name="csrf-token"]').attr("content");
       jQuery.ajax({
           url: form.attr('action'),
           data: formData,
           type: 'post',
           success: function(response) {
               if (response.status == true) {
                   jQuery('#main_content').find('div.success-message').html(response.message).show();
                   jQuery('div#create_themes_modal').modal('hide');
               }
           },
           cache: false,
           contentType: false,
           processData: false
       });
       return false;
   });

   //on grid view load complete bind elements
   $(document).on('pjax:complete', function() {
       lateBinding();
   });

   //handle themes delete request here
   var handleDeleteRequest = function(e) {
       e.preventDefault();
       var el = jQuery(this);
       bootbox.confirm({
           message: "Are you sure you want to delete this item?",
           buttons: {
               confirm: {
                   label: 'Yes',
                   className: 'btn-success'
               },
               cancel: {
                   label: 'No',
                   className: 'btn-danger'
               }
           },
           callback: function(result) {
               if (result == true) {
                   $.post(el.attr('href'), {}, function(response) {
                       if (response.status == true) {
                           //success alert
                           bootbox.alert({
                               message: "Item deleted",
                               className: 'bootbox-success',
                               backdrop: true
                           });
                           //refresh gridview 
                           pjax_container = jQuery('div[data-pjax-container]').attr('id');
                           jQuery.pjax.reload({ container: '#' + pjax_container });
                       }
                   });
               }
           }
       });
   };

   //bind elements after rendering
   lateBinding = function() {
       // create themes button handler
       jQuery('a#apply_theme').on('click', function(e) {
           e.preventDefault();
           jQuery('div#create_themes_modal').modal('show');
       });

       //handler for delete action button in grid view
       jQuery('a.delete-themes').on('click', handleDeleteRequest);
   }


   //on page load call to bind all
   lateBinding();