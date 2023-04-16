<?

try {
    
    $requestBody = file_get_contents('php://input');
    $requestData = json_decode($requestBody, true);
    $headers = "From: no-reply@clsonline.org\r\n" .
                "Reply-To: no-reply@clsonline.org\r\n" .
                "X-Mailer: PHP/" . phpversion();
                mail( $requestData['to'] , $requestData['subject']  , $requestData['message'] , $headers) ;
                header('HTTP/1.1 200 SUCCESS');
    
} catch (\Throwable $th) {
    header('HTTP/1.1 400 Bad Request');
}


?>