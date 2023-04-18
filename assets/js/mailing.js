

function submitForm(event) {
    event.preventDefault(); 

    var myForm = document.getElementById("mailing_form");
    var formData = new FormData(myForm); 

    
      fetch("http://clsonline.org/assets/php/mailing.php", {
        method: "POST",
        body: formData
      })
      .then(response => {
        console.log(response);
      })
      .catch(error => {
        console.error('js error');
      });


  }