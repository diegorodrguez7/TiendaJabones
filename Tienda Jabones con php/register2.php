<?php include "php/connect.txt" ?>

<?php 

//Funcion limpiar texto
function limpiar($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {
   $nombre =  limpiar($_POST['nombre']);
   $apellidos = limpiar($_POST['apellidos']);
   $email = limpiar($_POST['email']);
   $user = limpiar($_POST['user']);
   $pass =  limpiar($_POST['pass']);
   $pass = hash('sha256', $pass);
   $_SERVER['PHP_AUTH_USER'] = $user;
   $_SERVER['PHP_AUTH_PW'] = $pass;
   $sql = $conn->prepare("INSERT INTO clientes VALUES(NULL, '$nombre', '$apellidos', '$email', '$user', '$pass', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");
   $sql->execute();

   //Vuelve a index.php cuando inserta el cliente
   header("refresh:1; url=index.php");

} catch (PDOException $e) {
    echo $e;
}

?>