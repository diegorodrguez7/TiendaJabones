<?php include "php/connect.txt" ?>
<?php include "php/head.txt" ?>

<style>
    input[type='text'],
    [type='number'] {
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

    input[type='text']:focus,
    [type='number']:focus {
        outline: none;
        padding: 0 0 0.875em 0;
    }
</style>

<section class="about" id="about" style="background-image: url('../img/fondo.jpg');background-color: #cccccc;">
		<div class="about-content">
        <h1 style="padding-top:10px;">INSERTAR PRODUCTO NUEVO</h1>
		</div>
</section>
<section class="about" id="about" style="margin-left:20%;margin-right:20%;">
        <form action="insertarproductos2.php" method="post" enctype="multipart/form-data">
            Nombre<input type="text" name="nombre" id="">
            Descripción<input type="text" name="desc" id="">
            Precio<input type="number" name="precio" id="">
            Peso<input type="number" name="peso" id="">
            Longitud<input type="number" name="longitud" id="">      
            Anchura<input type="number" name="anchura" id="">
            Altura<input type="number" name="altura" id="">
            Stock<input type="number" name="existencias" id="" placeholder="Mayor que 0, por favor." required>
            Visibilidad en la página principal <select name="activado">
                <option value="" disabled selected>Elige una opción...</option>
                <option value="1">Visible</option>
                <option value="0">Invisible</option>
            </select><br><br>
            Imagen/es <input type="file" name="Imagen[]" id="" multiple><br><br>
            <input type="submit" value="INSERTAR" style="color:black;border:2px solid black;padding:2px;cursor:pointer;">
        </form>
</section>
<?php

$sql = 'SELECT * from productos INNER JOIN imagenesproductos on productos.id = 
    imagenesproductos.idproducto where productos.activado = 1 and existencias > 0 group by productos.id';
$result = $conn->query($sql);

echo "<section class='shop' id='shop'>";
echo "<div class='container'>";

while ($valores = $result->fetch(PDO::FETCH_ASSOC)) {

    $id = $valores['idproducto'];

    echo "<div class='box'>";
    echo "<img src=../photo2/" . $valores['imagen'] . " style='width: 200px;height: 200px;'>";
    echo "<h5>" . $valores['titulo'] . "</h5>";
    echo "</div>";
}

echo "</div>";
echo "</section>";

?>

<?php include "php/footer.txt" ?>