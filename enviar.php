<?php 
    
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    //Comprobar nombre
    if(!empty($nombre)){
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    }

    //Comprobar correo
    if(!empty($correo)){
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
    }

    //Comprobar asunto
    if(!empty($asunto)){
        $asunto = htmlspecialchars($asunto);
        $asunto = trim($asunto); 
        $asunto = stripslashes($asunto);           
    }

    //Comprobar mensaje
    if(!empty($mensaje)){
        $mensaje = htmlspecialchars($mensaje);
        $mensaje = trim($mensaje);
        $mensaje = stripslashes($mensaje);
    }

    $enviar_a = "proyectos@jjingenieria.cl";
    $mensaje_preparado = "De: $nombre \n";
    $mensaje_preparado .= "Correo: $correo \n";		
    $mensaje_preparado .= "Mensaje: " . $mensaje;

    mail($enviar_a, $asunto, $mensaje_preparado);           
    header("Location: enviado.php");        
