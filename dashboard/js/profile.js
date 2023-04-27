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
        <option value="${address[i].ID}">${address[i].NAME} </option>
         ` ;


        myDiv.innerHTML += componet ;  
    }

  })
  .catch(error => console.error('ERROR HAPPEND WHILE loading addresses ( ' + error + ') '))



  // save fun

function save_profile(event)
{   
  event.preventDefault(); 
  var myForm = document.getElementById("personal_from");
  var formData = new FormData(myForm); 


  for (let i = 0; i < myForm.elements.length; i++) 
  {
    const element = myForm.elements[i];
    if (!element.checkValidity())
     {
     alert( "( " + element.name +" ) " + element.validationMessage)
     return ;
    }
  }


     
    fetch("http://localhost/dashboard/php/set_user_info.php", {
        method: "POST",
        body: formData
      })
      .then(response => {
         
        if (!response.ok)
        {
          alert('Please contact support team!');
          return;
        }
       return response.json();
      })
      .then
      ( data => 
        {
          if (data.data.message =='UNAUTHORIZED')
          {
            window.location.href = "../../assets/html/h_unauthorized.php";
          }
          else
          {
              location.reload();
              return;
          }

        }
      )
      .catch(error => {
        alert('Please contact support team!');
        return;
      });

    
}


function Myclear2(event)
{
  document.getElementById("file-input").value='';
}



function update_image(event)
{
  event.preventDefault(); 
  var myForm = document.getElementById("UploadImg");
  var formData = new FormData(myForm); 


  for (let i = 0; i < myForm.elements.length; i++) 
  {
    const element = myForm.elements[i];
    if (!element.checkValidity())
     {
     alert( "( " + element.name +" ) " + element.validationMessage)
     return ;
    }
  }


     
    fetch("http://localhost/dashboard/php/set_user_img.php", {
        method: "POST",
        body: formData
      })
      .then(response => {
         
        if (!response.ok)
        {
          alert('Please contact support team!');
          return;
        }
       return response.json();
      })
      .then
      ( data => 
        {
          if (data.data.message =='UNAUTHORIZED')
          {
            window.location.href = "../../assets/html/h_unauthorized.php";
            return;
          }
          else
          {
              document.getElementById('chg_prf_img').style.display='none';
              location.reload();
              return;
          }

        }
      )
      .catch(error => {
        alert('Please contact support team!');
        return;
      });
}