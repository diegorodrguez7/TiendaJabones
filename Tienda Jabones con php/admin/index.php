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

<section class="about" id="about" style="background-image: url('../img/fondo.jpg');background-color: #cccccc;">
    <div class="about-content">
        <h1 style="padding-top:10px;">INICIAR SESIÓN</h1>
    </div>
</section>
<section class="about" id="about" style="margin-left:20%;margin-right:20%;">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        USUARIO <input type="text" name="user">
        CONTRASEÑA <input type="password" name="pass"><br><br>
        <input type="submit" value="ENVIAR" style="color:black;border:2px solid black;padding:2px;cursor:pointer;">
        <input type="reset" value="BORRAR" style="color:black;border:2px solid black;padding:2px;cursor:pointer;">
    </form>
</section>

<?php
error_reporting(0);
$_SESSION['tipo'] ="";

//Funcion limpiar texto
function limpiar($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = limpiar($_POST["user"]);
    $pass = limpiar($_POST["pass"]);
    $pass = hash('sha256', $pass);

    $sql = "SELECT * FROM clientes";
    $result = $conn->query($sql);

    $_SERVER['PHP_AUTH_USER'] = $user;
    $_SERVER['PHP_AUTH_PW'] = $pass;

    while ($valores = $result->fetch(PDO::FETCH_ASSOC)) {
        if ($valores['usuario'] == $_SERVER['PHP_AUTH_USER'] && $valores['contrasena'] == $_SERVER['PHP_AUTH_PW']) {
            //Si es 1, es admin. Si es 0, cliente normal.
            $_SESSION['tipo'] = $valores['tipo'];
            $_SESSION['usuario'] = $valores['nombre'];
            $_SESSION['idusuario'] = $valores['id'];
        }
    }

    if ($_SESSION['tipo'] == '1') {
        header( "refresh:1;url=administrador.php" );
        echo "<div class='about-content'>";
        echo "<h1>Hola, administrador.</h1>";
        echo "</div>";
    } elseif ($_SESSION['tipo'] == '0') {
        header( "refresh:1;url=../clientes" );
        echo "<div class='about-content'>";
        echo "<h1>Hola, estimado cliente.</h1>";
        echo "</div>";
    } else{
        header( "refresh:2;url=../register.php" );
        echo "<div class='about-content'>";
        echo "<h1>Eres usuario sin registrar. Estás siendo redirigido para registrarte.</h1>";
        echo "</div>";
    }
}

?>

<?php include "php/footer.txt" ?>