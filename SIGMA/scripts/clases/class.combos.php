<?php

class selects extends MySQL
{
	var $code = "";
	var $code2 ="";
	var $code3 ="";
	function cargarPaises()
	{
		$consulta = parent::consulta("SELECT estado,Cod_estado FROM estado");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$paises = array();
			while($pais = parent::fetch_assoc($consulta))
			{
				$code = $pais["Cod_estado"];
				$name = $pais["estado"];				
				$paises[$code]=$name;
			}
			return $paises;
		}
		else
		{
			return false;
		}
	}
	function cargarEstados()
	{
		
		
		
		/*$consulta = parent::consulta("SELECT municipio.municipio,municipio.cod_municipio FROM estado 
		INNER JOIN municipio ON municipio.cod_estado = estado.cod_estado
                                 where estado.cod_estado = '".$this->code."'");*/
								 
	$consulta = parent::consulta("SELECT * FROM municipio where cod_estado = '".$this->code."'");			 
								 
								 
								 
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$estados = array();
			while($estado = parent::fetch_assoc($consulta))
			{
				$code2 = $estado["cod_municipio"];	
				$name = $estado["municipio"];
				$estados[$code2]=$name;

			}
			return $estados;
		}
		else
		{
			return false;
		}
	}
		
	function cargarCiudades()
	{
	
			
			
		$consulta = parent::consulta("SELECT parroquia.parroquia,parroquia.cod_parroquia FROM municipio
INNER JOIN parroquia ON parroquia.cod_municipio = municipio.cod_municipio
where parroquia.cod_municipio = '".$this->code2."'");
		
		
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$ciudades = array();
			while($ciudad = parent::fetch_assoc($consulta))
			{
				$name = $ciudad["parroquia"];				
				$code3 =$ciudad["cod_parroquia"];
				$ciudades[$code3]=$name;
			}
			return $ciudades;
		}
		else
		{
			return false;
		}
	}		
}
?>