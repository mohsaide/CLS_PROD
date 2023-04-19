<?php

header('Content-Type: application/json');
error_reporting(E_ALL & ~E_WARNING);

 try
{

    $host = "162.241.24.137";
    $username = "clsonlin_SYSTEM";
    $password = "SYSTEM_2022";
    $dbname = "clsonlin_core";
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {

         try
        {

            $set_auth = "update user_auth set value ='".bin2hex(random_bytes(100))."' , expired_date =  date_add(now() , interval 30 minute) where user_id = (select user.id from user 
            where user.email = '".$_POST['email']."' and password = '".$_POST['password']."');" ;

            mysqli_query($conn, $set_auth);

            $main_details= "select user.id user_id , university_member.id member_id , value from user 
            left join university_member on university_member.user_id = user.id and university_member.status ='ACTIVE'
            left join user_auth on user_auth.user_id = user.id
            where user.email = '".$_POST['email']."' and password = '".$_POST['password']."' ;" ;
            
            $result = mysqli_query($conn, $main_details);

            
            if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_assoc($result);

                header('HTTP/1.1 200 SUCCESS');
                $response['status'] = '200_SUCCESS';
                $response['data'] = array("success_flag" => 1 , "user_id"=>$row['user_id'] , "auth"=>$row['value'] , "member_id"=>$row['member_id'] );
                echo json_encode($response) ; 
                exit();  

            }
            else
            {

                $row = mysqli_fetch_assoc($result);
                header('HTTP/1.1 200 SUCCESS');
                $response['status'] = '200_SUCCESS';
                $response['data'] = array("success_flag" => 2  );
                echo json_encode($response) ; 
                exit();  
            }


        }
        catch (\Throwable $post_logic)
        {
            header('HTTP/1.1 400 Bad Request');
            $response['status'] =  str_replace( 'ERROR' , $post_logic->getMessage() , '400_Bad_Request ( POST logic fault --> ERROR )');
            $response['data'] = array("success_flag" => 0) ;
            echo json_encode($response) ; 
            exit();  
        }
       
    }
    else 
    {
        header('HTTP/1.1 400 Bad Request');
        $response['status'] = '400_Bad_Request ( UNDEFINED RESTFUL METHOD )' ;
        $response['data'] = array("success_flag" => 0);
        echo json_encode($response) ; 
        exit();
    }
    

}
 catch (\Throwable $conn)
{
    header('HTTP/1.1 500 Internal Server Error');
    $response['status'] = str_replace( 'ERROR' , $conn->getMessage() , '500_Internal_Server_Error ( ERROR )') ;
    $response['data'] = array("success_flag" => 0);
    echo json_encode($response) ;  
    exit();
}


?>