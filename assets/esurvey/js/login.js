	
(function($) {
  "use strict";
  $("#login-form").submit(function() {
		
      submit_form($(this));
        
  	  return false;		
  });

  //-------------------  Options for Message ---------------------------
  var options = {
    'btn-loading': '<i class="fa fa-spinner fa-pulse"></i> Masuk',
    'btn-success': 'Masuk',
    'btn-error'  : 'Masuk',
    'msg-success': '',
    'msg-error'  : 'Email atau password salah!',    
    'useAJAX'    : true,
  };

  //---------------------  Loading ----------------------------
  function remove_loading($form)
  {
    $form.find('[type=submit]').removeClass('error success');
    $form.find('.login-form-main-message').removeClass('show error success').html('');
  }

  function form_loading($form)
  {
    $form.find('[type=submit]').addClass('').html(options['btn-loading']);
  }
  
  function form_success($form)
  {
    $form.find('[type=submit]').addClass('success').html(options['btn-success']);
    swal({
      title: "BERHASIL", 
      html: options['msg-success'], 
      type: "success",
      showConfirmButton: false
    });
  }

  function form_failed($form)
  {
    $form.find('[type=submit]').addClass('danger').html(options['btn-error']);
    swal({
      title: "GAGAL",
      text: options['msg-error'],
      type: "error",
      timer: 3000
    });
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
         url  : 'login_proses.php',
         data : data,
         beforeSend: function(){
            form_loading($form);
         },

         success :  function(response){
          if (response == "ok") {
          setTimeout(function() {
            form_success($form); 
            setTimeout(function(){
              window.location.href="auth.php";
            },2000);              
          }, 500);
         }else{
            setTimeout(function(){
              form_failed($form);
            },500);          
         }
       }
      });
  	}
  }
	
})(jQuery);


//--------------remember--------------

const rmCheck        = document.getElementById("lg_remember"),
      emailInput     = document.getElementById("username"),
      passwordInput  = document.getElementById("password");

if (localStorage.checkbox && localStorage.checkbox !== "") {
  rmCheck.setAttribute("checked", "checked");
  emailInput.value    = localStorage.username;
  passwordInput.value = localStorage.password;
} else {
  rmCheck.removeAttribute("checked");
  emailInput.value    = "";
  passwordInput.value = "";
}

function RememberMe() {
  if (rmCheck.checked && emailInput.value && passwordInput.value !== "") {
    localStorage.username = emailInput.value;
    localStorage.password = passwordInput.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = "";
    localStorage.password = "";
    localStorage.checkbox = "";
  }
}

//------------------------- autocomplate off -------------------------------

$("form").attr('autocomplete', 'off');

//------------------------- visible password -------------------------------

$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});