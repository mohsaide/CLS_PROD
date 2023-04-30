<?php

session_start(); 
if(isset($_SESSION['AuthToken']) && isset($_SESSION['UserId']))
{
    
    include '../assets/php/connection.php';
    $set_auth = "select * from user_auth where user_id = '".$_SESSION['UserId']."' and value = '".$_SESSION['AuthToken']."'  ;" ;
    
    $rs = mysqli_query($conn, $set_auth);
    if (mysqli_num_rows($rs) == 0)
    {
        header("Location:/assets/html/h_unauthorized.php");
    }
    else
    {

        if (!isset($_GET['type']))
        {

            header("Location:not_found.php");

        }
        else
        {
            if($_GET['type']== 'connected' || $_GET['type']== 'pending_my_accept' || $_GET['type']== 'pending_friend_accept' || $_GET['type']== 'unconnected' )
            {

                include 'header.php';
                // add php logic here
                // add main content at end current php section 


            }
            else
            {
             
                header("Location:not_found.php"); 


            }

        }

    }
    
}
else
{
    header("Location:/assets/html/h_unauthorized.php");

}

?>



            <link href="css/friends.css" rel="stylesheet">

             <!-- Begin Page Content -->
                <div class="container-fluid  pb-4">


                <div class="container">

                            <div class="row" id='friend_list'>



                            
                            </div>

                </div>

                                
                </div>

                <!-- End Page Content -->
                </div>
            
                </div>
                <!-- /.container-fluid -->



<?php
include 'footer.php';
?>