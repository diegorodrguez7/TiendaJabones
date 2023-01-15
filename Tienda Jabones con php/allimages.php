<?php include "php/connect.txt" ?>
<?php include "php/head.txt" ?>

    <?php

        $sql = 'SELECT * from imagenesproductos;';
        $result = $conn->query($sql);

        echo "<section class='shop' id='shop' style='background-color:rgba(231, 141, 141, 0.669);'>";
        echo "<div class='container'>";
    
        while ($valores = $result->fetch(PDO::FETCH_ASSOC)) {

            echo "<div class='box' style='background-color:white;border:1px solid black;'>";
            echo "<img src=photo2/" . $valores['imagen'] . " style='width: 150px;heigth: 150px;'>";
            echo "</div>";

        }

        echo "</div>";
        echo "</section>";

        ?>

<?php include "php/footer.txt" ?>