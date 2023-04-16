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
            echo 'post'; 
           // post logic 
        }
         catch (\Throwable $post_logic)
        {
            header('HTTP/1.1 400 Bad Request');
            $response['status'] =  str_replace( 'ERROR' , $post_logic->getMessage() , '400_Bad_Request ( POST logic fault --> ERROR )');
            $response['data'] = array() ;
            echo json_encode($response) ; 
            exit();  
        }
       
    }
    elseif ($_SERVER['REQUEST_METHOD'] === 'GET')
    {
     
        try
        {
            echo 'get'; 
           // get logic 
        }
         catch (\Throwable $get_logic)
        {
            header('HTTP/1.1 400 Bad Request');
            $response['status'] =  str_replace( 'ERROR' , $get_logic->getMessage() , '400_Bad_Request ( GET logic fault --> ERROR )');
            $response['data'] = array() ;
            echo json_encode($response) ; 
            exit();  
        }

    }
    else 
    {
        header('HTTP/1.1 400 Bad Request');
        $response['status'] = '400_Bad_Request ( UNDEFINED RESTFUL METHOD )' ;
        $response['data'] = array() ;
        echo json_encode($response) ; 
        exit();
    }
    


}
 catch (\Throwable $conn)
{
    header('HTTP/1.1 500 Internal Server Error');
    $response['status'] = str_replace( 'ERROR' , $conn->getMessage() , '500_Internal_Server_Error ( ERROR )') ;
    $response['data'] = array() ;
    echo json_encode($response) ;  
    exit();
}


?>