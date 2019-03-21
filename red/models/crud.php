<?php
require_once "conexion.php";

class Datos extends Conexion
{
  
  public static function vistaPremiosModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todas las categorias
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}
  
	public static function vistaUsuariosModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todos los usuarios
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}

	public static function getRepresentanteSinUsuarioModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  ORDER BY nombre_representante; "); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todos los usuarios
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}
  
  

  public static function serviciosIDModel($tabla,$id)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id_servicio=:id"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todas las categorias
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}

	public static function usuariosIDModel($tabla,$id)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT username FROM $tabla WHERE id_usuario=:id"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todas las categorias
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}
  
  public static function ifDuplicadoModel($datosModel, $table)
	{
		//preparar la consulta conectando a la base de datos
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE username = :username");	
		//DEfinicion de para metro para la consulta en la tabla usuarios
		$statement->bindParam(":username", $datosModel, PDO::PARAM_STR);
		//Ejecutar la sentencia
		$statement->execute();
		//Asociar resiultados y eevolver el arraty al controller
		return $statement->fetch();
		//Cerrar conexion al final
		$statement->close();
	}
  
  public static function agregarUsuariosModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,apellido,username,email,password,fecha_registro) VALUES (:nombre, :apellido, :username, :email, :password, :fecha_registro)");	
		//Definicion de parametros para la isnercion a la base de datos
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registro", $datosModel["fecha_registro"]);
		//Si la ejecucion de la consulta es exitosa se devuelve un mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}
  
  public static function agregarServicioModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,descripcion,precio) VALUES (:nombre, :descripcion, :precio)");	
		//Definicion de parametros para el QUERY
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"]);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//si no se de vuelvemensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}
  
  	
	
  
  
  ##### AGREGADO 
  
  public static function borrarModel($datosModel, $tabla,$nom_campo)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $nom_campo = :id");	
		//Definicion de parametros a la consulta
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		//Si la ejecucion es exitosa devuelve mensaje de exito
		if($stmt->execute())
		{
			return "borrado";
		}
		else
		{
			//De lo contrario devuelve mensaje de error
			return "error";
		}
		//Cerrar conexion al final
		$stmt->close();
	}


	public static function actualizarServicioModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, descripcion=:descripcion, precio=:precio WHERE id_servicio=:id_servicio");	
		//Definicion de parametros para la actualizacion en la base de datos tabla categorias
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"]);
		$stmt->bindParam(":id_servicio", $datosModel["id_servicio"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje nde error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}
  
  
  ##nuevo 9:02
  
  
  public static function actualizarPasswordModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET password=:password WHERE id_usuario=:id_usuario");	
		//Definicion de parametros para la actualizacion en la base de datos tabla categorias
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje nde error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}
  
  public static function getDatosUsuarioModel($idUser,$table)
  {
      //preparar la consulta conectando a la base de datos
      $statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE id_usuario = :id_usuario");	
      //DEfinicion de para metro para la consulta en la tabla usuarios
      $statement->bindParam(":id_usuario", $idUser, PDO::PARAM_INT);
      //Ejecutar la sentencia
      $statement->execute();
      //Asociar resiultados y eevolver el arraty al controller
      return $statement->fetch();
      //Cerrar conexion al final
      $statement->close();
  }
  



########################################################################################################
########################################################################################################
##################################    C E D E C  ------   T A M     ####################################
########################################################################################################
########################################################################################################
  	#LOGIN USUARIOS
	#-------------------------------------
	public static function ingresoUsuarioModel($datosModel, $table)
	{
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE email = :email and pass = :pass");	
		$statement->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$statement->bindParam(":pass", $datosModel["pass"], PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}
	## regresar representante legal para verificar si es que este se reptite.

	public static function returnRepresenanteModel($datosModel, $table)
	{
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE nombre_representante = :nombre_representante");	
		$statement->bindParam(":nombre_representante", $datosModel["nombre_representante"], PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}

	public static function returnUsuarioRepetidoModel($datosModel, $table)

	{

		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE email = :email");	
		$statement->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}

	#regresa un usrio si es que se encuentra registrado en la base de datos 
	

	public static function returUltimoRegistroModel($tabla,$id)
	{
		$statement = Conexion::conectar()->prepare("SELECT *
													FROM $tabla
													ORDER by $id DESC
													LIMIT 1;");	
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}

	public static function returnInfoModel($datosModel, $table)
	{
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE id_usuario = $datosModel");	
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}


   	# obtine todos  los registro de una tbla de la base de datos 
	public static function vistasModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todas las categorias
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}

	public static function vistaRepresentantesLegalesModel()
	{ 
		//preparar la consulta conectando a la base de datos
		$usuarios="usuarios";
		$representante_legal="representante_legal";
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $representante_legal
												INNER JOIN $usuarios ON $usuarios.id_usuario=$representante_legal.id_usuario;"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todas las categorias
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}

	public static function listadoEmpresasModel()
	{ 
		$empresas="empresas";
		$representante_legal="representante_legal";
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT $empresas.nombre,$empresas.id_empresa, $empresas.estado,$empresas.cuestionario,$empresas.id_representante_legal,$representante_legal.nombre_representante FROM $empresas
			INNER JOIN $representante_legal  ON $empresas.id_representante_legal=$representante_legal.id_representante_legal;"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todas las categorias
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}


	public static function returnPrblemasEmpresarialesModel($id_empresa)
	{ 
		$empresas="empresas";
		$problemas_empresariales="problemas_empresariales";
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM problemas_empresariales INNER JOIN empresas ON $empresas.id_empresa = $problemas_empresariales.id_empresa WHERE $empresas.id_empresa=$id_empresa"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todas las categorias
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}

	public static function mostrarEmpresaPorIDModel($id_empresa)
	{ 
		$empresas="empresas";
		$representante_legal="representante_legal";
		$usuarios="usuarios";
		$municipios="municipios";
		$sectores="sectores";
		$empresas_prediagnostico="empresas_prediagnostico";
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT  $empresas_prediagnostico.id_empresa_prediagnostico, $empresas_prediagnostico.encuestador, $empresas_prediagnostico.fecha_captacion,
$empresas_prediagnostico.consultor_asignado, $empresas_prediagnostico.carta_de_terminos,
$empresas_prediagnostico.id_empresa, $empresas_prediagnostico.rfc, $empresas_prediagnostico.camara_perteneciente, $empresas_prediagnostico.giro,
$empresas_prediagnostico.actividades_realizadas, $empresas_prediagnostico.id_sector, $empresas_prediagnostico.num_empleados, $empresas_prediagnostico.num_sucursales,
$empresas_prediagnostico.anios_exportacion, $empresas_prediagnostico.certificado_calidad, $empresas_prediagnostico.empresa_en_operacion, $empresas_prediagnostico.estados_financieros,
$empresas_prediagnostico.scian, $empresas_prediagnostico.inicio_operacion, $empresas_prediagnostico.informacion_que_entrega, $empresas_prediagnostico.colonia,
$empresas_prediagnostico.id_municipio, $empresas_prediagnostico.calle, $empresas_prediagnostico.num_domicilio, $empresas_prediagnostico.cp,
$empresas_prediagnostico.telefono_empresarial, $empresas_prediagnostico.correo_empresa,
$empresas_prediagnostico.fax, $empresas.nombre AS nombre_empresa, $empresas.estado AS prediagnostico, $empresas.cuestionario, $empresas.id_representante_legal, $representante_legal.nombre_representante,
$representante_legal.genero, $representante_legal.telefono_representante, $representante_legal.grado_estudios, $representante_legal.id_usuario,
$usuarios.email, $usuarios.estado AS estado_usuario, $sectores.nombre AS nombre_sector, $municipios.nombre AS nombre_municipio
FROM empresas_prediagnostico
INNER JOIN empresas ON $empresas.id_empresa=$empresas_prediagnostico.id_empresa
INNER JOIN representante_legal ON $representante_legal.id_representante_legal=$empresas.id_representante_legal
INNER JOIN usuarios ON $usuarios.id_usuario=$representante_legal.id_usuario
INNER JOIN sectores ON $sectores.id_sector=$empresas_prediagnostico.id_sector
INNER JOIN municipios ON $municipios.id_municipio=$empresas_prediagnostico.id_municipio
WHERE $empresas.id_empresa=:id_empresa
"); 
		$stm->bindParam(":id_empresa", $id_empresa, PDO::PARAM_INT);
 		//Ejecutar sentencia
 		$stm->execute();
 		//Asociar resultados y devolverlos al controller
 		return $stm->fetch();
 		//Cerrar conexional final
 		$stm->close();
	}

	public static function listadoMisEmpresasModel($id_representante_legal)
	{ 
		$empresas="empresas";
		$representante_legal="representante_legal";
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT $empresas.nombre,$empresas.id_empresa, $empresas.estado,$empresas.cuestionario,$empresas.id_representante_legal,$representante_legal.nombre_representante FROM $empresas
			INNER JOIN $representante_legal  ON $empresas.id_representante_legal=$representante_legal.id_representante_legal WHERE $empresas.id_representante_legal=$id_representante_legal;"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todas las categorias
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}


	public static function vistasUsuarioAdministradorModel($tabla,$tabla2)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT $tabla.id_persona,$tabla2.id_usuario, $tabla.nombre, $tabla.a_paterno, $tabla.a_materno, $tabla2.email,$tabla2.estado FROM $tabla
			INNER JOIN $tabla2 
 			ON $tabla2.id_usuario=$tabla.id_usuario AND $tabla2.id_rol=1"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todas las categorias
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}






	public static function getCantidadRegistrosModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as cantidad FROM $tabla"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados, la cantidad de usuarios en la bd
		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}

	public static function getCantidadMisEmpresasModel($tabla,$id)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as cantidad FROM $tabla WHERE id_representante_legal=$id"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados, la cantidad de usuarios en la bd
		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}

	public static function getCantidadUsuariosPorRolModel($tabla,$rol,$nom_campo)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as cantidad FROM $tabla WHERE $nom_campo=$rol"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados, la cantidad de usuarios en la bd
		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}


	public static function registrarSectoresModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");	
		//Definicion de parametros para el QUERY
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//si no se de vuelvemensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}


	public static function registrarUsuarioModel($datosModel, $usuarios)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $usuarios (email,pass,id_rol,estado) VALUES (:email,:pass,:id_rol,:estado);");	
		//Definicion de parametros para el QUERY
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":pass", $datosModel["pass"], PDO::PARAM_STR);
		$stmt->bindParam(":id_rol", $datosModel["id_rol"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);


		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//si no se de vuelvemensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}

	public static function registrarInfoPersonaModel($datosModel, $info_persona)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $info_persona (nombre,a_paterno,a_materno,id_usuario) VALUES (:nombre,:a_paterno,:a_materno,:id_usuario);");	
		//Definicion de parametros para el QUERY
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":a_paterno", $datosModel["a_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":a_materno", $datosModel["a_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);


		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//si no se de vuelvemensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}

	public static function registrarPrediagnosticoModel ($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (encuestador, fecha_captacion, consultor_asignado, carta_de_terminos, id_empresa, rfc, camara_perteneciente, giro, actividades_realizadas, id_sector, num_empleados,num_sucursales, anios_exportacion, certificado_calidad, empresa_en_operacion,estados_financieros, scian, inicio_operacion, informacion_que_entrega, colonia, id_municipio, calle, num_domicilio, cp, telefono_empresarial, correo_empresa, fax, id_usuario) VALUES (:encuestador, :fecha_captacion, :consultor_asignado, :carta_de_terminos, :id_empresa, :rfc, :camara_perteneciente, :giro, :actividades_realizadas, :id_sector, :num_empleados, :num_sucursales, :anios_exportacion, :certificado_calidad, :empresa_en_operacion, :estados_financieros, :scian, :inicio_operacion, :informacion_que_entrega, :colonia, :id_municipio, :calle, :num_domicilio, :cp, :telefono_empresarial, :correo_empresa, :fax, :id_usuario)");	
		//Definicion de parametros para el QUERY
		$stmt->bindParam(":encuestador", $datosModel["encuestador"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_captacion", $datosModel["fecha_captacion"], PDO::PARAM_STR);
		$stmt->bindParam(":consultor_asignado", $datosModel["consultor_asignado"], PDO::PARAM_STR);
		$stmt->bindParam(":carta_de_terminos", $datosModel["carta_de_terminos"], PDO::PARAM_STR);
		$stmt->bindParam(":id_empresa", $datosModel["id_empresa"], PDO::PARAM_INT);
		$stmt->bindParam(":rfc", $datosModel["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":camara_perteneciente", $datosModel["camara_perteneciente"], PDO::PARAM_STR);
		$stmt->bindParam(":giro", $datosModel["giro"], PDO::PARAM_STR);
		$stmt->bindParam(":actividades_realizadas", $datosModel["actividades_realizadas"], PDO::PARAM_STR);
		$stmt->bindParam(":id_sector", $datosModel["id_sector"], PDO::PARAM_INT);
		$stmt->bindParam(":num_empleados", $datosModel["num_empleados"], PDO::PARAM_STR);
		$stmt->bindParam(":num_sucursales", $datosModel["num_sucursales"], PDO::PARAM_STR);
		$stmt->bindParam(":anios_exportacion", $datosModel["anios_exportacion"], PDO::PARAM_STR);
		$stmt->bindParam(":certificado_calidad", $datosModel["certificado_calidad"], PDO::PARAM_STR);
		$stmt->bindParam(":empresa_en_operacion", $datosModel["empresa_en_operacion"], PDO::PARAM_STR);
		$stmt->bindParam(":estados_financieros", $datosModel["estados_financieros"], PDO::PARAM_STR);
		$stmt->bindParam(":scian", $datosModel["scian"], PDO::PARAM_STR);
		$stmt->bindParam(":inicio_operacion", $datosModel["inicio_operacion"], PDO::PARAM_STR);
		$stmt->bindParam(":informacion_que_entrega", $datosModel["informacion_que_entrega"], PDO::PARAM_STR);
		$stmt->bindParam(":colonia", $datosModel["colonia"], PDO::PARAM_STR);
		$stmt->bindParam(":id_municipio", $datosModel["id_municipio"], PDO::PARAM_INT);
		$stmt->bindParam(":calle", $datosModel["calle"], PDO::PARAM_STR);
		$stmt->bindParam(":num_domicilio", $datosModel["num_domicilio"], PDO::PARAM_STR);
		$stmt->bindParam(":cp", $datosModel["cp"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono_empresarial", $datosModel["telefono_empresarial"], PDO::PARAM_STR);
		$stmt->bindParam(":correo_empresa", $datosModel["correo_empresa"], PDO::PARAM_STR);
		$stmt->bindParam(":fax", $datosModel["fax"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		

		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//si no se de vuelvemensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}

	public static function registrarEmpresaModel ($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,estado,id_representante_legal) VALUES (:nombre,:estado,:id_representante_legal)");	
		//Definicion de parametros para el QUERY
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":id_representante_legal", $datosModel["id_representante_legal"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//si no se de vuelvemensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}

	public static function registrarProblemaEmpresarialModel ($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (tipo_problema,descripcion_problema,id_empresa) VALUES (:tipo_problema,:descripcion_problema,:id_empresa)");	
		//Definicion de parametros para el QUERY
		$stmt->bindParam(":tipo_problema", $datosModel["tipo_problema"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_problema", $datosModel["descripcion_problema"], PDO::PARAM_STR);
		$stmt->bindParam(":id_empresa", $datosModel["id_empresa"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//si no se de vuelvemensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}



	public static function registrarRepresentanteLegalModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_representante,genero,telefono_representante,grado_estudios) VALUES (:nombre_representante,:genero,:telefono_representante,:grado_estudios)");	
		//Definicion de parametros para el QUERY
		$stmt->bindParam(":nombre_representante", $datosModel["nombre_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":genero", $datosModel["genero"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono_representante", $datosModel["telefono_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":grado_estudios", $datosModel["grado_estudios"], PDO::PARAM_STR);
		




		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito

		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//si no se de vuelvemensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}

	public static function registararUsuarioBeneficiarioModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (email,pass,id_rol,estado) VALUES (:email,:pass,:id_rol,:estado)");	
		//Definicion de parametros para el QUERY
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":pass", $datosModel["pass"], PDO::PARAM_STR);
		$stmt->bindParam(":id_rol", $datosModel["id_rol"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);




		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito

		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//si no se de vuelvemensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}


	public static function editarModel($id,$tabla,$nom_campo)
 	{
 		//preparar la consulta conectando a la base de datos
 		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $nom_campo = :id");
 		//Definicion de parametros a la consulta
 		$stm->bindParam(":id", $id, PDO::PARAM_INT);
 		//Ejecutar sentencia
 		$stm->execute();
 		//Asociar resultados y devolverlos al controller
 		return $stm->fetch();
 		//Cerrar conexional final
 		$stm->close();
 	}


 	public static function getEmpresaPorIdModel($id,$empresas,$representante_legal)
 	{
 		//preparar la consulta conectando a la base de datos

 		$stm = Conexion::conectar()->prepare("SELECT $empresas.id_empresa,
	  $empresas.nombre, 
      $empresas.estado,
	  $empresas.id_representante_legal,
	  $representante_legal.nombre_representante, 
	  $representante_legal.genero,
	  $representante_legal.telefono_representante,
	  $representante_legal.grado_estudios,
	  CURDATE() AS fecha 
	  FROM $empresas
INNER JOIN $representante_legal  
ON $empresas.id_representante_legal=
   $representante_legal.id_representante_legal WHERE $empresas.id_empresa=:id;
");
 		//Definicion de parametros a la consulta
 		$stm->bindParam(":id", $id, PDO::PARAM_INT);
 		//Ejecutar sentencia
 		$stm->execute();
 		//Asociar resultados y devolverlos al controller
 		return $stm->fetch();
 		//Cerrar conexional final
 		$stm->close();
 	}

 	public static function getEmpresaDetallesPorIdModel($id_empresa)
 	{
 		//preparar la consulta conectando a la base de datos
 		$empresas="empresas";
		$representante_legal="representante_legal";
		$usuarios="usuarios";
		$municipios="municipios";
		$sectores="sectores";
		$empresas_prediagnostico="empresas_prediagnostico";
		

 		$stm = Conexion::conectar()->prepare("SELECT $empresas_prediagnostico.id_empresa_prediagnostico, $empresas_prediagnostico.encuestador,$empresas_prediagnostico.fecha_captacion,
$empresas_prediagnostico.consultor_asignado, $empresas_prediagnostico.carta_de_terminos,
$empresas_prediagnostico.id_empresa, $empresas_prediagnostico.rfc, $empresas_prediagnostico.camara_perteneciente, $empresas_prediagnostico.giro,
$empresas_prediagnostico.actividades_realizadas, $empresas_prediagnostico.id_sector, $empresas_prediagnostico.num_empleados, $empresas_prediagnostico.num_sucursales,
$empresas_prediagnostico.anios_exportacion, $empresas_prediagnostico.certificado_calidad, $empresas_prediagnostico.empresa_en_operacion, $empresas_prediagnostico.estados_financieros,
$empresas_prediagnostico.scian, $empresas_prediagnostico.inicio_operacion, $empresas_prediagnostico.informacion_que_entrega, $empresas_prediagnostico.colonia,
$empresas_prediagnostico.id_municipio, $empresas_prediagnostico.calle, $empresas_prediagnostico.num_domicilio, $empresas_prediagnostico.cp,
$empresas_prediagnostico.telefono_empresarial, $empresas_prediagnostico.correo_empresa,
$empresas_prediagnostico.fax, $empresas.nombre AS nombre_empresa, $empresas.estado AS prediagnostico, $empresas.cuestionario, $empresas.id_representante_legal, $representante_legal.nombre_representante,
$representante_legal.genero, $representante_legal.telefono_representante, $representante_legal.grado_estudios, $representante_legal.id_usuario,
$usuarios.email, $usuarios.estado AS estado_usuario, $sectores.nombre AS nombre_sector, $municipios.nombre AS nombre_municipio
FROM empresas_prediagnostico
INNER JOIN empresas ON $empresas.id_empresa=$empresas_prediagnostico.id_empresa
INNER JOIN representante_legal ON $representante_legal.id_representante_legal=$empresas.id_representante_legal
INNER JOIN usuarios ON $usuarios.id_usuario=$representante_legal.id_usuario
INNER JOIN sectores ON $sectores.id_sector=$empresas_prediagnostico.id_sector
INNER JOIN municipios ON $municipios.id_municipio=$empresas_prediagnostico.id_municipio
WHERE $empresas.id_empresa=:id_empresa
");
 		//Definicion de parametros a la consulta
 		$stm->bindParam(":id_empresa", $id_empresa, PDO::PARAM_INT);
 		//Ejecutar sentencia
 		$stm->execute();
 		//Asociar resultados y devolverlos al controller
 		return $stm->fetch();
 		//Cerrar conexional final
 		$stm->close();
 	}



	public static function getEmpresaIDModel($id)
 	{
 		$empresas="empresas";
 		$representante_legal="representante_legal";
 		//preparar la consulta conectando a la base de datos
 		$stm = Conexion::conectar()->prepare("SELECT $empresas.nombre,$empresas.id_empresa, $empresas.estado,$empresas.id_representante_legal,$representante_legal.nombre_representante FROM $empresas
			INNER JOIN $representante_legal  ON $empresas.id_representante_legal=$representante_legal.id_representante_legal WHERE $empresas.id_empresa=$id"); 
 		//Definicion de parametros a la consulta
 		
 		//Ejecutar sentencia
 		$stm->execute();
 		//Asociar resultados y devolverlos al controller
 		return $stm->fetch();
 		//Cerrar conexional final
 		$stm->close();
 	}





 	public static function editarAdministradorModel($id,$info_persona,$usuarios)
 	{
 		//preparar la consulta conectando a la base de datos
 		$stm = Conexion::conectar()->prepare("SELECT $info_persona.id_persona,$info_persona.id_usuario, $info_persona.nombre, $info_persona.a_paterno, $info_persona.a_materno, $usuarios.email,$usuarios.pass,$usuarios.estado FROM $info_persona
			INNER JOIN $usuarios 
 			ON $usuarios.id_usuario=$info_persona.id_usuario WHERE $usuarios.id_usuario=$id");
 		//Definicion de parametros a la consulta
 		#$stm->bindParam(":id", $id, PDO::PARAM_INT);
 		//Ejecutar sentencia
 		$stm->execute();
 		//Asociar resultados y devolverlos al controller
 		return $stm->fetch();
 		//Cerrar conexional final
 		$stm->close();
 	}


 	public static function actualizarSectorModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre WHERE id_sector=:id_sector");	
		//Definicion de parametros para la actualizacion en la base de datos tabla categorias
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id_sector", $datosModel["id_sector"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje nde error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();

	}

	public static function asignarUsuarioRepresentanteModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_usuario=:id_usuario WHERE id_representante_legal=:id_representante_legal");	
		//Definicion de parametros para la actualizacion en la base de datos tabla categorias
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":id_representante_legal", $datosModel["id_representante_legal"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje nde error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();

	}

	public static function actualizarBeneficiarioIdUsuarioModel($id_usuario,$id_representante_legal)
	{
		$tabla="representante_legal";
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_usuario=$id_usuario WHERE id_representante_legal=$id_representante_legal");	
		//Definicion de parametros para la actualizacion en la base de datos tabla categorias
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje nde error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();

	}

	public static function actualizarEmpresaEstadoModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado=:estado WHERE id_empresa=:id_empresa");	
		//Definicion de parametros para la actualizacion en la base de datos tabla categorias
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":id_empresa", $datosModel["id_empresa"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje nde error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();

	}


	public static function actualizarEmpresaModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, estado=:estado, id_representante_legal=:id_representante_legal WHERE id_empresa=:id_empresa");	
		//Definicion de parametros para la actualizacion en la base de datos tabla categorias
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":id_representante_legal", $datosModel["id_representante_legal"], PDO::PARAM_INT);
		$stmt->bindParam(":id_empresa", $datosModel["id_empresa"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje nde error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}
	public static function actualizarInformacionUsuarioModel($datosModel,$usuarios)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $usuarios SET email=:email, pass=:pass, estado=:estado WHERE id_usuario=:id_usuario");

		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":pass", $datosModel["pass"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);	
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensajed e error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}


	#ACTUALIZA LA INFORMACION DEL ADMINISTRADOR 
  
  	public static function actualizarInformacionModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, a_paterno=:a_paterno, a_materno=:a_materno WHERE id_usuario=:id_usuario");	
		//DEfinicion de para metros para la actualizacion ala base de datos tabla usuarios
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":a_paterno", $datosModel["a_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":a_materno", $datosModel["a_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensajed e error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}


	public static function actualizarRepresentanteLegalModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_representante=:nombre_representante, genero=:genero, telefono_representante=:telefono_representante, grado_estudios=:grado_estudios WHERE id_representante_legal=:id_representante_legal");	
		//DEfinicion de para metros para la actualizacion ala base de datos tabla usuarios
		$stmt->bindParam(":nombre_representante", $datosModel["nombre_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":genero", $datosModel["genero"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono_representante", $datosModel["telefono_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":grado_estudios", $datosModel["grado_estudios"], PDO::PARAM_STR);

		$stmt->bindParam(":id_representante_legal", $datosModel["id_representante_legal"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensajed e error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}


	public static function getSelectEmpresasModel()
	{ 
		$empresas="empresas";
		$representante_legal="representante_legal";
		$Pendiente="Pendiente";
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT $empresas.id_empresa,
													  $empresas.nombre, 
													  $empresas.estado,
													  $empresas.id_representante_legal,
													  $representante_legal.nombre_representante, 
													  $representante_legal.genero,
													  $representante_legal.telefono_representante,
													  $representante_legal.grado_estudios 
													  FROM $empresas
			                                    INNER JOIN $representante_legal  
			 									ON $empresas.id_representante_legal=
   $representante_legal.id_representante_legal"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todos los usuarios
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}

	public static function getSelectDatosModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todos los usuarios
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}

	public static function getSelectDatosPorCampoModel($tabla,$id,$nom_campo)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $nom_campo=$id"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todos los usuarios
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}


	
	


}
?>