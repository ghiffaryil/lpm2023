	
(function($) {
    "use strict";

	  //-------------------  Options for Message ---------------------------
  var options = {
    'btn-loading'   : '<i class="fa fa-spinner fa-pulse"></i>  Daftar',
    'btn-success'   : 'Daftar',
    'btn-error'     : 'Daftar',
    'msg-success'   : '<i class="fa fa-spinner fa-pulse"></i> Proccess success...',
    'redirecting'   : '<i class="fa fa-spinner fa-pulse"></i> Redirecting to login page...',
    'reset-pass'    : '<i class="fa fa-spinner fa-pulse"></i> Processing data...',
    'check-email'   : '<i class="fa fa-spinner fa-pulse"></i> Checking data...',
    'msg-error'     : 'Registration failed!', 
    'reset-success' : '<i class="fa fa-spinner fa-pulse"></i> Verification has been sent, please check your email!',    
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
    $form.find('.login-form-main-message').addClass('show success').html(options['redirecting']);
  }

  function form_failed($form)
  {
    $form.find('[type=submit]').addClass('error').html(options['btn-error']);
    $form.find('.login-form-main-message').addClass('show error').html(options['msg-error']);
  }

  function reset_success($form)
  {    
    $form.find('.login-form-main-message').addClass('show success').html(options['reset-success']);
  }

  function check_email($form)
  {    
    $form.find('.login-form-main-message').addClass('show success').html(options['check-email']);
  }

  function reset_password($form)
  {    
    $form.find('.login-form-main-message').addClass('show success').html(options['reset-pass']);
  }
	
	//------------------- submission ---------------------------
	// You should use your AJAX function.
  $("#form_daftar").submit(function() {    
      submit_form($(this));        
      return false;   
  });

  function submit_form($form)
  {
  	if($form.valid())
  	{      
      var data = $('#form_daftar').serialize();
      $.ajax({
        type  : 'POST',
        url   : "register_proses.php",
        data  : data,
        cache : false,
        beforeSend: function(){
          form_loading($form);
        },

        success :  function(response){
          if (response !== "ok") {          
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
          }else{
            setTimeout(function(){
              form_failed($form);
            },3000);          
          }
        }
      });
  	}
  }
	
})(jQuery);

//----------------------- email validasi --------------------------------

function ValidateEmail() {
  var options = {
    'email-error': 'Alamat email salah!',
    'btn-loading': '<i class="fa fa-spinner fa-pulse"></i> Masuk',
    'btn-normal' : 'Masuk',
  };
  var email = document.getElementById("username").value;
  var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  if (!expr.test(email)) {
    if(email == ''){      
      $('[type=submit]').html(options['btn-normal']);
      document.getElementById("submit").disabled = true;
      $('.login-form-main-message').removeClass('show error success').html('');
    }else{
      $('[type=submit]').html(options['btn-normal']);
      document.getElementById("submit").disabled = true;
      swal({
        title: "PERHATIAN", 
        html: options['email-error'], 
        type: "warning", 
        showConfirmButton: false,
        toast: true,
        position: 'top',
        timerProgressBar: true,
        animation: true,
        customClass: 'swal-wide'
      });
    }
  }else{
      $('[type=submit]').html(options['btn-normal']);
      document.getElementById("submit").disabled = false;
      swal({
        title: "PERHATIAN", 
        html: "Email benar", 
        type: "success", 
        showConfirmButton: false,
        toast: true,
        position: 'top',
        timerProgressBar: true,
        animation: true,
        customClass: 'swal-wide',
        timer: 1000
      });
    }
}

//------------------------- autocomplate off -------------------------------
$("form").attr('autocomplete', 'off');

//-------------- confirm password ------------------------
$('#confirm').keyup(function() {
   var pass=$('#password').val();
   var conf=$('#confirm').val();
   if (pass!=conf){
    if (conf == '') {
      document.getElementById("submit").disabled = true;
      swal({
        title: "PERHATIAN", 
        html: "Silahkan ulangi sandi", 
        type: "warning", 
        showConfirmButton: false,
        toast: true,
        position: 'top',
        timerProgressBar: true,
        animation: true,
        customClass: 'swal-wide'
      });
    }else{
      document.getElementById("submit").disabled = true;
      swal({
        title: "PERHATIAN", 
        html: "Sandi tidak cocok.", 
        type: "warning", 
        showConfirmButton: false,
        toast: true,
        position: 'top',
        timerProgressBar: true,
        animation: true,
        customClass: 'swal-wide'
      });
    }
   }else{
      document.getElementById("submit").disabled = false;
      swal({
        title: "PERHATIAN", 
        html: "Sandi cocok.", 
        type: "success", 
        showConfirmButton: false,
        toast: true,
        position: 'top',
        timerProgressBar: true,
        animation: true,
        customClass: 'swal-wide',
        timer: 1500
      });
   }
});

//========================= loading sumbit ========================//

$(".login-button").$.LoadingOverlay("show", {
    image       : "",
    fontawesome : "fa fa-cog fa-spin"
});

//========================== disable back =========================//

$(document).ready(function() {
    window.history.pushState(null, "", window.location.href);        
    window.onpopstate = function() {
         window.history.pushState(null, "", window.location.href);
    };
});

//======================== visible password =======================//

$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});