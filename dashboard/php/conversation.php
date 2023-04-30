<?php



header('Content-Type: application/json');
error_reporting(E_ALL & ~E_WARNING);
session_start();
 try
{

    include '../../assets/php/connection.php'; 


     if ($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        try
        {
           if ( !isset($_SESSION['UserId']) || !isset($_SESSION['AuthToken']) )
           {

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

             if (!isset($_GET['fu_id']))
             {
                header('HTTP/1.1 400 Bad Request');
                $response['status'] = '400_Bad_Request' ;
                $response['data'] = array("success_flag" => 0 , "message" => 'Missed api parameters.' );
                echo json_encode($response) ; 
                exit();
             }
             else
             {
                // unauthorized 
                $query= 'select content msg , if (message.sender_id = "'.$_SESSION['UserId'].'" , "ME" , "OTHER" ) src , DATE_FORMAT( message.created , "%M %d, %y") crtd from user_friend_message 
                left join user_friend on user_friend_id = user_friend.id and user_friend_message.deleted = "0"
                left join message on message_id = message.id
                where blocked = "0" and user_friend.id = "'.$_GET['fu_id'].'" order by message.created asc;';

                $rs = mysqli_query($conn , $query);
                $data = array();
                $counter = mysqli_num_rows($rs);
                for ($i = 0; $i < $counter ; $i++) {
                $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                $message = array("msg"=>  $row["msg"] , "src"=>  $row["src"] , "crtd"=>  $row["crtd"] );
                $data[] = $message ; }

                $query ='select user.image img , concat(first_name , " " , last_name) name from user_friend 
                left join user on friend_id = user.id 
                where user_friend.id = "'.$_GET['fu_id'].'" ;';
                $rs = mysqli_query($conn , $query);
                $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);


                header('HTTP/1.1 200 SUCCESS');
                $response['status'] ='200_SUCCESS' ;
                $response['data'] = array("success_flag" => 2 , "metaData"=> array( "frnd_name"=> $row['name'] , 'frnd_img'=> $row['img'] , 'counter' => $counter , "messages" => $data ) );
                echo json_encode($response) ;  
                exit();  
                
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