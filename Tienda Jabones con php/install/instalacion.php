<?php
        require_once('sql-formatter-master/lib/SqlFormatter.php');

        //Nombre servidor
        $servername = "localhost";

        //Credenciales Root
        $username = "root";
        $password = "";

        //Credenciales Admin
        $adminUser = "admin";
        $adminPass = "admin";

        //Nombre BD
        $dbname = "Jabones_SL_Diego";

        //Ruta archivo BD
        $sqlPath = "tiendajabones.sql";

    try {
        //?Crear la conexión.
        $conn = new PDO("mysql:host=$servername;", $username, $password);
        //?Setear el error en excepciones.
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "<h4 style='color:blue;'>Connectado correctamente como usuario $username para crear la base de datos.</h4><br>";
        $sql = "create database if not exists $dbname;";
        $sql .= "create user if not exists '$adminUser'@'$servername' identified by '$adminPass';";
        $sql .= "grant all privileges on $dbname.* to '$adminUser'@'$servername' with grant OPTION;";
        $sql .= "grant CREATE USER on *.* to '$adminUser'@'$servername';";

        $conn->exec($sql);
        echo "<h5 style='color:green;'>Se ha creado la base de datos: <b>$dbname</b>.</h5><br>";
        echo "<h5 style='color:green;'>Se ha creado el usuario: <b>$adminUser</b>.</h5><br>";
    } catch (PDOException $e) {
        //?Capturando la excepción.
        echo $sql . "<br>" . $e->getMessage();
    }

    //?cerrar sesion y resetear variable a nula.
    $conn = null;

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

    //?cerrar sesion y resetear variable a nula.
    $conn = null;

?>

