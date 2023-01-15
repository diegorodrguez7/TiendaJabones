<?php include "php/connect.txt" ?>
<?php include "php/head.txt" ?>

<style>
    input[type='text'],
    [type='password'] {
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
    [type='password']:focus {
        outline: none;
        padding: 0 0 0.875em 0;
    }
</style>

<section class="about" id="about" style="background-image: url('img/fondo.jpg');background-color: #cccccc;">
    <div class="about-content">
        <h1 style="padding-top:10px;">REGISTRARSE</h1>
    </div>
</section>
<section class="about" id="about" style="margin-left:20%;margin-right:20%;">
    <form action="register2.php" method="post">
            Nombre<input type="text" name="nombre" id="">
            Apellidos<input type="text" name="apellidos" id="">
            Email<input type="text" name="email" id="">
            Usuario<input type="text" name="user" id="">
            Contraseña<input type="password" name="pass" id=""><br><br>     
        <input type="submit" value="ENVIAR" style="color:black;border:2px solid black;padding:2px;cursor:pointer;">
        <input type="reset" value="BORRAR" style="color:black;border:2px solid black;padding:2px;cursor:pointer;">
    </form>
</section>


<?php include "php/footer.txt" ?>