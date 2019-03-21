<?php
//clasepara crear un objeto de tipo conexion a la base de datos
class Conexion
{
	public static function conectar()
	{
		//Declarando los parametros como nombre de la base y usuario y contraseña de la bd servidor
		#$link = new PDO("mysql:host=localhost;dbname=portalce_red","portalce_portal","26e45m3DE024");

		//Declarando los parametros como nombre de la base y usuario y contraseña de la bd local
		$link = new PDO("mysql:host=localhost;dbname=bd_red","root","");
		
		return $link;
	}
}
?>
