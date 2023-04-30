function change_status(event , id) 
{
    event.preventDefault();
    var listItems = document.querySelectorAll(".friend");
    listItems.forEach(function(item) {
    listItems.forEach
    (
        function(ii) 
        {
            ii.classList.remove("active");
            ii.classList.remove("active_message");

        }
    )
    document.getElementById(id).classList.add("active");
    document.getElementById(id).classList.add("active_message");

    });


    fetch("http://localhost/dashboard/php/conversation.php?fu_id="+id)
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
        if (data.data.success_flag == 1)
        {
          window.location.href = "../../assets/html/h_unauthorized.php";
        }
        else
        {
             document.getElementById('chat_header_text').innerHTML=data.data.metaData.frnd_name;
             document.getElementById('chat_header_img').setAttribute('src' , '../../assets/img/user/'+ data.data.metaData.frnd_img);
             

              let myDiv = document.getElementById('chat_messages');
              myDiv.innerHTML = ''; 

              console.log( data.data.metaData.frnd_img );

              if ( data.data.metaData.frnd_img == '../logo.jpg')
              {
                   
                var componet =
                `<li class="clearfix">
                <div class="message-data text-right">
                    <img src="../../assets/img/logo.jpg" alt="avatar">
                </div>
                <div class="message other-message float-right">Hi Buddy, How can help you?<br> <small> Now.</small></div>
                </li>`;

                myDiv.innerHTML += componet ;  

              }
              else
              {
                const friends = data.data.metaData.messages;
                friends.forEach((item) => {
  
  
  
                    if (item.src =='ME')
                    {
                        var componet =
                        `
                        <li class="clearfix">
                        <div class="message-data">
                        </div>
                        <div class="message my-message">${item.msg} <br> <small>${item.crtd}</small></div>
                        </li>
    
                        `;
                    
                        myDiv.innerHTML += componet ;  
    
                    }
                    else
                    {
                       
                        var componet =
                        `<li class="clearfix">
                        <div class="message-data text-right">
                            <img src="../../assets/img/user/${data.data.metaData.frnd_img}" alt="avatar">
                        </div>
                        <div class="message other-message float-right">${item.msg}<br> <small>${item.crtd}</small></div>
                        </li>`;
                    
                        myDiv.innerHTML += componet ;  
    
    
                    }
  
                  
                });

              }
              


            


        }

      }
    )
    .catch(error => {
      alert('Please contact support team!');
      return;
    });






};





function referesh_data()
{

        
    fetch("http://localhost/dashboard/php/friends.php")
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
          if (data.data.success_flag == 1)
          {
            window.location.href = "../../assets/html/h_unauthorized.php";
          }
          else
          {

              if ( data.data.metaData.counter == 0)
              {
                return ;
              }
              else
              {
                let myDiv = document.getElementById('friendsList');
                const friends = data.data.metaData.friends;
                friends.forEach((item) => {

                  if (item.image =='../logo.jpg')
                  {
                      var componet =
                          `<li class="clearfix friend active" id='${item.id}' onclick="change_status( event , this.id )">
                          <img src="../../assets/img/user/${item.image}" class='logo_icon'  alt="avatar">
                          <div class="about">
                              <div class="name">${item.name}</div>
                              <div class="status"> <i class="fa fa-circle online"></i> online </div>                                            
                          </div>
                      </li>`;
                      
                      myDiv.innerHTML += componet ;  
                  }
                  else
                  {

                    var componet =
                    `<li class="clearfix friend" id='${item.id}' onclick="change_status( event , this.id )">
                    <img src="../../assets/img/user/${item.image}"  alt="avatar">
                    <div class="about">
                        <div class="name">${item.name}</div>
                        <div class="status"> <i class="fa fa-circle ${item.status}"></i> ${item.status} </div>                                            
                    </div>
                </li>`;
                
                myDiv.innerHTML += componet ;  

                  }
                 




                });
              }

          }

        }
      )
      .catch(error => {
        alert('Please contact support team!');
        return;
      });
      
    
}



window.addEventListener('load', function() {
    referesh_data(); 
});



function test()
{ 
const active = document.querySelector('.active_message');
if (active) {
    
    change_status( new Event('test') , active.id);
} 


}
setInterval( test, 100000); 


