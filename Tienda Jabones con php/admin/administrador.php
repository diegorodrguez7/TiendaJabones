<?php include "php/connect.txt" ?>
<?php include "php/head.txt" ?>

<?php 
if ($_SESSION['tipo'] != '1') {
	header("location:../index.php");
}
?>

<section class="about" id="about" style="margin-top:10%;background-image: url('../img/fondo.jpg');background-color: #cccccc;">
	<div class='box2' style="padding:20px;">
		<div class="about-content">
            <h2 style="color:white;">PANEL ADMINISTRADOR</h2><br>
			<h2><i class='bx bxs-user-circle'></i><a href="#" style="color:black;">GESTIONAR PRODUCTOS</a></h2>
				<ul>
					<div class="contact-content">
						<li><h3><a href="insertarproductos.php" style="color:white;"><i class='bx bxs-user'></i>INSERTAR PRODUCTOS</a></h3></li><br>
					</div>
					<div class="contact-content">	
						<li><h3><a href="borrarproductos.php" style="color:white;"><i class='bx bxs-user'></i>BORRAR PRODUCTOS</a></h3></li><br>
					</div>
					<div class="contact-content">	
						<li><h3><a href="actualizarproducto.php" style="color:white;"><i class='bx bxs-user'></i>ACTUALIZAR PRODUCTOS</a></h3></li>
					</div>
				</ul>
		</div>
	</div>
</section>
            
<?php include "php/footer.txt" ?>