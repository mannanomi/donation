<?php 
if(isset($_POST['submit'])){
    
    /*
    $mobile =$_POST['mobile'];
    $message=$_POST['message'];
    $encodedMessage = urlencode($messgae);
    $mobileNumbers = implode('',$mobile);
    $arr = str_split($mobileNumbers, '12');
    $number = implode(',',$arr);
    $authKey = "";
    $senderId = "";
    $route = 4;
    $postData = array (
    
                'authKey'=> $authKey,
                'mobile' => $number,
                'message'=> $encodedMessage,
                'sender' => $senderId,
                'route'  => $route
     
        
    );
    
    $url="http://api.msg91.com/api/sendhttp.php";
    
    $ch = curl_init();
    curl_setopt_array($ch, array(
    
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData    
    
    ));
    
    
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    
    $response = curl_exec($ch);
    
    if($response == TRUE ){
        
        $msg ='Message sent successfully'
    }
     if(curl_error($ch))   
     {
         echo 'error:' . curl_error($ch);
     }
        
      curl_close($ch);  
    }
}
*/
?>
