<?

date_default_timezone_set("America/Caracas" ) ; 
				$fecha = date('d-m-Y'); 
				$f = explode("-",$fecha);
                    $a=$f[0]; // porción1
                    $m=$f[1]; // porción2
                    $d=$f[2];
			
			$ar=fopen("Pago Dividendo/Dividendo_$d-$m-$a.txt","a") or
			die("Problemas en la creacion");
				
				
				
				
				
				
				
				include("opciones/conexion_administrador.php"); 
				$b = mysql_query ("SELECT * FROM dividendos_pendiente where estatus='a' ",$conexadmi); while ($v=mysql_fetch_assoc($b))	
				{ 
					$cedula_socio=$v['cedula']; 
					$proveedors=$v['nombre']; 
					$v['organismo']; 
					$n_cuenta=$v['N_cuenta'];
					$monto=$v['monto'];
					
					
										if(trim($cedula_socio))
															{

																switch(strlen($cedula_socio)){
																case "1" : $ced1 = "000000000" . $cedula_socio; break;
																case "2" : $ced1 = "00000000" . $cedula_socio; break;
																case "3" : $ced1 = "0000000" . $cedula_socio; break; 
																case "4" : $ced1 = "000000" . $cedula_socio; break; 
																case "5" : $ced1 = "00000" . $cedula_socio; break; 
																case "6" : $ced1 = "0000" . $cedula_socio; break; 
																case "7" : $ced1 = "000" . $cedula_socio; break; 
																case "8" : $ced1 = "00" . $cedula_socio; break; 
																case "9" : $ced1 = "0" . $cedula_socio; break; 
																}
															}
					
					$proveedor=substr($proveedors, 0, 35); 
				
										if(trim($proveedor))
															{

																switch(strlen($proveedor)){
																case "1" : $proveedor1 = $proveedor . "                                  "; break;
																case "2" : $proveedor1 = $proveedor . "                                 "; break;
																case "3" : $proveedor1 = $proveedor . "                                "; break;
																case "4" : $proveedor1 = $proveedor . "                               "; break;
																case "5" : $proveedor1 = $proveedor . "                              "; break;
																case "6" : $proveedor1 = $proveedor . "                             "; break;
																case "7" : $proveedor1 = $proveedor . "                            "; break;
																case "8" : $proveedor1 = $proveedor . "                           "; break;
																case "9" : $proveedor1 = $proveedor . "                          "; break;
																case "10" : $proveedor1 = $proveedor . "                         "; break;
																case "11" : $proveedor1 = $proveedor . "                        "; break;
																case "12" : $proveedor1 = $proveedor . "                       "; break;
																case "13" : $proveedor1 = $proveedor . "                      "; break;
																case "14" : $proveedor1 = $proveedor . "                     "; break;
																case "15" : $proveedor1 = $proveedor . "                    "; break;
																case "16" : $proveedor1 = $proveedor . "                   "; break;
																case "17" : $proveedor1 = $proveedor . "                  "; break;
																case "18" : $proveedor1 = $proveedor . "                 "; break;
																case "19" : $proveedor1 = $proveedor . "                "; break;
																case "20" : $proveedor1 = $proveedor . "               "; break;
																case "21" : $proveedor1 = $proveedor . "              "; break;
																case "22" : $proveedor1 = $proveedor . "             "; break;
																case "23" : $proveedor1 = $proveedor . "            "; break;
																case "24" : $proveedor1 = $proveedor . "           "; break;
																case "25" : $proveedor1 = $proveedor . "          "; break;
																case "26" : $proveedor1 = $proveedor . "         "; break;
																case "27" : $proveedor1 = $proveedor . "        "; break;
																case "28" : $proveedor1 = $proveedor . "       "; break;
																case "29" : $proveedor1 = $proveedor . "      "; break;
																case "30" : $proveedor1 = $proveedor . "     "; break;
																case "31" : $proveedor1 = $proveedor . "    "; break;
																case "32" : $proveedor1 = $proveedor . "   "; break;
																case "33" : $proveedor1 = $proveedor . "  "; break;
																case "34" : $proveedor1 = $proveedor . " "; break;
																case "35" : $proveedor1 = $proveedor . ""; break;
																
																
																
																
																}
															}
															
															
															$solicitud=number_format($monto, 2, "", "");
															
															if(trim($solicitud))
															{

																switch(strlen($solicitud)){
																
																 case "1" : $soli = "00000000000000" . $solicitud; break;
																 case "2" : $soli = "0000000000000" . $solicitud; break;
																 case "3" : $soli = "000000000000" . $solicitud; break;
																 case "4" : $soli = "00000000000" . $solicitud; break;
																 case "5" : $soli = "0000000000" . $solicitud; break;
																 case "6" : $soli = "000000000" . $solicitud; break;
																 case "7" : $soli = "00000000" . $solicitud; break;
																 case "8" : $soli = "0000000" . $solicitud; break;
																 case "9" : $soli = "000000" . $solicitud; break; 
																case "10" : $soli = "00000" . $solicitud; break; 
																case "11" : $soli = "0000" . $solicitud; break; 
																case "12" : $soli = "000" . $solicitud; break; 
																case "13" : $soli = "00" . $solicitud; break; 
																case "14" : $soli = "0" . $solicitud; break; 
																
																}
															}
															
															  fputs($ar,$ced1);
															  fputs($ar,$n_cuenta);
															  fputs($ar,$proveedor1);
															  fputs($ar,$soli);
															  fputs($ar,"\r\n");
															
					
				}
				fclose($ar);
				
				
				
				
								
				
				?>