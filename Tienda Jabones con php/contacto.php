<?php include "php/connect.txt" ?>
<?php include "php/head.txt" ?>

<style>
    input[type='text'],
    [type='mensaje'] {
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
    [type='mensaje']:focus {
        outline: none;
        padding: 0 0 0.875em 0;
    }
</style>

<section class="about" id="about" style="background-image: url('img/fondo.jpg');background-color: #cccccc;">
    <div class="about-content">
        <h1 style="padding-top:10px;">CONTÁCTANOS.</h1>
        <h2 style="padding-top:10px;">SOLVENTAMOS TUS DUDAS.</h2>
    </div>
</section>

<section class="about" id="about">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        NOMBRE <input type="text" name="nombre" required><br>
        ASUNTO <input type="text" name="asunto" required><br>
		EMAIL <input type="text" name="email" required><br>
        <textarea name="mensaje" rows="7" cols="40" required style="resize:none;border:2px solid black;"></textarea><br><br>
		<input type="submit" name="submit" value="Enviar" required style="color:black;border:2px solid black;padding:2px;cursor:pointer;">
	</form>
</section>

    <?php

        //Funcion limpiar texto
        function limpiar($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $destinatario = 'drplaybasketball17@gmail.com';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nombre = limpiar($_POST["nombre"]);
            $asunto = limpiar($_POST["asunto"]);
            $email = limpiar($_POST["email"]);
            $mensaje = limpiar($_POST["mensaje"]);

            $cabecera = 'Mensaje enviado desde Jabones Diego SL.';
            $mensaje_completo = $mensaje . "\nAtentamente: " . $nombre . "\nCorreo de contacto: " . $email;

            mail($destinatario, $asunto, $mensaje_completo, $cabecera);

            if (mail($destinatario, $asunto, $mensaje_completo, $cabecera) == true) {
                echo "<script>alert('CORREO ENVIADO EXITOSAMENTE. Volviendo a Inicio.')</script>";
                header( "refresh:2;url=index.php" );
            } else {
                echo "<script>alert('CORREO NO ENVIADO. Volviendo a Inicio.')</script>";
                header( "refresh:2;url=index.php" );
            }
        }

    ?>

<?php include "php/footer.txt" ?>