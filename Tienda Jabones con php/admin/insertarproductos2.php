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
   $desc = limpiar($_POST['desc']);
   $precio = limpiar($_POST['precio']);
   $peso = limpiar($_POST['peso']);
   $longitud =  limpiar($_POST['longitud']);
   $anchura = limpiar($_POST['anchura']);
   $altura = limpiar($_POST['altura']);
   $existencias = limpiar($_POST['existencias']);
   $activado = limpiar($_POST['activado']);
   $sql = $conn->prepare("INSERT INTO productos VALUES(NULL, '$nombre', '$desc', '$peso','$precio', '$longitud', '$anchura', '$altura', '$existencias', '$activado')");
   $sql->execute();

   //Meter varias 1 o varias imagenes.
   $count = count($_FILES['Imagen']['tmp_name']);
   for ($i=0; $i < $count; $i++) { 
   if($_FILES['Imagen']['type'][$i] == "image/gif" || $_FILES['Imagen']['type'][$i] == "image/jpeg" || $_FILES['Imagen']['type'][$i] == "image/png"){
    $rutaEnServidor = '../photo2';
    $rutaTemportal = $_FILES['Imagen']['tmp_name'][$i];
    $nombreImagen = $_FILES['Imagen']['name'][$i];
    $rutaDestino = $rutaEnServidor."/".$nombreImagen;
    move_uploaded_file($rutaTemportal, $rutaDestino);
   }
   $conn->exec("INSERT INTO imagenesproductos VALUES(NULL, (SELECT id FROM productos ORDER BY id DESC limit 1), '$nombreImagen', '$nombre', NULL)");
}
   //Vuelve a index.php cuando inserta el producto
   header("refresh:1; url=administrador.php");

} catch (PDOException $e) {
    echo $e;
}

?>
