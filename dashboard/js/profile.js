  // addresses loader 
  fetch('http://localhost/assets/php/p_addresses.php')
  .then(response => response.json())
  .then(data => {
    let jsonData = data; // store the parsed JSON data in a variable
    address = jsonData.data
    let myDiv = document.getElementById('address');


    for(let i = 0 ; i<address.length ; i++)
    {

        var componet =
         `
        <option value="${address[i].ID}">${address[i].NAME}</option>
         ` ;


        myDiv.innerHTML += componet ;  
    }

  })
  .catch(error => console.error('ERROR HAPPEND WHILE loading addresses ( ' + error + ') '))



  // save fun

function save_profile(event)
{      
    var myForm = document.getElementById("personal_from");
    var formData = new FormData(myForm); 
    alert(formData.get('fname'));
    // fetch("http://localhost/dashboard/php/set_user_info.php", {
    //     method: "POST",
    //     body: formData
    //   })
    //   .then(response => {
        
        
    //     if (!response.ok)
    //     {
    //       alert('Please contact support team!');
    //       return;
    //     }
    //    return response.json();
    //   })
    //   .then
    //   ( data => 
    //     {
    //       alert(data.data.message);

    //     }

    //   )
    //   .catch(error => {
    
    //     var message = document.getElementById('support_success_message');
    //       message.style.display ='none' ;
    //       document.getElementById('support_fail_message').innerHTML = '<strong>Success!</strong> Please contact support team!';
    //       var message = document.getElementById('support_fail_message');
    //       message.style.display ='block' ;
    //       return;

    //   });

    
}


function Myclear2(event)
{

  document.getElementById("file-input").value='';
}