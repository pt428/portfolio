<?php
if(isset($_POST)){
    $name=addslashes($_POST["name"]);
    $email=addslashes($_POST["email"]);
    $subject=addslashes($_POST["subject"]);
    $message=addslashes($_POST["message"]);
    if(sendEmail($name,$email,$subject,$message)){
         
        header("Location:https://pavel-tichy.cz/index.php?email=1#contact");
       
    }else{
        header("Location:https://pavel-tichy.cz/index.php?email=2#contact");

    }
}
 function sendEmail($name,$email,$subject,$message){
    // Force PHP to use the UTF-8 charset
    header('Content-Type: text/html; charset=utf-8'); 

    // Nastavte si email, nakterý chcete, aby se vyplněný formulář odeslal - jakýkoli váš email
    $recipient = "pt75@seznam.cz, pavel.tichy@centrum.cz";
    // $recipient = "podatelna@malenovice.eu";
    // $recipient = "obec@malenovice.eu";
    // Nastavte předmět odeslaného emailu
    
    $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
   

    // Obsah emailu, který se vám odešle
    
    $email_content = "Jméno: $name\r\n";
    $email_content .= "Email: $email\r\n";
    $email_content .= "Zprava: $message\r\n";
    
  
    
    // Emailová hlavička
    
    $email_headers = 'MIME-Version: 1.0' . "\n";//\r\n ok na centrum
    $email_headers .= 'Content-type: text/html; charset=utf-8' . "\n";
    $email_headers .= 'Content-Transfer-Encoding: base64' . "\n";
    $email_headers .= "From:" . $name . "<" . $email . ">" . "\n";
    // header("Content-Type: text/html; charset=windows-1250");
      
    // Odeslání emailu - dáme vše dohromady
    return mail($recipient, $subject, $email_content, $email_headers);
}

?>
