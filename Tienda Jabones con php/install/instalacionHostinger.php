<?php
        require_once('sql-formatter-master/lib/SqlFormatter.php');

        //Nombre servidor
        $servername = "localhost";

        //Credenciales Root
        $username = "root";
        $password = "";

        //Credenciales Admin
        $adminUser = "u674705277.diegor";
        $adminPass = "12345678Dd";

        //Nombre BD
        $dbname = "u674705277.diegor";

        //Ruta archivo BD
        $sqlPath = "tiendajabones.sql";

    try {
        $conn = new PDO("mysql:host=$servername; dbname=$dbname;", $adminUser, $adminPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "<h4 style='color:blue;'>Connectado correctamente como usuario $adminUser para crear tablas y rellenar datos iniciales.</h4><br>";

        //Cargar fichero tiendaonline.sql
        $sql = file_get_contents($sqlPath);

        $conn->exec($sql);
        echo "<h5 style='color:green;'>Tablas creadas a partir del archivo <b>$sqlPath</b>.</h5><br>";
        echo "<h5 style='color:green;'>Instalación finalizada con éxito.</h5><br>";
        echo "<h5 style='color:red;'>Se han ejecutado las siguientes sentencias:</h5><br>";
        echo SqlFormatter::highlight($sql);
    } catch (PDOException $e) {
        echo SqlFormatter::highlight($sql) . "<br>"  . $e->getMessage() . "<br>";
    }

?>

