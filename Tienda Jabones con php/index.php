<?php include "php/connect.txt" ?>
<?php include "php/head.txt" ?>

<!-- CONTENIDO -->
<?php
error_reporting(0);
$sql = 'SELECT * from productos INNER JOIN imagenesproductos on productos.id = 
    imagenesproductos.idproducto where productos.activado = 1 and existencias > 0 group by productos.id';
$result = $conn->query($sql);

    echo "<section class='shop' id='shop'>";
    echo "<div class='container'>";
    
while ($valores = $result->fetch(PDO::FETCH_ASSOC)) {

    $id = $valores['idproducto'];

    echo "<div class='box' style='border:1px solid black;'>";
     //Parte para rederigir a producto.php para ver las imagenes de cada producto.
    echo "<a href='producto.php?id=".$valores['idproducto']."'>";
    echo "<img src=photo2/" . $valores['imagen'] . " style='width: 200px;heigth: 200px;'>";
    echo "<h2 style='color:black;'>" . $valores['nombre'] . "</h2>";
    //5% de descuento para los ususarios registrados.
    if ($_SESSION['tipo'] == '0') {
        echo "<h4 style='color:black;text-decoration:line-through;'>" . $valores['precio'] . " €</h4>";
        echo "<h4 style='color:red;'>" . ($valores['precio'] * 0.95) . " €</h4>";
    }else{
        echo "<h4 style='color:black;'>" . $valores['precio'] . " €</h4>";
    }
    echo "<h4 style='color:black;'>" . $valores['peso'] . "g</h4>";
    echo "<div class='cart'>";
    echo "<a href='#'><i class='bx bx-cart' ></i></a>";
    echo "</div>";
    echo "</a>";
    if ($_SESSION['tipo'] == '0') {
        echo "<h5><a href='#' style='color:black;border:2px solid black;padding:2px;'>AÑADIR AL CARRITO</a></h5>";
    }else{
        echo "<h5><a href='#' style='color:black;border:2px solid black;padding:2px;display: none;'>AÑADIR AL CARRITO</a></h5>";
    }
    echo "</div>";
}

echo "</div>";
echo "</section>";
    

?>
<!-- FIN CONTENIDO -->

<?php include "php/footer.txt" ?>
