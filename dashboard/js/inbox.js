function change_status(event) 
{
    event.preventDefault(); 
    var listItems = document.querySelectorAll(".friend");
    listItems.forEach(function(item) {
    item.addEventListener("click", function() {
        
        listItems.forEach(function(ii) {
           ii.classList.remove("active");
        })
    
        this.classList.add("active");

    });
    });

};





function referesh_data()
{

    let myDiv = document.getElementById('friendsList');
    var componet =
    `<li class="clearfix friend active" id='user_0' onclick="change_status(event)" >
    <img src="../../assets/img/logo.jpg" class="friend_img" alt="avatar">
    <div class="about">
        <div class="name"  >CLS Team</div>
        <div class="status"> <i class="fa fa-circle online"></i> Online </div>                                            
    </div>
</li>`;

myDiv.innerHTML += componet ;  




        
    fetch("http://localhost/dashboard/php/inbox.php")
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
            console.log();

              if ( data.data.metaData.counter == 0)
              {
                return ;
              }
              else
              {
                let myDiv = document.getElementById('friendsList');
                const friends = data.data.metaData.friends;
                friends.forEach((item) => {
                 
                    var componet =
                    `<li class="clearfix friend" id='user_${item.id}' onclick="change_status(event)">
                    <img src="../../assets/img/user/${item.image}" class="friend_img" alt="avatar">
                    <div class="about">
                        <div class="name">${item.name}</div>
                        <div class="status"> <i class="fa fa-circle ${item.status}"></i> ${item.status} </div>                                            
                    </div>
                </li>`;
                
                myDiv.innerHTML += componet ;  



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