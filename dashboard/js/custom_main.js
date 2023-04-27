function reset(event)
{
    event.preventDefault(); 
    var myForm = document.getElementById('reset_form');
    for (let i = 0; i < myForm.elements.length; i++) 
    {

      const element = myForm.elements[i];
      if(element.value =='')
      {
        var reason = document.getElementById('reason');
        reason.innerHTML= 'Please enter the ELEMENTNAME.'.replace( 'ELEMENTNAME.', element.name ) ;
        var message = document.getElementById('success_message');
        message.style.display ='none' ;
        var message = document.getElementById('fail_message');
        message.style.display ='block' ;
        return;
      }
      if (!element.checkValidity())
       {
        var reason = document.getElementById('reason');
        reason.innerHTML= "( " + element.name +" ) " + element.validationMessage ;
        var message = document.getElementById('success_message');
        message.style.display ='none' ;
        var message = document.getElementById('fail_message');
        message.style.display ='block' ;
       return ; 
      }
    }

    var myForm = document.getElementById("reset_form");
    var formData = new FormData(myForm); 

    fetch("http://localhost/dashboard/php/reset.php", {
  method: "POST",
  body: formData
})
.then(response => {
  if (!response.ok) {

    var reason = document.getElementById('reason');
    reason.innerHTML='Please contact cls support team!' ;
    var message = document.getElementById('success_message');
    message.style.display ='none' ;
    var message = document.getElementById('fail_message');
    message.style.display ='block' ;
    var myForm = document.getElementById("reset_form");
    for (let i = 0; i < myForm.elements.length; i++) 
    {
     myForm.elements[i].value = ''; 
    }
    return;
   
  }
  return response.json();
})
.then(data => {
  if ( data.data.message== 'UNAUTHORIZED' )
  {
      
    window.location.href = "../../assets/html/h_unauthorized.php";
    return;

  }
  else if ( data.data.message == 'DONE' )
  {
      
    var message = document.getElementById('fail_message');
    message.style.display ='none' ;
    var message = document.getElementById('success_message');
    message.style.display ='block' ;
    var myForm = document.getElementById("reset_form");
    for (let i = 0; i < myForm.elements.length; i++) 
    {
     myForm.elements[i].value = ''; 
    }
    return;

  }
  else
  { 
    var reason = document.getElementById('reason');
    reason.innerHTML= data.data.message ;
    var message = document.getElementById('success_message');
    message.style.display ='none' ;
    var message = document.getElementById('fail_message');
    message.style.display ='block' ;
    var myForm = document.getElementById("reset_form");
    for (let i = 0; i < myForm.elements.length; i++) 
    {
     myForm.elements[i].value = ''; 
    }
    return;

  }

})
.catch(error => {

  var reason = document.getElementById('reason');
  reason.innerHTML='Please contact cls support team!' ;
  var message = document.getElementById('success_message');
  message.style.display ='none' ;
  var message = document.getElementById('fail_message');
  message.style.display ='block' ;
  var myForm = document.getElementById("reset_form");
  for (let i = 0; i < myForm.elements.length; i++) 
  {
   myForm.elements[i].value = ''; 
  }
  return;

});
    
}




function send(event)
{
    event.preventDefault(); 
    if (document.getElementById('support_message').value == '')
    {
      var message = document.getElementById('support_success_message');
      message.style.display ='none' ;
      var message = document.getElementById('support_fail_message');
      message.style.display ='block' ;
      return;
    }
    else
    {

      document.getElementById('support_subject').value = ' [ ' + sessionStorage.getItem('email') + ' ] ' + 'needs some supporting.';


      var myForm = document.getElementById("support_form");
      var formData = new FormData(myForm); 
  
      
        fetch("http://localhost/assets/php/mailing.php", {
          method: "POST",
          body: formData
        })
        .then(response => {
          
          
          if (response['status']==200)
          {
             
            var message = document.getElementById('support_fail_message');
            message.style.display ='none' ;
            var message = document.getElementById('support_success_message');
            message.style.display ='block' ;
            return; 
  
          }
          else
          {

            var message = document.getElementById('support_success_message');
            message.style.display ='none' ;
            document.getElementById('support_fail_message').innerHTML = '<strong>Success!</strong> Please contact support team!';
            var message = document.getElementById('support_fail_message');
            message.style.display ='block' ;
            return;    
  
          }
         
        })
        .catch(error => {
      
          var message = document.getElementById('support_success_message');
            message.style.display ='none' ;
            document.getElementById('support_fail_message').innerHTML = '<strong>Success!</strong> Please contact support team!';
            var message = document.getElementById('support_fail_message');
            message.style.display ='block' ;
            return;

        });


    }


}


function Myclear(event)
{

      var message = document.getElementById('support_success_message');
      message.style.display ='none' ;
      var message = document.getElementById('support_fail_message');
      message.style.display ='none' ;
      var message = document.getElementById('success_message');
      message.style.display ='none' ;
      var message = document.getElementById('fail_message');
      message.style.display ='none' ;

      var myForm = document.getElementById("reset_form");
      for (let i = 0; i < myForm.elements.length; i++) 
      {
       myForm.elements[i].value = ''; 
      }
      

      var myForm = document.getElementById("support_form");
      for (let i = 0; i < myForm.elements.length; i++) 
      {
       myForm.elements[i].value = ''; 
      }
  
}