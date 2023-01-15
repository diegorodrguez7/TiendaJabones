<!-- Cerrar conexión -->
<?php $conn = null;?>
<?php
    function contadorvisitas()//  La función que ejecutara las visitas
    {
        $archivo = "contadorvisitas.txt"; //el archivo donde se almacena las visitas
        $f = fopen($archivo, "r"); //abrimos el fichero
        if($f)
        {
            $contadorvisitas = fread($f, filesize($archivo)); //vemos el archivo a grabar
            $contadorvisitas = $contadorvisitas + 1; // Le agregamos una visita mas al contador
            fclose($f);
        }
        $f = fopen($archivo, "w+");
        if($f)
        {
            fwrite($f, $contadorvisitas);
            fclose($f);
        }
        return $contadorvisitas;
    }
	
?>
<!-- Div que cierra el container de la zona de contenido de la pagina -->
<div class="last" style='position:fixed;bottom:0px;width:100%;'>
  <a href="mailto:drplaybasketball17@gmail.com?Subject=Saber%20más%20de%20la%20tienda"><i class='bx bxl-gmail' style='color:black;font-size: 24px;'></i></a>
  <a href="https://api.whatsapp.com/send?phone=+34645405517&text=Hola%20,te%20asesoramos%20por%20whatsapp. Gestiona%20tu%20compra%20por%20este%20canal."><i class='bx bxl-whatsapp' style='color:black;font-size: 24px;'></i></a>
  <p>© 2022 by Diego Rodríguez Jacinto. 2DAW-DSW</p>

  <!-- imprime las visitas -->
  <p><?php echo "Visitas totales: ".contadorvisitas();?></p>
  
</div>

<!----custom js link--->
<script src="js/script.js"></script>

</body>
</html>