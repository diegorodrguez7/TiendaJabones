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
    $id = limpiar($_POST['id']);

    $nombre =  $_POST['nombre'];
    $precio = $_POST['precio'];
    $peso = $_POST['peso'];
    $longitud = $_POST['longitud'];
    $anchura = $_POST['anchura'];
    $altura = $_POST['altura'];
    $stock = $_POST['stock'];
    $visible = $_POST['visible'];
    $mensaje = $_POST['mensaje'];
    

    $sql = $conn->prepare("UPDATE productos SET nombre = '$nombre', precio = '$precio' WHERE id = " . $id . ";");
    $sql->execute();

    header("refresh:1; url=administrador.php");

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>