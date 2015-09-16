<?php
session_start();
	$nivel = $_SESSION["tipo_usu"];
	$nom=$_SESSION["nombre"];
	include('fondo.php');
?>


<body>
	
	<ul>
			<?php if($nivel == "super_usuario"){ 

			echo "<script type='text/javascript'>  alert('Bienvenido Super_usuario'); document.location.href = '../super_usuario.php'; </script>";
					

			 } ?>
			 <?php if($nivel == "operador"){ 

			echo "<script type='text/javascript'>  alert('Bienvenido operador'); document.location.href = '../operador.php'; </script>";
					

			 } ?>
		
		
		
			<?php if($nivel == "invitado"){ 
			
			echo "<script type='text/javascript'>  alert('Bienvenido Invitado'); document.location.href = '../invitado.php'; </script>";
			

			} ?>
			
			
	</ul>
</body>