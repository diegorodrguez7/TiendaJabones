<?php include "php/connect.txt" ?>
<?php include "php/head.txt" ?>

    <?php
        $id = $_GET['id'];
        $sql = 'SELECT * from imagenesproductos where idproducto =' . $id . ';';
        $result = $conn->query($sql);

        echo "<section class='shop' id='shop'>";
        echo "<div class='container'>";
    
        while ($valores = $result->fetch(PDO::FETCH_ASSOC)) {

            $id = $valores['idproducto'];

            echo "<div class='box'>";
            echo "<img src=photo2/" . $valores['imagen'] . " style='width: 150px;heigth: 150px;'>";
            echo "<h5>" . $valores['titulo'] . "</h5>";
            echo "<h4>" . $valores['descripcion'] . "</h4>";
            echo "</div>";
        }

        echo "</div>";
        echo "</section>";

        ?>

<?php include "php/footer.txt" ?>