	
(function($) {
    "use strict";

	//--------------------------- Login Form --------------------------
	/*
  $("#login-form").validate({
  	rules: {
      username: "required",
    },
  	errorClass: "form-invalid"
  });*/
  
	// Form Submission
  $("#login-form").submit(function() {
		
      submit_form($(this));
        
  	  return false;		
  });


  //-------------------  Options for Message ---------------------------
  var options = {
    'btn-loading'   : '<i class="fa fa-spinner fa-pulse"></i> &nbsp;Mengirim...',
    'btn-success'   : 'Mohon Menunggu',
    'btn-error'     : 'Login',
    'msg-success'   : '<i class="fa fa-spinner fa-pulse"></i> Reset selesai...',
    'redirecting'   : '<i class="fa fa-spinner fa-pulse"></i> Sedang Mengalihkan...',
    'reset-pass'    : '<i class="fa fa-spinner fa-pulse"></i> Reset password...',
    'check-email'   : '<i class="fa fa-spinner fa-pulse"></i> Pengecekan email...',
    'msg-error'     : 'Email belum terdaftar!', 
    'reset-success' : '<i class="fa fa-spinner fa-pulse"></i> Email verifikasi telah dikirim, silahkan cek email kamu!',    
    'useAJAX'       : true,
  };

  //---------------------  Loading ----------------------------
  function remove_loading($form)
  {
    $form.find('[type=submit]').removeClass('error success');
    $form.find('.login-form-main-message').removeClass('show error success').html('');
  }

  function form_loading($form)
  {
    $form.find('[type=submit]').addClass('clicked').html(options['btn-loading']);
  }
  
  function form_success($form)
  {
    $form.find('[type=submit]').addClass('success').html(options['btn-success']);
    $form.find('.login-form-main-message').addClass('show success').html(options['msg-success']);
  }

  function redirecting($form)
  {
    $form.find('[type=submit]').addClass('success').html(options['btn-success']);
    //$form.find('.login-form-main-message').addClass('show success').html(options['redirecting']);
    swal({title: "BERHASIL", html: options['redirecting'], type: "success", showConfirmButton: false});
  }

  function form_failed($form)
  {
    $form.find('[type=submit]').addClass('error').html(options['btn-error']);
    $form.find('.login-form-main-message').removeClass('show error success').html('');
    swal({title: "GAGAL",
          html : options['msg-error'],
          type : "error",
          showConfirmButton: false,
          timer: 3000
        });
  
  }

  function reset_success($form)
  {    
    $form.find('.login-form-main-message').addClass('show success').html(options['reset-success']);
  }

  function check_email($form)
  {    
    $form.find('[type=text]').attr('disabled','true');
    $form.find('.login-form-main-message').addClass('show success').html(options['check-email']);
  }

  function reset_password($form)
  {    
    $form.find('.login-form-main-message').addClass('show success').html(options['reset-pass']);
  }
	
	
  
	//------------------- submission ---------------------------
	// You should use your AJAX function.
  function submit_form($form)
  {
  	if($form.valid())
  	{      
      var data = $("#login-form").serialize();
      $.ajax({          
         type : 'POST',
         url  : 'forgot_proses.php',
         data : data,
         beforeSend: function(){
            form_loading($form);
         },

         success: function(response){
          if (response !== "no") {
          setTimeout(function() {
            check_email($form); 
            setTimeout(function(){
              reset_password($form);
              setTimeout(function(){
                form_success($form);
                setTimeout(function(){
                  reset_success($form);
                  setTimeout(function(){
                    redirecting($form);
                    setTimeout(function(){
                      window.location.href="../login";
                    },3000);
                  },3000);
                },5000);
              },3000);
            },3000);              
          }, 3000);
         }
         else if(response == "no"){
          setTimeout(function() {
            check_email($form);
            setTimeout(function(){
                form_failed($form);
            },5000);
          },3000);
        }
       }

      });
  	}
  }
	
})(jQuery);

//------------------------- autocomplate off -------------------------------
$("form").attr('autocomplete', 'off');
