var x = document.getElementById('response_message');
x.style.display='none';

function login(event) {
  // The password or password you’ve entered is incorrect.
    event.preventDefault(); 
    var email = document.getElementById('email').value;
    var pass = document.getElementById('password').value;
    if (email.length === 0 || pass.length ===0 )
    {
      
      var x = document.getElementById('response_message');
      x.style.display='none';
      setTimeout(function() {
        x.innerHTML= 'Please fill out both of email and password.' ; 
        x.style.display='block'; 
      }, 1000);

    }
    else
    {
        var myForm = document.getElementById("signin_from");
        var formData = new FormData(myForm); 


        fetch("http://localhost/assets/php/login.php", {
  method: "POST",
  body: formData
})
.then(response => {
  if (!response.ok) {
    console.log('contact_support');
  }
  return response.json();
})
.then(data => {
  if ( data.data.success_flag==1)
  {
      
    window.location.href = "../html/dashboard.html";
    localStorage.setItem('ClsUserId', data.data.user_id);
    localStorage.setItem('ClsMemberId', data.data.member_id);
    localStorage.setItem('ClsAuthenticationCode', data.data.auth );
    var x = document.getElementById('response_message');
    x.style.display='none';
    document.getElementById('email').value = '';
    document.getElementById('password').value ='';


  }
  else if ( data.data.success_flag ==2)
  {
    var x = document.getElementById('response_message');
    x.style.display='none';
    setTimeout(function() {
      x.innerHTML= 'Incorrect email or password. Please try again.' ; 
      x.style.display='block'; 
    }, 1000);

  }
  else
  { 
    var x = document.getElementById('response_message');
    x.style.display='none';
    setTimeout(function() {
      x.innerHTML= 'Please contact CLS support team.' ; 
      x.style.display='block'; 
    }, 1000);

  }


})
.catch(error => {

  var x = document.getElementById('response_message');
  x.style.display='none';
  setTimeout(function() {
    x.innerHTML= 'Please contact CLS support team.' ; 
    x.style.display='block'; 
  }, 1000);


});

    

}}