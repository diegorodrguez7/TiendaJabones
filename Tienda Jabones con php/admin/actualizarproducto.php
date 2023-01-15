<?php include "php/connect.txt" ?>
<?php include "php/head.txt" ?>

<style>
    table {
        background: none;
        border: none;
        border-bottom: solid 2px black;
        color: black;
        font-size: 1.000em;
        font-weight: 400;
        letter-spacing: 1px;
        margin: 0em 0 1.875em 0;
        padding: 0 0 0.875em 0;
        width: 100%;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        -o-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    table {
        outline: none;
        padding: 0 0 0.875em 0;
    }
</style>

<section class="about" id="about" style="background-image: url('../img/fondo.jpg');background-color: #cccccc;">
		<div class="about-content">
        <h1 style="padding-top:10px;">ACTUALIZAR PRODUCTO</h1>
		</div>
</section>

<section class="about" id="about" style="margin-left:20%;margin-right:20%;">
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Producto a actualizar: <select class="" name="actualizar">
        <option value="" disabled selected>Elige un producto...</option>
        <?php
            $sql = "SELECT id, nombre from productos;";
            $result = $conn->query($sql);
        while ($valores = $result->fetch(PDO::FETCH_ASSOC)) {
          echo "<option value=" . $valores['id'] . ">" . $valores['nombre'] . "</option>";
        }
        ?>
        </select><br>
        <input type="submit" value="ENVIAR" style="color:black;border:2px solid black;padding:2px;cursor:pointer;">
    </form>
</section>

        <?php
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    echo '<section class="about" id="about" style="margin-left:20%;margin-right:20%;">
    <form action="actualizarproducto2.php" method="post">';

    echo "<input type='hidden' name='id' value='" . $_POST['actualizar'] . "'>";
        
        $sql = 'SELECT * from productos WHERE id =  ' . $_POST['actualizar'].';';
        $result = $conn->query($sql);
        echo "<table>";
        echo "<tr><th>NOMBRE</th><th>PRECIO</th><th>PESO</th><th>LONGITUD</th><th>ANCHURA</th><th>ALTURA</th><th>STOCK</th><th>VISIBILIDAD</th><th>DESCRIPCIÓN</th></tr>";
        
        while ($valores2 = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
            <td><input type='text' name='nombre' value='".$valores2['nombre']."'></td>
            <td><input type='number' name='precio' value='".$valores2['precio']."'></td>
            <td><input type='number' name='peso' value='".$valores2['peso']."'></td>
            <td><input type='number' name='longitud' value='".$valores2['longitud']."'></td>
            <td><input type='number' name='anchura' value='".$valores2['anchura']."'></td>
            <td><input type='number' name='altura' value='".$valores2['altura']."'></td>
            <td><input type='number' name='stock' value='".$valores2['existencias']."'></td>
            <td><input type='number' name='visible' value='".$valores2['activado']."'></td>
            <td><textarea name='mensaje' rows='7' cols='40' required style='resize:none;border:2px solid black;'>".$valores2['descripcion']."</textarea></td>
            </tr>";
        }   

        echo "</table>";
        echo '<input type="submit" value="ACTUALIZAR" style="color:black;border:2px solid black;padding:2px;cursor:pointer;">';
        echo '</form>
        </section>';
} 
        ?>
        
<?php

$sql = 'SELECT * from productos INNER JOIN imagenesproductos on productos.id = 
    imagenesproductos.idproducto where productos.activado = 1 and existencias > 0 group by productos.id';
$result = $conn->query($sql);

echo "<section class='shop' id='shop'>";
echo "<div class='container'>";

while ($valores = $result->fetch(PDO::FETCH_ASSOC)) {

    $id = $valores['idproducto'];

    echo "<div class='box'>";
    echo "<img src=../photo2/" . $valores['imagen'] . " style='width: 200px;heigth: 200px;'>";
    echo "<h5>" . $valores['titulo'] . "</h5>";
    echo "</div>";
}

echo "</div>";
echo "</section>";

?>

<?php include "php/footer.txt" ?>