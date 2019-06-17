<?php
    require_once 'functions.php';
    
    $errores = '';
    $name = '';
    $email = '';
    $message = '';
    $bodyMessage = '';

    //Validate Name
    if(empty($_POST['name'])){
        $errores .= 'Ingresa un nombre </br>';
    }else {
        $name = cleanDataMalicious($_POST['name']);
        $name = filter_var($name,FILTER_SANITIZE_STRING);
    }
 
    //Validate E-mail
    if(empty($_POST['email'])){
        $errores .= 'Ingresa un correo electrónico </br>';
    }else {
        $email = cleanDataMalicious($_POST['email']);
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $errores .= 'Ingresa un correo electrónico válido </br>';
        }else {
           $email = filter_var($email,FILTER_SANITIZE_EMAIL);
        }
         
    }

    //Validate Message
    if(empty($_POST['message'])){
        $errores .= 'Ingresa un mensaje </br>';
    }else {
        $message = cleanDataMalicious($_POST['message']);
        $message = filter_var($name,FILTER_SANITIZE_STRING);
    }

    // Send
    if ($errores == ''){
        //Body of Message
        $bodyMessage .= "Nombre: ";
        $bodyMessage .= $name;
        $bodyMessage .= "\n";

        $bodyMessage .= "Correo electrónico: ";
        $bodyMessage .= $email;
        $bodyMessage .= "\n";


        $bodyMessage .= "Mensaje: ";
        $bodyMessage .= $message;
        $bodyMessage .= "\n";

        // Address
        $sendTo = 'fmattaperdomo@gmail.com';
        $subject = 'Nuevo mensaje de mi sitio web';

        $success = mail($sendTo,$subject,$bodyMessage,'from: ' . $email);
        echo 'success';
    }else {
        echo $errores;
    }


    
?>