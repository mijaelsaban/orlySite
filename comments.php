<?php
session_start();
require 'lib/phpMailer/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
// $name= $_POST['name'];
// $email=$_POST['email'];
// $comment=$_POST['comments'];
//
// //para agregar usuarios de la manera de un renglon
// $users=file_get_contents('datos.json', true);
// $users=json_decode($users, true);
// $newUser[]=[
//     'name'=>$name,
//     'email'=>$email,
//     'comment'=>$comment
// ];

// //esta linea es para agregar usuarios nuevos a los viejos
// $users[]=$newUser;
// file_put_contents('datos.json',json_encode($users, true));
$name= $_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comments'];
$errors=[];
if (isset($_POST)) {
    if ($name=='') {
        $errors[]='*Completar el Nombre';
    }else{
		$_SESSION['nombre'] = $name;
	}
    if ($email=='') {
        $errors[]='*Completar Email';
    }else{
		$_SESSION['email'] = $email;
	}
    if ($comment=='') {
        $errors[]='*Completar Comentario';
    }else{
		$_SESSION['comment'] = $comment;
	}
    if (count($errors)) {
        $_SESSION['errors']=$errors;
        header('Location: contacto.php');
    }else {
        $name= $_POST['name'];
        $email=$_POST['email'];
        $comment=$_POST['comments'];
        $newUser[]=[
            'name'=>$name,
            'email'=>$email,
            'comment'=>$comment
        ];
        // PHP_EOL end of line y file append agrega datos
        file_put_contents('datos.json',json_encode($newUser, true). PHP_EOL, FILE_APPEND|LOCK_EX);
        $_SESSION['exito']='El mensaje fue enviado correctamente';
        

        mail('mijaelsaban@gmail.com', 'mail desde web', "message: .  '.$comment' nombre '.$name' email: '.$email' ");
        header('LOCATION: contacto.php');

    }
}
