

function submitForm(event) {
    event.preventDefault(); 
    var myForm = document.getElementById("mailing_form");
    var formData = new FormData(myForm); 


    
      fetch("http://localhost/assets/php/mailing.php", {
        method: "POST",
        body: formData
      })
      .then(response => {
        
        var mailing_notification = document.getElementById("mailing_notification");
        console.log(response);
        if (response['status']==200)
        {
            mailing_notification.innerHTML = 'Email has been sent!';
            mailing_notification.style.backgroundColor = 'green';
        }
        else if (response['status']==401)
        {
            mailing_notification.innerHTML = 'You are not authorized!';
            mailing_notification.style.backgroundColor = 'Orange';
        }
        else
        {
            mailing_notification.innerHTML = 'Something went wrong!';
            mailing_notification.style.backgroundColor = 'red';

        }
       
      })
      .catch(error => {

        mailing_notification.innerHTML = 'Something went wrong!';
        mailing_notification.style.backgroundColor = 'red';
        console.error('mailing js error');
        
      });


  }