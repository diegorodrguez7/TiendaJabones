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
        text-transform: uppercase;
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
        <h1 style="padding-top:10px;">CLIENTES</h1>
    </div>
</section>

    <?php

        // Recuperar el ID de usuario desde la variable de sesión
        $user_id = $_SESSION['idusuario'];

        // Filtrar la consulta de pedidos por el ID de usuario
        $sql = "select pedidos.fecha f, pedidos.estado e, productos.nombre n\n"
        . "from clientes \n"
        . "inner join pedidos on clientes.id = pedidos.idcliente \n"
        . "inner join lineaspedido on pedidos.id = lineaspedido.idpedido \n"
        . "inner join productos on lineaspedido.idproducto = productos.id WHERE clientes.id = '$user_id';";
        $result = $conn->query($sql);
            
            echo '<section class="about" id="about" style="margin-left:20%;margin-right:20%;">';
            echo "<table>";
            echo "<tr><td>PRODUCTO</td><td>FECHA</td><td>ESTADO</td></tr>";
            
            while ($valores2 = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                <td><input type='text' name='fecha' value='".$valores2['n']."' readonly></td>
                <td><input type='text' name='estado' value='".$valores2['f']."' readonly></td>
                <td><input type='text' name='fecha' value='".$valores2['e']."' readonly></td>
                </tr>";
            }   

            echo "</table>";
            echo '</section>';

    ?>

<?php include "php/footer.txt" ?>