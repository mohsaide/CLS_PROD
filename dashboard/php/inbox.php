<?php

// <!-- --------------------------------- -->

// <!-- this api used reset user password -->

// <!-- take session vlaues and new password & verify and old pass as parameter  -->

// <!-- --------------------------------- -->


header('Content-Type: application/json');
error_reporting(E_ALL & ~E_WARNING);
session_start();
$_SESSION['UserId']='1';
$_SESSION['AuthToken']='6eb1b5b1b1487a47ab6d9072c781580cd00b51e9cafbb9acbb84168a946d4f1b9258c32dbcaf5117e8d7adb553e998ba98f3e8dbcedecc4215869d3173b7f00e0b5da2676223c00625ddd6aed3d7f25a31b9341ff52a9b28ad919db21f1c6587f5bbea40';
 try
{

    include '../../assets/php/connection.php'; 


    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {

         try
        {
           session_start();
           if ( !isset($_SESSION['UserId']) || !isset($_SESSION['AuthToken']) )
           {
            echo 
            header('HTTP/1.1 200 SUCCESS');
            $response['status'] ='200_SUCCESS' ;
            $response['data'] = array("success_flag" => 1 , "message" => 'UNAUTHORIZED' );
            echo json_encode($response) ;  
            exit();
             
           }
           else
           {
            
            $query = "select * from user_auth where user_id = '".$_SESSION['UserId']."' and value = '".$_SESSION['AuthToken']."'  ;" ;
            $rs = mysqli_query($conn, $query);
            if (mysqli_num_rows($rs) == 0)
            {
                header('HTTP/1.1 200 SUCCESS');
                $response['status'] ='200_SUCCESS' ;
                $response['data'] = array("success_flag" => 1 , "message" => 'UNAUTHORIZED' );
                echo json_encode($response) ;  
                exit();  
            }
           else
           {

            if ( !isset($_POST['NewPassword']) || !isset($_POST['Verify']) )
            {

                header('HTTP/1.1 400 Bad Request');
                $response['status'] = '400_Bad_Request' ;
                $response['data'] = array("success_flag" => 0 , "message" => 'Required feilds are missed.' );
                echo json_encode($response) ; 
                exit();

            }
            else
            {

              if ( $_POST['Verify'] !=  $_POST['NewPassword'] )
              {
                
                header('HTTP/1.1 200 SUCCESS');
                $response['status'] ='200_SUCCESS' ;
                $response['data'] = array("success_flag" => 1 , "message" => 'Password and Verify Password do not match.' );
                echo json_encode($response) ;  
                exit(); 
                

              }
              else
              {
                
                $query = "update user set password = '".$_POST['NewPassword']."' where id = '".$_SESSION['UserId']."' " ;
                mysqli_query($conn, $query);

                // $email = mysqli_fetch_assoc( mysqli_query( $conn ,"select email from user where id = '".$_SESSION['UserId']."' ;" ))['email'];

                // $headers = "From: no-reply@clsonline.org\r\n" .
                //          "Reply-To: no-reply@clsonline.org\r\n" .
                //          "X-Mailer: PHP/" . phpversion();
                // mail( $email , 'Password changed'  , 'Just want to let you know that your password in clsonline.org has been changed.' , $headers) ;


                header('HTTP/1.1 200 SUCCESS');
                $response['status'] ='200_SUCCESS' ;
                $response['data'] = array("success_flag" => 1 , "message" => 'DONE' );
                echo json_encode($response) ;  
                exit(); 
              }


            }

           }
                    

           }


        }
        catch (\Throwable $post_logic)
        {
            header('HTTP/1.1 500 Internal Server Error');
            $response['status'] =  '500_Internal_Server_Error' ;
            $response['data'] = array("success_flag" => 0 , "message" => $post_logic->getMessage() ) ;
            echo json_encode($response) ; 
            exit();  
        }
       
    }
    elseif ($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        try
        {
           if ( !isset($_SESSION['UserId']) || !isset($_SESSION['AuthToken']) )
           {
            echo 
            header('HTTP/1.1 200 SUCCESS');
            $response['status'] ='200_SUCCESS' ;
            $response['data'] = array("success_flag" => 1 , "message" => 'UNAUTHORIZED' );
            echo json_encode($response) ;  
            exit();
             
           }
           else
           {
            
            $query = "select * from user_auth where user_id = '".$_SESSION['UserId']."' and value = '".$_SESSION['AuthToken']."'  ;" ;
            $rs = mysqli_query($conn, $query);
            if (mysqli_num_rows($rs) == 0)
            {
                header('HTTP/1.1 200 SUCCESS');
                $response['status'] ='200_SUCCESS' ;
                $response['data'] = array("success_flag" => 1 , "message" => 'UNAUTHORIZED' );
                echo json_encode($response) ;  
                exit();  
            }
           else
           {

            $query='select friend_id  , if (user_auth.value is null , "offline" , "online" ) status , image , concat (first_name , " " , last_name) name from user_friend
                    left join user_auth on friend_id = user_auth.user_id
                    left join user on friend_id = user.id
                    where user_friend.user_id = "'.$_SESSION['UserId'].'" ; ' ;
            $rs = mysqli_query($conn , $query);
            $data = array();
            $counter = mysqli_num_rows($rs);
            for ($i = 0; $i < $counter ; $i++) {
                $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                $friend = array("id"=>  $row["friend_id"] , "status"=>  $row["status"] , "image"=>  $row["image"] , "name"=>  $row["name"]  );
                $data[] = $friend ; 
              }

            header('HTTP/1.1 200 SUCCESS');
            $response['status'] ='200_SUCCESS' ;
            $response['data'] = array("success_flag" => 2 , "metaData"=> array("friends" => $data , 'counter' => $counter) );
            echo json_encode($response) ;  
            exit(); 

           }
                    

           }


        }
        catch (\Throwable $post_logic)
        {
            header('HTTP/1.1 500 Internal Server Error');
            $response['status'] =  '500_Internal_Server_Error' ;
            $response['data'] = array("success_flag" => 0 , "message" => $post_logic->getMessage() ) ;
            echo json_encode($response) ; 
            exit();  
        }
    }
    else 
    {
        header('HTTP/1.1 400 Bad Request');
        $response['status'] = '400_Bad_Request' ;
        $response['data'] = array("success_flag" => 0 , "message" => 'UNDEFINED RESTFUL METHOD' );
        echo json_encode($response) ; 
        exit();
    }
    

}
 catch (\Throwable $conn)
{
    header('HTTP/1.1 500 Internal Server Error');
    $response['status'] ='500_Internal_Server_Error' ;
    $response['data'] = array("success_flag" => 0 , "message" => $conn->getMessage() );
    echo json_encode($response) ;  
    exit();
}


?>