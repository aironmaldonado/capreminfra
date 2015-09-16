<?session_start();
include("opciones/seguridad.php");
					
					$id=$_SESSION["usuid"];
					$ced=$_SESSION["usuced"];
					$_SESSION["usunom"]; 
					$_SESSION["usuapel"]; 
					$_SESSION["usuusu"]; 
					$_SESSION["usuclave"]; 
					$_SESSION["usustatus"];
					$_SESSION["nombre_pc"];
					$_SESSION["hora"];
					$_SESSION["fecha"];		
					
					
?>       

				<link rel="stylesheet" href="css/menu_css/menu.css" type="text/css" />
            <!-- librerias y estilos de menu-->
            	<link rel="stylesheet" href="Css/menu_css/estructura.css" type="text/css" />
				<script src="JavaScript/menu_js/jquery.min.js"></script>
				<script src="JavaScript/menu_js/main.js"></script>
            <!------------------------------->
			
			<!-- librerias y estilos de menu-->
			<link rel="stylesheet" href="css/menu_css/menu_izq.css" type="text/css" charset="utf-8"/>
			<script type="text/javascript" src="JavaScript/menu_izq_js/jquery-1.3.2.js"></script>
			<script type="text/javascript" src="JavaScript/menu_izq_js/menu_izq.js"></script>
			
			<!------------------------------->
</head>

<body>
<div class="center">





	




<?
		include("opciones/conexion_panel_herramienta.php"); 
		


		$buscar = mysql_query ("select * from usuarios as usu inner join roles_usuarios as ru on(usu.cod_usuarios=ru.cod_usuarios)  where cedula ='$ced'",$conex);
				    while($vec1=mysql_fetch_assoc($buscar))
							{
						$cod_usuarios=$vec1["cod_usuarios"];
						$cod_atencion_socio=$vec1["cod_atencion_socio"];
						$cod_auditoria=$vec1["cod_auditoria"];
						$cod_caja=$vec1["cod_caja"];
						$cod_contabilidad=$vec1["cod_contabilidad"];
						$cod_credito=$vec1["cod_credito"];
						$cod_reporte=$vec1["cod_reporte"];
						$cod_tesoreria=$vec1["cod_tesoreria"];
						$cod_cobranza=$vec1["cod_cobranza"];
						$cod_archivo=$vec1["cod_archivo"];
						$cod_herramienta=$vec1["cod_herramienta"];
						$cod_menu_izquierdo=$vec1["cod_menu_izquierdo"];
							}
						
						$buscar = mysql_query ("SELECT * FROM menu_izquierdo WHERE cod_menu_izquierdo='$cod_menu_izquierdo' ",$conex);
				    while($vec1=mysql_fetch_assoc($buscar))
							{
						
						$img_edo_cuenta=$vec1["img_edo_cuenta"];
						$img_analitico=$vec1["img_analitico"];
						$img_AFallecimiento=$vec1["img_AFallecimiento"];
						$img_Solicitudes=$vec1["img_Solicitudes"];
						$img_CPrestamo=$vec1["img_CPrestamo"];
						
						$Link_EdoCuenta=$vec1["Link_EdoCuenta"];
						$Link_Analitico=$vec1["Link_Analitico"];
						$Link_AFallecimiento=$vec1["Link_AFallecimiento"];
						$Link_Solicitudes=$vec1["Link_Solicitudes"];
						$Link_CPrestamo=$vec1["Link_CPrestamo"];
						
							
							}
							
							
							$buscar = mysql_query ("SELECT * FROM atencion_socio WHERE cod_atencion_socio='$cod_atencion_socio' ",$conex);
				    while($vec1=mysql_fetch_assoc($buscar))
							{
						$img_atencion_socio=$vec1["img_atencion_socio"];
						$opcion11=$vec1["opcion11"];
						$opcion12=$vec1["opcion12"];
						$opcion13=$vec1["opcion13"];
						$opcion14=$vec1["opcion14"];
						$opcion15=$vec1["opcion15"];
						$opcion16=$vec1["opcion16"];
						$opcion17=$vec1["opcion17"];
						$opcion18=$vec1["opcion18"];
						$opcion19=$vec1["opcion19"];
						
						
						$Link11=$vec1["Link11"];
						$Link12=$vec1["Link12"];
						$Link13=$vec1["Link13"];
						$Link14=$vec1["Link14"];
						$Link15=$vec1["Link15"];
						$Link16=$vec1["Link16"];
						$Link17=$vec1["Link17"];
						$Link18=$vec1["Link18"];
						$Link19=$vec1["Link19"];
							
							}
							
							
							
							$buscar = mysql_query ("SELECT * FROM credito WHERE cod_credito='$cod_credito' ",$conex);
				    while($vec1=mysql_fetch_assoc($buscar))
							{
						$img_credito=$vec1["img_credito"];
						$opcion21=$vec1["opcion21"];
						$opcion22=$vec1["opcion22"];
						$opcion23=$vec1["opcion23"];
						$opcion24=$vec1["opcion24"];
						$opcion25=$vec1["opcion25"];
						$opcion26=$vec1["opcion26"];
						
						
						$Link21=$vec1["Link21"];
						$Link22=$vec1["Link22"];
						$Link23=$vec1["Link23"];
						$Link24=$vec1["Link24"];
						$Link25=$vec1["Link25"];
						$Link26=$vec1["Link26"];
							
							}
							
								$buscar = mysql_query ("SELECT * FROM cobranza WHERE cod_cobranza='$cod_cobranza' ",$conex);
				    while($vec1=mysql_fetch_assoc($buscar))
							{
						$img_cobranza=$vec1["img_cobranza"];
						$opcion31=$vec1["opcion31"];
						$opcion32=$vec1["opcion32"];
						$opcion33=$vec1["opcion33"];
						$opcion34=$vec1["opcion34"];
						$opcion35=$vec1["opcion35"];
						$opcion36=$vec1["opcion36"];
						
						
						$Link31=$vec1["Link31"];
						$Link32=$vec1["Link32"];
						$Link33=$vec1["Link33"];
						$Link34=$vec1["Link34"];
						$Link35=$vec1["Link35"];
						$Link36=$vec1["Link36"];
							
							}
								
								
								$buscar = mysql_query ("SELECT * FROM tesoreria WHERE cod_tesoreria='$cod_tesoreria' ",$conex);
				    while($vec1=mysql_fetch_assoc($buscar))
							{
						$img_tesoreria=$vec1["img_tesoreria"];
						$opcion41=$vec1["opcion41"];
						$opcion42=$vec1["opcion42"];
						$opcion43=$vec1["opcion43"];
						$opcion44=$vec1["opcion44"];
						$opcion45=$vec1["opcion45"];
						$opcion46=$vec1["opcion46"];
						$opcion47=$vec1["opcion47"];
						$opcion48=$vec1["opcion48"];
						$opcion49=$vec1["opcion49"];
						
						
						$Link41=$vec1["Link41"];
						$Link42=$vec1["Link42"];
						$Link43=$vec1["Link43"];
						$Link44=$vec1["Link44"];
						$Link45=$vec1["Link45"];
						$Link46=$vec1["Link46"];
						$Link47=$vec1["Link47"];
						$Link48=$vec1["Link48"];
						$Link49=$vec1["Link49"];
							}
							
							$buscar = mysql_query ("SELECT * FROM contabilidad WHERE cod_contabilidad='$cod_contabilidad' ",$conex);
				    while($vec1=mysql_fetch_assoc($buscar))
							{
						$img_contabilidad=$vec1["img_contabilidad"];
						$opcion51=$vec1["opcion51"];
						$opcion52=$vec1["opcion52"];
						$opcion53=$vec1["opcion53"];
						$opcion54=$vec1["opcion54"];
						$opcion55=$vec1["opcion55"];
						$opcion56=$vec1["opcion56"];
						
						
						$Link51=$vec1["Link51"];
						$Link52=$vec1["Link52"];
						$Link53=$vec1["Link53"];
						$Link54=$vec1["Link54"];
						$Link55=$vec1["Link55"];
						$Link56=$vec1["Link56"];
							
							}
							
							
								$buscar = mysql_query ("SELECT * FROM caja WHERE cod_caja='$cod_caja' ",$conex);
				    while($vec1=mysql_fetch_assoc($buscar))
							{
						$img_caja=$vec1["img_caja"];
						$opcion61=$vec1["opcion61"];
						$opcion62=$vec1["opcion62"];
						$opcion63=$vec1["opcion63"];
						$opcion64=$vec1["opcion64"];
						$opcion65=$vec1["opcion65"];
						$opcion66=$vec1["opcion66"];
						
						
						$Link61=$vec1["Link61"];
						$Link62=$vec1["Link62"];
						$Link63=$vec1["Link63"];
						$Link64=$vec1["Link64"];
						$Link65=$vec1["Link65"];
						$Link66=$vec1["Link66"];
							
							}
							
							$buscar = mysql_query ("SELECT * FROM auditoria WHERE cod_auditoria='$cod_auditoria' ",$conex);
				    while($vec1=mysql_fetch_assoc($buscar))
							{
						$img_auditoria=$vec1["img_auditoria"];
						$opcion71=$vec1["opcion71"];
						$opcion72=$vec1["opcion72"];
						$opcion73=$vec1["opcion73"];
						$opcion74=$vec1["opcion74"];
						$opcion75=$vec1["opcion75"];
						$opcion76=$vec1["opcion76"];
						
						
						$Link71=$vec1["Link71"];
						$Link72=$vec1["Link72"];
						$Link73=$vec1["Link73"];
						$Link74=$vec1["Link74"];
						$Link75=$vec1["Link75"];
						$Link76=$vec1["Link76"];
							
							}
							
							
							
							$buscar = mysql_query ("SELECT * FROM reporte WHERE cod_reporte='$cod_reporte' ",$conex);
				    while($vec1=mysql_fetch_assoc($buscar))
							{
						$img_reporte=$vec1["img_reporte"];
						$opcion81=$vec1["opcion81"];
						$opcion82=$vec1["opcion82"];
						$opcion83=$vec1["opcion83"];
						$opcion84=$vec1["opcion84"];
						$opcion85=$vec1["opcion85"];
						$opcion86=$vec1["opcion86"];
						
						
						$Link81=$vec1["Link81"];
						$Link82=$vec1["Link82"];
						$Link83=$vec1["Link83"];
						$Link84=$vec1["Link84"];
						$Link85=$vec1["Link85"];
						$Link86=$vec1["Link86"];
							
							}
							
								$buscar = mysql_query ("SELECT * FROM archivo WHERE cod_archivo='$cod_archivo' ",$conex);
				    while($vec1=mysql_fetch_assoc($buscar))
							{
						$img_archivo=$vec1["img_archivo"];
						$opcion91=$vec1["opcion91"];
						$opcion92=$vec1["opcion92"];
						$opcion93=$vec1["opcion93"];
						$opcion94=$vec1["opcion94"];
						$opcion95=$vec1["opcion95"];
						$opcion96=$vec1["opcion96"];
						
						
						$Link91=$vec1["Link91"];
						$Link92=$vec1["Link92"];
						$Link93=$vec1["Link93"];
						$Link94=$vec1["Link94"];
						$Link95=$vec1["Link95"];
						$Link96=$vec1["Link96"];
							
							}
							
							
								$buscar = mysql_query ("SELECT * FROM herramienta WHERE cod_herramienta='$cod_herramienta' ",$conex);
				    while($vec1=mysql_fetch_assoc($buscar))
							{
						$img_herramienta=$vec1["img_herramienta"];
						$opcion01=$vec1["opcion01"];
						$opcion02=$vec1["opcion02"];
						$opcion03=$vec1["opcion03"];
						$opcion04=$vec1["opcion04"];
						$opcion05=$vec1["opcion05"];
						$opcion06=$vec1["opcion06"];
						
						
						$Link01=$vec1["Link01"];
						$Link02=$vec1["Link02"];
						$Link03=$vec1["Link03"];
						$Link04=$vec1["Link04"];
						$Link05=$vec1["Link05"];
						$Link06=$vec1["Link06"];
							
							}
							
							
							
?>

		<ul class="menu_izq" id="navigation">
            <li class="home"><a href="esta" title="esta"> <img style='margin-top:16px; margin-left:2px;' src='imagen/menu_img/BotonEdoCuenta.png'/> </a></li>
            <li class="about"><a href="" title=""><img style='margin-top:16px; margin-left:2px;' src='imagen/menu_img/BotonAnalitico.png'/> </a></li>
            <li class="search"><a href="" title=""><img style='margin-top:16px; margin-left:2px;' src='imagen/menu_img/BotonAFallecimiento.png'/></a></li>
            <li class="photos"><a href="<?echo $Link_Solicitudes;?>" title=""><img style='margin-top:16px; margin-left:2px;' src='<?echo $img_Solicitudes;?>'/></a></li>
            <li class="rssfeed"><a href="" title=""><img style='margin-top:16px; margin-left:2px;' src='imagen/menu_img/BotonCPrestamo.png'/></a></li>
          <!--  <li class="podcasts"><a href="" title="Podcasts"><img style='margin-top:2px;' src='img/menu_img/BotoneEdoCuenta.png'/></a></li>
            <li class="contact"><a href="" title="Contact"><img style='margin-top:2px;' src='img/menu_img/BotoneEdoCuenta.png'/></a></li>
			-->
        </ul>
		
<script> 
function abrir1(url) { 
open('<?echo $opcion11L;?>','','top=300,left=300,width=300,height=300') ; 
} 

//<li><a  href="javascript:abrir1()" ><?echo $opcion11; ?></a></li>
</script> 
<?//<a href="javascript:abrir('pagina.html')">Enlace</a> R_listado_afianzadora_1.1.3.php ?>

<!---------------inicio Menu de herramienta-----------img\menu_img\listado_afianzadora.png-----margin:67px;-->

<div class="menu" id="menu" >
			<div id="menu"  align="center">

					<ul class="level1">
						 
							 
									
							
							 <li  class="level1-li"><a class="level1-a drop" href="#url"> <img style='margin-top:2px;' src='<?echo $img_atencion_socio;?>'/> </a>
						   
								<ul class="level2">
									<li><a href="<?echo $Link11;?>" ><?echo $opcion11; ?></a></li>
											
									
									<li><a href="<?echo $Link12;?>" > <?echo $opcion12;?> </a>
										<ul class="level3">
											<li><a href="<?echo $Link13;?>"><?echo $opcion13;?></a></li>
											<li><a href="<?echo $Link14;?>"><?echo $opcion14;?></a></li>
										</ul>
									</li>
									
									
									
									
								
									
									
									
									<li><a href="<?echo $Link15;?>" > <?echo $opcion15;?> </a> </li>
									<li><a href="<?echo $Link16;?>" ><?echo $opcion16; ?></a> </li>
									<li><a href="<?echo $Link17;?>" > <?echo $opcion17;?> </a> </li>
									<!-- <li><a href="<?echo $Link18;?>" > <?echo $opcion18;?> </a> </li>
									<li><a href="<?echo $Link19;?>" ><?echo $opcion19; ?></a> </li> -->
									
								</ul>
						   
							</li>
							
							<li  class="level1-li"><a class="level1-a drop" href="#url"> <img style='margin-top:2px;' src='<?echo $img_credito;?>'/> </a>
						   
								<ul class="level2">
									<li><a href="<?echo $Link21;?>"><?echo $opcion21;?></a> </li>
									<li><a href="<?echo $Link22;?>"><?echo $opcion22;?></a> </li>
								</ul>
						   
							</li>
							
							
							<li  class="level1-li"><a class="level1-a drop" href="#url"> <img style='margin-top:2px;' src='<?echo $img_cobranza;?>'/> </a>
						   
								<ul class="level2">
									<li><a href="<?echo $Link31;?>"><?echo $opcion31;?></a> </li>
									
								</ul>
						   
							</li>
							
							<li  class="level1-li"><a class="level1-a drop" href="#url"> <img style='margin-top:2px;' src='<?echo $img_tesoreria;?>'/> </a>
						   
								<ul class="level2">
									
									
									<li><a href="#" > Otros Pagos </a>
										<ul class="level3">
											<li><a href="#"><?echo $opcion41;?></a>
												<ul class="level3">
													<li><a href="<?echo $Link44;?>"><?echo $opcion44;?></a></li>
													<li><a href="<?echo $Link45;?>"><?echo $opcion45;?></a></li>
												</ul>
											</li>
											<li><a href="<?echo $Link43;?>"><?echo $opcion43;?></a></li>
										</ul>
									</li>
									
									<li><a href="<?echo $Link42;?>"><?echo $opcion42;?></a> </li>
									<li><a href="<?echo $Link46;?>"><?echo $opcion46;?></a> </li>
									<li><a href="<?echo $Link47;?>"><?echo $opcion47;?></a> </li>
									<li><a href="<?echo $Link48;?>"><?echo $opcion48;?></a> </li>
									<li><a href="<?echo $Link49;?>"><?echo $opcion49;?></a> </li>
								</ul>
						   
							</li>
							
							<li  class="level1-li"><a class="level1-a drop" href="#url"> <img style='margin-top:2px;' src='<?echo $img_contabilidad;?>'/> </a>
						   
								<ul class="level2">
									<li><a href="<?echo $Link51;?>"><?echo $opcion51;?></a> </li>
									<li><a href="<?echo $Link52;?>"><?echo $opcion52;?></a> </li>
								</ul>
						   
							</li>
							
							<li  class="level1-li"><a class="level1-a drop" href="#url"> <img style='margin-top:2px;' src='<?echo $img_caja;?>'/> </a>
						   
								<ul class="level2">
									<li><a href="<?echo $opcion60L;?>"><?echo $opcion60;?></a> </li>
									
								</ul>
						   
							</li>
							
									
							
							
							<li  class="level1-li"><a class="level1-a drop" href="#url"> <img style='margin-top:2px;' src='<?echo $img_auditoria;?>'/> </a>
						   
								<ul class="level2">
									<li><a href="<?echo $opcion60L;?>"><?echo $opcion60;?></a> </li>
									
								</ul>
						   
							</li>
							
							
							
							
							
							<li  class="level1-li"><a class="level1-a drop" href="#url"> <img style='margin-top:2px;' src='<?echo $img_archivo;?>'/> </a>
						   
								<ul class="level2">
									<li><a href="<?echo $opcion60L;?>"><?echo $opcion60;?></a> </li>
									
								</ul>
						   
							</li>
							
							
							
							<li  class="level1-li"><a class="level1-a drop" href="#url"> <img style='margin-top:2px;' src='<?echo $img_reporte;?>'/> </a>
						   
								<ul class="level2">
									<li><a href="<?echo $Link81;?>"><?echo $opcion81;?></a> </li>
									
								</ul>
						   
							</li>
							
							<li  class="level1-li"><a class="level1-a drop" href="#url"> <img style='margin-top:2px;' src='<?echo $img_herramienta;?>'/> </a>
						   
								<ul class="level2">
									<li><a href="<?echo $Link01;?>"><?echo $opcion01;?></a> </li>
									<li><a href="<?echo $Link02;?>"><?echo $opcion02;?></a> </li>
									<li><a href="<?echo $Link03;?>"><?echo $opcion03;?></a> </li>
									<li><a href="<?echo $Link04;?>"><?echo $opcion04;?></a> </li>
									<li><a href="<?echo $Link05;?>"><?echo $opcion05;?></a> </li>
									
								</ul>
						   
							</li>
					
							
							<li class="level1-li"><a class="level1-a"  href="opciones/salir.php"><img style='margin-top:2px;' src='imagen/menu_img/botom6.png'/></a></li>
							
							
							
					</ul>
				</div>
					
	</div>
<!---------------fin Menu de herramienta---------------->

									<!---
									<li><a href="<?echo $Link12;?>" > <?echo $opcion12;?> </a>
										<ul class="level3">
											<li><a href="#url">Beginners Slopes</a></li>
											<li><a href="#url">Intermediate Slopes</a></li>
											<li><a class="fly" href="#url">Advanced Skill Levels</a>
											
												<ul class="level4">
													<li><a href="#url">Local</a></li>

													<li><a href="#url">Nearby</a></li>
													<li><a href="#url">With instructor</a></li>
													<li><a href="#url">Snow boarding</a><b></b></li>
												</ul>
											
											</li>
											<li><a href="#url">Expert</a></li>
										</ul>
								
									</li>
									--->
