var x = document.getElementById('response_message');
x.style.display='none';


  // clear values 

  var myForm = document.getElementById("signin_from");

  for (let i = 0; i < myForm.elements.length; i++) 
  {
   myForm.elements[i].value = ''; 
  }


function login(event) {
  // The password or password you’ve entered is incorrect.
    event.preventDefault(); 
    var myForm = document.getElementById("signin_from");
  
    for (let i = 0; i < myForm.elements.length; i++) 
    {
      const element = myForm.elements[i];
      if (!element.checkValidity())
       {
       alert( "( " + element.name +" ) " + element.validationMessage)
       return ;
      }
    }
  

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


fetch("http://localhost/assets/php/p_login.php", {
  method: "POST",
  body: formData
})
.then(response => {
  if (!response.ok) {
    
    var x = document.getElementById('response_message');
    x.style.display='none';
    setTimeout(function() {
      x.innerHTML= 'Please contact CLS support team.' ; 
      x.style.display='block'; 
    }, 1000);

  }
  return response.json();
})
.then(data => {
  if ( data.data.success_flag==1)
  {
      
    window.location.href = "../../dashboard/main.php";
    var x = document.getElementById('response_message');
    x.style.display='none';
    sessionStorage.setItem('email', document.getElementById('email').value );
    sessionStorage.setItem('MemberId', data.data.MemberId  );
    sessionStorage.setItem('UserId',  data.data.UserId );
    sessionStorage.setItem('AuthToken', data.data.AuthToken  );
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