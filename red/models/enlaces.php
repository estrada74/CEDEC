<?php 
	class Paginas
	{
		//Metodo para relacionar las paginas dependiendo del action que se coloque redirecciona a sia la pagina que es
		public static function enlacesPaginasModel($enlaces)
		{
			if(
              $enlaces == "dashboard" 
				    ||$enlaces=="salir"
		        ||$enlaces=="registrar_sector"
		        ||$enlaces=="listado_sectores"
		        ||$enlaces=="editar_sector"
		        ||$enlaces=="registrar_prediagnostico_a_empresa"
		        ||$enlaces=="listado_administradores"
		        ||$enlaces=="listado_prediagnosticos_a_empresas"
		        ||$enlaces=="editar_usuario_administrador"
		        ||$enlaces=="registrar_administrador"
		        ||$enlaces=="editar_informacion"
		        ||$enlaces=="registrar_empresa"
		        ||$enlaces=="listado_empresas"
		        ||$enlaces=="registrar_representante_legal"
		        ||$enlaces=="listado_representantes_legales"
		        ||$enlaces=="editar_representante_legal"
		        ||$enlaces=="editar_empresa"
		        ||$enlaces=="registrar_usurio_beneficiario"
		        ||$enlaces=="registrar_municipio"
		        ||$enlaces=="listado_municipios"
            	||$enlaces=="registrar_analisis_empresarial"
            	||$enlaces=="mostrar_prediagnostico"
            	||$enlaces=="registrar_problema_empresarial"
     		)
			{
				$module =  "views/modules/".$enlaces.".php";
			}
		    else if($enlaces == "index")
		    {
		    	$module =  "views/modules/login.php";	
		    }
			return $module;

			
		}
	}
?>