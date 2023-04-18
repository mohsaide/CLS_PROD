<?
    header('Content-Type: application/json');


   if ($_SERVER['REQUEST_METHOD'] === 'POST')
   {
       if ( $_GET['secret_code'] == 'SECRET_TOKEN')
       {
             $headers = "From: support@clsonline.org\r\n" .
                         "Reply-To: support@clsonline.org\r\n" .
                         "X-Mailer: PHP/" . phpversion();
             mail( $_GET['to'] , $_GET['subject']  , $_GET['message'] , $headers) ;
             
             header('HTTP/1.1 200 SUCCESS');
             $response['status'] = '200_SUCCESS';
             echo json_encode($response) ; 
       }
       else
       {
          
             header('HTTP/1.1 401 Unauthorized');
             $response['status'] = '401_Unauthorized';
             echo json_encode($response) ;  
           
       }
     
   }
   else
   {
        header('HTTP/1.1 400 Bad Request');
        $response['status'] = '400_Bad_Request' ;
        echo json_encode($response) ; 
   }
    
?>