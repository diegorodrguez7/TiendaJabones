<?php include "php/connect.txt" ?>

<?php 
error_reporting(0);
//Funcion limpiar texto
function limpiar($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {

    
    $id = limpiar($_POST['borrar']);

    $sqlB = "SELECT imagen FROM imagenesproductos WHERE `idproducto` = " . $id . "";
    $sql = $conn->prepare("DELETE FROM imagenesproductos WHERE `idproducto` = " . $id . "");
    $sql2 = $conn->prepare("DELETE FROM productos WHERE id = " . $id . ";");
    $result = $conn->query($sqlB);
    $sql->execute();
    $sql2->execute();
    
    while ($valores = $result->fetch(PDO::FETCH_ASSOC)) {
        unlink('../photo2/' . $valores['imagen']);
    }
    

    header("refresh:1; url=administrador.php");

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
