<?php

class MvcController
{
	/*
	echo '<script type="text/javascript">
							alert("Usuario Agregado Exitosamente!");
						 </script>';
	*/
	
  public function vistaUsuariosController()
	{
    if(isset($_GET["ok"]))
    {
      echo '
          <div class="alert alert-success alert-dissmissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>Hey!</strong> Usuario agregado con éxito
               </div>
          ';
    }
			$arrayRespuesta = Datos::vistaUsuariosModel("usuarios");
			foreach($arrayRespuesta as $row => $item)
			{
        echo'
            <tr role="row" class="odd">
                <td><span class="text-primary"> '.$item["id_usuario"].' </span></td>
                <td>'.$item["nombre"].'</td>
                <td>'.$item["apellido"].'</td>
                <td>'.$item["username"].'</td>
                <td>'.$item["email"].'</td>
                <td>'.$item["fecha_registro"].'</td>
                <td>'.$item["num_visitas"].'</td>
                <td class="td-actions">
                  <a href="index.php?action=agregar_visita&id='.$item["id_usuario"].'"><i class="la la-plus-circle edit"></i></a>
                </td>
                <td class="td-actions">
                    <a href="index.php?action=editar_usuario&id='.$item["id_usuario"].'"><i class="la la-edit edit"></i></a>
                    <a href="index.php?action=listado_usuarios&idBorrar='.$item["id_usuario"].'"><i class="la la-close delete"></i></a>
                </td>
            </tr>';
          echo '<script type="text/javascript">
              var password="'.$_SESSION["pass"].'";
              function borrar(id){
                swal("Ingrese su contraseña:", {
                  content: "input",
                  })
                  .then((value) => 
                  {
                      if (value==password) 
                      {
                        swal("Contraseña correcta", "Usuario eliminado Exitosamente", "success");
                        window.location.href = "index.php?action=listado_usuarios&idBorrar="+id;
                      }
                      else
                      {
                        swal("Contraseña Incorrecta", "Intente de nuevo", "error");
                      }     
                  });
                } 
            </script>';
	    }
  }
  
  	
  
  public function vistaServiciosController()
	{
    if(isset($_GET["ok"]))
    {
      echo '
          <div class="alert alert-info alert-dissmissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
              <strong>Hey!</strong> Servicio agregado con éxito
          </div>
          ';
    }
			$arrayRespuesta = Datos::vistasModel("cw_servicios");
			foreach($arrayRespuesta as $row => $item)
			{
        echo'
            <tr role="row" class="odd">
                <td><span class="text-primary"> '.$item["id_servicio"].' </span></td>
                <td>'.$item["nombre"].'</td>
                <td>'.$item["descripcion"].'</td>
                <td>'."$ ".$item["precio"].'</td>
                <td class="td-actions">
                    <a href="index.php?action=editar_servicio&id='.$item["id_servicio"].'"><i class="la la-edit edit"></i></a>
                    <a href="index.php?action=listado_servicios&idBorrar='.$item["id_servicio"].'"><i class="la la-close delete"></i></a>
                </td>
            </tr>';
			}
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["pass"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Servicio eliminada Exitosamente", "success");
		                window.location.href = "index.php?action=cw_servicio_vista&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
	} 
  
  public function vistaVisitaController()
	{
			$arrayRespuesta = Datos::vistasModel("cw_visitas");
			foreach($arrayRespuesta as $row => $item)
			{
        $servicio = Datos::serviciosIDModel("cw_servicios",$item["id_servicio"]);
				$usuario = Datos::usuariosIDModel("usuarios",$item["id_usuario"]);
           echo'
            <tr role="row" class="odd">
                <td><span class="text-primary"> '.$item["id_visita"].' </span></td>
                <td>'.$item["fecha"].'</td>
                <td>'.$servicio["nombre"].'</td>
								<td>'.$usuario["username"].'</td>
                <td class="td-actions">
                    <a href="#"><i class="la la-edit edit"></i></a>
                    <a href="#"><i class="la la-close delete"></i></a>
                </td>
            </tr>';
			}
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["pass"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Servicio eliminada Exitosamente", "success");
		                window.location.href = "index.php?action=cw_servicio_vista&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
	} 

	
  
  public function agregarUsuariosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$disponibilidad = Datos::ifDuplicadoModel($_POST["txtUsername"],"usuarios");
			if($disponibilidad["username"] != $_POST["txtUsername"])
			{
        $datosController = array( "nombre"=>$_POST["txtNombre"],
									  "apellido"=>$_POST["txtApellido"],
									  "username"=>$_POST["txtUsername"],
									  "email"=>$_POST["txtEmail"],
									  "password"=>$_POST["txtPassword"],
									  "fecha_registro"=>date('Y/m-d'));
        
				$respuesta = Datos::agregarUsuariosModel($datosController, "usuarios");
				if($respuesta == "success")
				{
					echo '<script type="text/javascript">
							alert("Usuario Agregado Exitosamente!");
						 </script>';

						 echo '<script type="text/javascript">
							window.location.href = "index.php?action=listado_usuarios&ok=1";
						</script>';	
				}
				else
				{
					echo "Error en la agregacion de usuario";
				}
			}
			else
			{
				echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  <strong>Hey!</strong> Nombre de usuario repetido, ingresa otro
              </div>';
			}
		}
	}
  
  public function agregarServicioController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "descripcion"=>$_POST["txtDescripcion"],
									  "precio"=>$_POST["txtPrecio"]);
		
			$respuesta = Datos::agregarServicioModel($datosController, "cw_servicios");
			if($respuesta == "success")
			{
				 
			echo '<script type="text/javascript">
				alert("Servicio Agregado Exitosamente!");
				</script>';

			echo '<script type="text/javascript">
					window.location.href = "index.php?action=listado_servicios&ok=1";
					</script>';	

			}
			else
			{
				echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  <strong>Hey!</strong> Hubo un error al agregar el servicio, inténtalo de nuevo
              </div>';	
			}
			
		}
	}
  
  
  
  //AGREGADO
  public function borrarController($tabla,$nom_campo,$enlace)
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarModel($_GET["idBorrar"],$tabla,$nom_campo);
			if($respuesta == "borrado")
			{
				echo '<script type="text/javascript">
				alert("Registro borrado Exitosamente!");
				</script>';
				echo "<script>
						window.location='index.php?action=".$enlace."</script>";
			}
			else
			{
				echo "error";
			}
		}
	} 



	public function actualizarServicioController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "descripcion"=>$_POST["txtDescripcion"],
									  "precio"=>$_POST["txtPrecio"],
									  "id_servicio"=>$_GET["id"]);

			$respuesta = Datos::actualizarServicioModel($datosController, "cw_servicios");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Servicio Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_servicios";
					</script>';
			}
			else
			{
				echo '<script type="text/javascript">
				alert("El Servicio No  Se  A Actualizado Exitosamente!");
				</script>';
			}
		}
	}
  
  ## nuevo 9:01 pm
  
  public function actualizarPasswordController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			if($_POST["txtPassword"]!=$_SESSION["pass"])
			{
				echo '<script type="text/javascript">
							alert("La contraseña actual no coinciden");
						 </script>';
				echo '<script type="text/javascript">
							window.location.href = "index.php?action=actualizar_contraseña";
						</script>';	



				
			}
			else if($_POST["txtPasswordN"]!=$_POST["txtPasswordN2"])
			{
				echo '<script type="text/javascript">
							alert("La contraseña nueva no coinciden");
						 </script>';
				echo '<script type="text/javascript">
							window.location.href = "index.php?action=actualizar_contraseña";
						</script>';	


			}
			else
			{
				$datosController = array( "password"=>$_POST["txtPasswordN"],
										  	"id_usuario"=>$_SESSION["id"]);

				$respuesta = Datos::actualizarPasswordModel($datosController, "usuarios");
				if($respuesta == "success")
				{
					$_SESSION["pass"]=$_POST["txtContraseñaN"];
					 
					echo '<script type="text/javascript">
							alert("Contraseña Actualizada Exitosamente!");
						 </script>';

						 echo '<script type="text/javascript">
							window.location.href = "index.php?action=dashboard";
						</script>';	
				}
				else
				{
					echo '<script type="text/javascript">
					alert("La Contraseña No  Se  A Actualizado Exitosamente!");
					</script>';			
				}
			}
		}
	}

  /*
  public function getServiciosParaSelectController()
  {
    $respuesta = Datos::actualizarPasswordModel($datosController, "usuarios");
    foreach($arrayRespuesta as $row => $item)
    {
       echo'
            <option value="'..'"> '..' </option>
          ';
    }
  }
  */
  
  public function getDatosUsuarioController()
  {
    if(isset($_GET["id"]))
    {
      $datosController = $_GET["id"];
      $respuesta = Datos::getDatosUsuarioModel($datosController, "usuarios");
      return $respuesta;
    }
    
  }


  ########################################################################################################
  ########################################################################################################
  ##################################    C E D E C  ------   T A M     ####################################
  ########################################################################################################
  ########################################################################################################

  	#LLAMADA A LA PLANTILLA
	#-------------------------------------
	
  	public function pagina()
	{
		include "views/admin_template.php";
	}

	#ENLACES
	#-------------------------------------
	public function enlacesPaginasController()
	{
		if(isset( $_GET['action']))
		{
			$enlaces = $_GET['action'];
		}
		else
		{
			$enlaces = "index";
		}
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}

	public function ingresoUsuarioController()
	{
		if(isset($_POST['btnIngresar']))
		{	
			$datosController = array("email"=>$_POST['txtUsername'],
									"pass"=>$_POST['txtPassword']);
			$respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");


				
      if ($respuesta["estado"]=="Inactivo"){
        echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  
                  El usuario<strong >'.$respuesta["email"].'</strong> se encuentra temporalmente deshabilitado. Favor de comunicarse al correo <strong>zaida.castillo@cedectam.org.mx</strong>
                  
              </div>';
        
        
      }

			else if($respuesta["email"] == $_POST["txtUsername"] && $respuesta["pass"] == $_POST["txtPassword"])
			{
        
        
				session_start();
				$_SESSION["id"] = $respuesta["id_usuario"];
				$_SESSION["email"] = $respuesta["email"];
				$_SESSION["pass"] = $respuesta["pass"];
				$_SESSION["id_rol"] = $respuesta["id_rol"];
				$_SESSION["estado"]=$respuesta["estado"];
         
         




				if ($_SESSION["id_rol"]==1)
				{
					
					$infoUsuario = Datos::returnInfoModel($respuesta["id_usuario"],"info_persona");

					$_SESSION["nombre"]=$infoUsuario["nombre"];
					$_SESSION["a_paterno"]=$infoUsuario["a_paterno"];
					$_SESSION["a_materno"]=$infoUsuario["a_materno"];
					$_SESSION["id_persona"]=$infoUsuario["id_persona"];
        }
		    else if ($_SESSION["id_rol"]==2)
		    {
          $infoUsuario = Datos::returnInfoModel($respuesta["id_usuario"],"representante_legal");
		      $_SESSION["nombre_representante"]=$infoUsuario["nombre_representante"];
					$_SESSION["genero"]=$infoUsuario["genero"];
					$_SESSION["telefono_representante"]=$infoUsuario["telefono_representante"];
					$_SESSION["grado_estudios"]=$infoUsuario["grado_estudios"];
					$_SESSION["id_representante_legal"]=$infoUsuario["id_representante_legal"];

		    }
        /*
        echo '<script type="text/javascript">
							alert("Usuario: '.$_SESSION["nombre"].'");
						 </script>';
        
        echo '<script type="text/javascript">
							alert("id: '.$_SESSION["id"].'");
						 </script>';
        */
         echo "<script>
						window.location='index.php?action=dashboard'
					</script>";
			}
			else
			{
        
				echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  <strong>Hey!</strong> la contraseña o usuario no coinciden
              </div>';

			}
		      	
			
		}
	}


	public function getCantidadMisEmpresasController($tabla)
	{
		$respuesta = Datos::getCantidadMisEmpresasModel($tabla,$_SESSION["id_representante_legal"]);
		echo $respuesta["cantidad"];
	}

	public function getCantidadRegistrosController($tabla)
	{
		$respuesta = Datos::getCantidadRegistrosModel($tabla);
		echo $respuesta["cantidad"];
	}

	public function getCantidadUsuariosPorRolController($tabla,$rol,$nom_campo)
	{
		$respuesta = Datos::getCantidadUsuariosPorRolModel($tabla,$rol,$nom_campo);
		echo $respuesta["cantidad"];
	}

	#registra los sectores 
	public function registrarSectoresController($tabla)
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["campo"]);
		
			$respuesta = Datos::registrarSectoresModel($datosController, $tabla);
			if($respuesta == "success")
			{
				 

			echo '<script type="text/javascript">
					window.location.href = "index.php?action=listado_'.$tabla.'&ok=1";
					</script>';	



			}
			else
			{
				echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  <strong>Hey!</strong> Hubo un error al agregar el premio, inténtalo de nuevo
              </div>';
			}
			
		}
	}


	public function registrarEmpresaController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNomEmpresa"],
									  "id_representante_legal"=>$_POST["selectRepresentante"],
									  "estado"=>"Pendiente"
									);
			
		
			$respuesta = Datos::registrarEmpresaModel($datosController, "empresas");
			if($respuesta == "success")
			{
				 

				echo '<script type="text/javascript">
					window.location.href = "index.php?action=listado_empresas&ok=1";
					</script>';	

			}
			else
			{
				echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  <strong>Hey!</strong> Hubo un error al agregar el premio, inténtalo de nuevo
              </div>';
			}
			
		}
	}


	public function registrarProblemaEmpresarialController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "id_empresa"=>$_POST["id_empresa"],
									  "tipo_problema"=>$_POST["tipo_problema"],
									  "descripcion_problema"=>$_POST["descripcion_problema"]
									);
			
		
			$respuesta = Datos::registrarProblemaEmpresarialModel($datosController, "problemas_empresariales");
			if($respuesta == "success")
			{
				 

				echo '<script type="text/javascript">
					window.location.href = "index.php?action=listado_empresas&ok=1";
					</script>';	

			}
			else
			{
				echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  <strong>Hey!</strong> Hubo un error al agregar el problema, inténtalo de nuevo
              </div>';
			}
			
		}
	}

	public function registrarPrediagnosticoController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( 
									"encuestador"=>$_POST["encuestador"],
									"fecha_captacion"=>$_POST["fecha_captacion"],
									"consultor_asignado"=>$_POST["consultor_asignado"],
									"carta_de_terminos" =>$_POST["carta_de_terminos"],
									"id_empresa" =>$_GET["id"],
									"rfc"=>$_POST["rfc"],
									"camara_perteneciente"=>$_POST["camara_perteneciente"],
									"giro"=>$_POST["giro"],
									"actividades_realizadas"=>$_POST["actividades_realizadas"],
									"id_sector" =>$_POST["id_sector"],
									"num_empleados" =>$_POST["num_empleados"],
									"num_sucursales" =>$_POST["num_sucursales"],
									"anios_exportacion" =>$_POST["anios_exportacion"],
									"certificado_calidad" =>$_POST["certificado_calidad"],
									"empresa_en_operacion"=>$_POST["empresa_en_operacion"],
									"estados_financieros" =>$_POST["estados_financieros"],
									"scian" =>$_POST["scian"],
									"inicio_operacion" =>$_POST["inicio_operacion"],
									"informacion_que_entrega" =>$_POST["informacion_que_entrega"],
									"colonia" =>$_POST["colonia"],
									"id_municipio" =>$_POST["id_municipio"],
									"calle" =>$_POST["calle"],
									"num_domicilio"=>$_POST["num_domicilio"],
									"cp"=>$_POST["cp"],
									"telefono_empresarial" =>$_POST["telefono_empresarial"],
									"correo_empresa" =>$_POST["correo_empresa"],
									"fax"=>$_POST["fax"],
									"id_usuario" =>$_POST["id_usuario"],
									"estado" =>"Mostrar"
									);
		
			$respuesta = Datos::registrarPrediagnosticoModel($datosController, "empresas_prediagnostico");

			


			$respuesta2 = Datos::actualizarEmpresaEstadoModel($datosController, "empresas");
			if($respuesta == "success")
			{
				 

			echo '<script type="text/javascript">
					window.location.href = "index.php?action=listado_empresas&ok=1";
					</script>';	

			}
			else
			{
				echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  <strong>Hey!</strong> Hubo un error al agregar el prediagnostico, inténtalo de nuevo
              </div>';
			}
			
		}
	}

	public function registrarRepresentanteLegalController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre_representante"=>$_POST["txtNomRepresentante"],
									  "genero"=>$_POST["selectGenero"],
									  "telefono_representante"=>$_POST["txtTel"],
									  "grado_estudios"=>$_POST["selectEstudios"]
									);

			$verificarRepresentante = Datos::returnRepresenanteModel($datosController,"representante_legal");

			if($verificarRepresentante["nombre_representante"]==$_POST["txtNomRepresentante"])
			{

				echo '
        		  <div class="alert alert-warning alert-dissmissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>Hey el representante ya existe!</strong>, favor de ingresar otro nombre.
               	  </div>
          		';

			}
			else
			{
		
				$respuesta = Datos::registrarRepresentanteLegalModel($datosController, "representante_legal");
				if($respuesta == "success")
				{

				echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_representantes_legales&ok=1";
						</script>';	

				}
				else
				{
					echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
	                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	                  <strong>Hey!</strong> Hubo un error al agregar el representante legal, inténtalo de nuevo
	              </div>';
				}
			}
			
		}
	}


	/*public function registrarUsuarioBenerficiarioController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre_representante"=>$_POST["selectRepresentante"],
									  "email"=>$_POST["email"],
									  "pass"=>$_POST["pass"],
									  "id_rol"=>1,
									  "estado"=>"Activo"
									);

			$verificarUsuario=Datos::returnUsuarioRepetidoModel($datosController,"usuarios");

			echo '<script type="text/javascript">
				alert("verificarUsuario: '.$verificarUsuario["email"].'\n email: '.$datosController["email"].'");
				</script>';



			if($verificarUsuario["email"]==$datosController["email"])
			{
				echo '<script type="text/javascript">
				alert("ya esta regitrado");
				</script>';

				#echo '
        		 # <div class="alert alert-warning alert-dissmissible fade show" role="alert">
                  #  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    #<strong>Hey el correo "'.$verificarUsuario["email"].'" ya existe!</strong>, favor de ingresar otro correo.
               	 # </div>
          		#';

			}
			else
			{

				echo '<script type="text/javascript">
				alert("siguiente");
				</script>';
			/*
		
				$respuesta = Datos::registararUsuarioBeneficiarioModel($datosController, "usuarios");

				$ultimoUsuario=Datos::returUltimoUsuarioModel();
				echo '<script type="text/javascript">
				alert("ultimo usuario respuesta: '.$ultimoUsuario["id_usuario"].'");
				</script>';
				$respuesta2=actualizarBeneficiarioIdUsuarioModel($ultimoUsuario["id_usuario"],$datosController["selectRepresentante"]);

				if($respuesta == "success")
				{

				echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_representantes_legales&ok=1";
						</script>';	

				}
				else
				{
					echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
	                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	                  <strong>Hey!</strong> Hubo un error al agregar el representante legal, inténtalo de nuevo
	              </div>';
				}
			
			}
			
		}
	}*/


	public function vistaSectoresController()
	{
	    if(isset($_GET["ok"]))
	    {
	      echo '
	          
	          <div class="alert alert-success alert-dissmissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>Hey!</strong> Sector agregado con éxito
               </div>
	          ';
	    }
	    if(isset($_GET["editado"]))
	    {
	      echo '
	          <div class="alert alert-info alert-dissmissible fade show" role="alert">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	              <strong>Hey!</strong> Sector actualizado con éxito
	          </div>
	          ';
	    }
	    if(isset($_GET["idBorrar"]))
	    {
	    	
				echo '
	          <div class="alert alert-danger alert-dissmissible fade show" role="alert">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	              <strong>Hey!</strong> Sector borrado con éxito
	          </div>
	          ';


	    }
	    
				$arrayRespuesta = Datos::vistasModel("sectores");
				foreach($arrayRespuesta as $row => $item)
				{
		            echo'
		            <tr>
                        <td><span class="text-primary">'.$item["id_sector"].'</span></td>
                        <td>'.$item["nombre"].'</td>
                        <td class="td-actions">
                            <a href="index.php?action=editar_sector&id='.$item["id_sector"].'"><i class="la la-edit edit"></i></a>
                            <a href="index.php?action=listado_sectores&idBorrar='.$item["id_sector"].'"><i class="la la-close delete"></i></a>
                        </td>
                    </tr>';
				}
				echo '<script type="text/javascript">
		        var password="'.$_SESSION["pass"].'";
		        function borrar(id){
		          swal("Ingrese su contraseña:", {
		            content: "input",
			          })
			          .then((value) => 
			          {
			              if (value==password) 
			              {
			                swal("Contraseña correcta", "Sector eliminada Exitosamente", "success");
			                window.location.href = "index.php?action=listado_sectores&idBorrar="+id;
			              }
			              else
			              {
			                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
			              }     
			          });
			        } 
			    </script>';
	}  

	public function vistaMunicipiosController()
	{
	    if(isset($_GET["ok"]))
	    {
	      echo '
	          
	          <div class="alert alert-success alert-dissmissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>Hey!</strong>Municipio agregado con éxito
               </div>
	          ';
	    }
	    if(isset($_GET["editado"]))
	    {
	      echo '
	          <div class="alert alert-info alert-dissmissible fade show" role="alert">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	              <strong>Hey!</strong> Municipio actualizado con éxito
	          </div>
	          ';
	    }
	    
				$arrayRespuesta = Datos::vistasModel("municipios");
				foreach($arrayRespuesta as $row => $item)
				{
		            echo'
		            <tr>
                        <td><span class="text-primary">'.$item["id_municipio"].'</span></td>
                        <td>'.$item["nombre"].'</td>
                        <td class="td-actions">
                            <a href="index.php?action=editar_sector&id='.$item["id_municipio"].'"><i class="la la-edit edit"></i></a>
                            <a href="index.php?action=listado_sectores&idBorrar='.$item["id_municipio"].'"><i class="la la-close delete"></i></a>
                        </td>
                    </tr>';
				}
				echo '<script type="text/javascript">
		        var password="'.$_SESSION["pass"].'";
		        function borrar(id){
		          swal("Ingrese su contraseña:", {
		            content: "input",
			          })
			          .then((value) => 
			          {
			              if (value==password) 
			              {
			                swal("Contraseña correcta", "Sector eliminada Exitosamente", "success");
			                window.location.href = "index.php?action=listado_sectores&idBorrar="+id;
			              }
			              else
			              {
			                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
			              }     
			          });
			        } 
			    </script>';
	}  



	public function vistaAdministradoresController()
	{
	    if(isset($_GET["ok"]))
	    {
	      echo '
	          <div class="alert alert-success alert-dissmissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>Hey!</strong> Administrador agregado con éxito
               </div>
	          ';
	    }
	    if(isset($_GET["editado"]))
	    {
	      echo '
	          <div class="alert alert-info alert-dissmissible fade show" role="alert">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	              <strong>Hey!</strong> Administrador actualizado con éxito
	          </div>
	          ';
	    }
				$arrayRespuesta = Datos::vistasUsuarioAdministradorModel("info_persona","usuarios");
				$aux=0;
				foreach($arrayRespuesta as $row => $item)
				{
					$aux++;

		            echo '<tr>
                             <td><span class="text-primary">'.$aux.'</span></td>
                              	<td>'.$item["nombre"].'</td>
                                <td>'.$item["a_paterno"].'</td>
                                <td>'.$item["a_materno"].'</td>
                                <td>'.$item["email"].'</td>';
                    if ($item["estado"]=="Inactivo")
                    {
                    	echo '<td><span style="width:100px;"><span class="badge-text badge-text-small danger">'.$item["estado"].'</span></span></td>';	

                    }else if ($item["estado"]=="Activo")
                    {
                    	echo '<td><span style="width:100px;"><span class="badge-text badge-text-small success">'.$item["estado"].'</span></span></td>';

                    }else
                    {
                    	echo '<td><span style="width:100px;"><span class="badge-text badge-text-small info">'.$item["estado"].'</span></span></td>';

                    }


                    echo '
                                <td class="td-actions">';
                                if($_SESSION["id"]!=$item["id_usuario"])
                                {
                                echo '			
                                    <a href="index.php?action=editar_usuario_administrador&id='.$item["id_usuario"].'"><i class="la la-edit edit"></i></a>
                                    <a href="#"><i class="la la-close delete"></i></a>';
                                }
                               echo ' 
                                </td>
                           </tr>';
				}
				echo '<script type="text/javascript">
		        var password="'.$_SESSION["pass"].'";
		        function borrar(id){
		          swal("Ingrese su contraseña:", {
		            content: "input",
			          })
			          .then((value) => 
			          {
			              if (value==password) 
			              {
			                swal("Contraseña correcta", "Premio eliminada Exitosamente", "success");
			                window.location.href = "index.php?action=cw_premio_vista&idBorrar="+id;
			              }
			              else
			              {
			                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
			              }     
			          });
			        } 
			    </script>';

	}  




	# LISTADO DE REPRESENTANTES LEGALES
	public function listadoRepresentantesLegalesController()
	{
	    if(isset($_GET["ok"]))
	    {
	      echo '
	          <div class="alert alert-success alert-dissmissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>Hey!</strong> Representante agregado con éxito
               </div>
	          ';
	    }
	    if(isset($_GET["editado"]))
	    {
	      echo '
	          <div class="alert alert-info alert-dissmissible fade show" role="alert">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	              <strong>Hey!</strong> Representante actualizado con éxito
	          </div>
	          ';
	    }
				$arrayRespuesta = Datos::vistaRepresentantesLegalesModel();
				$arrayRespuesta2= Datos::vistasModel("representante_legal");
				$aux=0;
				foreach($arrayRespuesta2 as $row => $item)
				{
					if ($item["id_usuario"]==""){


			            echo '<tr>
	                             <td><span class="text-primary">'.$item["id_representante_legal"].'</span></td>
	                              	<td>'.$item["nombre_representante"].'</td>
	                                <td>'.$item["genero"].'</td>
	                                <td>'.$item["telefono_representante"].'</td>
	                                <td>'.$item["grado_estudios"].'</td>
	                                <td><span style="width:100px;"><a href="index.php?action=registrar_usurio_beneficiario&id='.$item["id_representante_legal"].'"><span class="badge-text badge-text-small danger">Registrar</span></span></a>
	                                </td>

	                              	<td class="td-actions">
	                                <a href="index.php?action=editar_representante_legal&id='.$item["id_representante_legal"].'"><i class="la la-edit edit"></i></a>
	                                <a href="#"><i class="la la-close delete"></i></a>
	                                </td>
	                           </tr>';
	                }
				}

				foreach($arrayRespuesta as $row => $item)
				{
					if ($item["id_usuario"]!=""){


			            echo '<tr>
	                             <td><span class="text-primary">'.$item["id_representante_legal"].'</span></td>
	                              	<td>'.$item["nombre_representante"].'</td>
	                                <td>'.$item["genero"].'</td>
	                                <td>'.$item["telefono_representante"].'</td>
	                                <td>'.$item["grado_estudios"].'</td>
	                                <td>'.$item["email"].'</td>
	                              	<td class="td-actions">
	                                <a href="index.php?action=editar_representante_legal&id='.$item["id_representante_legal"].'"><i class="la la-edit edit"></i></a>
	                                <a href="#"><i class="la la-close delete"></i></a>
	                                </td>
	                           </tr>';
	                }
				}
				


				echo '<script type="text/javascript">
		        var password="'.$_SESSION["pass"].'";
		        function borrar(id){
		          swal("Ingrese su contraseña:", {
		            content: "input",
			          })
			          .then((value) => 
			          {
			              if (value==password) 
			              {
			                swal("Contraseña correcta", "Premio eliminada Exitosamente", "success");
			                window.location.href = "index.php?action=cw_premio_vista&idBorrar="+id;
			              }
			              else
			              {
			                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
			              }     
			          });
			        } 
			    </script>';

	}  


	public function mostrarEmpresaPorID($id_empresa)
	{
		# code...
		$arrayRespuesta = Datos::mostrarEmpresaPorIDModel($id_empresa);

		foreach($arrayRespuesta as $row => $item)
		{/*

			

	            echo '<tr>
                         <td><span class="text-primary">'.$item["id_empresa"].'</span></td>
                          	<td>'.$item["nombre"].'</td>
                            <td>'.$item["nombre_representante"].'</td>
                            ';

                            if($item["estado"]=="Pendiente")
                            {
                            	echo '
                            	
                            		<td><span style="width:100px;"><a href="index.php?action=registrar_prediagnostico_a_empresa&id='.$item["id_empresa"].'"><span class="badge-text badge-text-small danger">'.$item["estado"].'</span></span></td>
                            	</a>';
                            	
                            }
                            else if($item["estado"]=="Mostrar")
                            {
                             /* echo '
                            	
                            		<td><span style="width:100px;"><a href="#'.$item["id_empresa"].'"><span class="badge-text badge-text-small success">'.$item["estado"].'</span></span></td>
                            	</a>';*/

                            /*	echo '
                            	<td>
                            	
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-large">'.$item["estado"].'</button>
                                            
                            	</td>';

                            }
        
                            
                            
                            if($item["cuestionario"]=="Pendiente")
                            {
                            	
                            	echo '
                            	
                            		<td><span style="width:100px;"><a href="index.php?action=registrar_cuestionario&id='.$item["id_empresa"].'"><span class="badge-text badge-text-small danger">'.$item["cuestionario"].'</span></span></td>
                            	</a>';
                            }
                            else if($item["cuestionario"]=="Mostrar")
                            {
                              echo '
                            	
                            		<td><span style="width:100px;"><a href="##'.$item["id_empresa"].'"><span class="badge-text badge-text-small success">'.$item["cuestionario"].'</span></span></td>
                            	</a>';

                            }
        
                            
                          	
                          	echo '<td class="td-actions"><a href="index.php?action=editar_empresa&id='.$item["id_empresa"].'"><i class="la la-edit edit"></i></a>
                            <a href="#"><i class="la la-close delete"></i></a>

                            </td>
                       </tr>';



*/
                       echo '<tr>
                         		<td><span style="width:2px;" class="text-primary">1</span></td>
	                          	<td>Id prediagnóstico</td>
	                            <td>'.$item["id_empresa_prediagnostico"].'</td>
                       		</tr>
                       		<tr>
                         		<td><span style="width:2px;" class="text-primary">2</span></td>
	                          	<td>Encuestador</td>
	                            <td>'.$item["encuestador"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">3</span></td>
	                          	<td>Fecha de captación</td>
	                            <td>'.$item["fecha_captacion"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">4</span></td>
	                          	<td>Consultor asignado</td>
	                            <td>'.$item["consultor_asignado"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">5</span></td>
	                          	<td>Carta de terminos</td>
	                            <td>'.$item["carta_de_terminos"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">6</span></td>
	                          	<td>Nombre de la empresa</td>
	                            <td>'.$item["nombre_empresa"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">7</span></td>
	                          	<td>RFC</td>
	                            <td>'.$item["rfc"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">8</span></td>
	                          	<td>Representante legal</td>
	                            <td>'.$item["nombre_representante"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">9</span></td>
	                          	<td>Género</td>
	                            <td>'.$item["genero"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">10</span></td>
	                          	<td>Telefono del representante</td>
	                            <td>'.$item["telefono_representante"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">11</span></td>
	                          	<td>Grado de estudios</td>
	                            <td>'.$item["grado_estudios"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">12</span></td>
	                          	<td>Usuario</td>
	                            <td>'.$item["email"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">13</span></td>
	                          	<td>Estado usuario</td>
	                            <td>'.$item["estado_usuario"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">14</span></td>
	                          	<td>Camara a la que pertenece</td>
	                            <td>'.$item["camara_perteneciente"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">15</span></td>
	                          	<td>Giro</td>
	                            <td>'.$item["giro"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">16</span></td>
	                          	<td>Actividades que realiza</td>
	                            <td>'.$item["actividades_realizadas"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">17</span></td>
	                          	<td>Sector</td>
	                            <td>'.$item["nombre_sector"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">18</span></td>
	                          	<td>Número de empleados</td>
	                            <td>'.$item["num_empleados"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">19</span></td>
	                          	<td>Númer de sucursales</td>
	                            <td>'.$item["num_sucursales"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">20</span></td>
	                          	<td>Años de exportación</td>
	                            <td>'.$item["anios_exportacion"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">21</span></td>
	                          	<td>¿Cuenta con sertificado de calidad?</td>
	                            <td>'.$item["certificado_calidad"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">22</span></td>
	                          	<td>¿La empresa se encuentra en operación?</td>
	                            <td>'.$item["empresa_en_operacion"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">23</span></td>
	                          	<td>¿Cuenta con estados financieros?</td>
	                            <td>'.$item["estados_financieros"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">24</span></td>
	                          	<td>SCIAN</td>
	                            <td>'.$item["scian"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">25</span></td>
	                          	<td>Inicio de operación</td>
	                            <td>'.$item["inicio_operacion"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">26</span></td>
	                          	<td>¿Que información se entrego?</td>
	                            <td>'.$item["informacion_que_entrega"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">27</span></td>
	                          	<td>Colonia</td>
	                            <td>'.$item["colonia"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">28</span></td>
	                          	<td>Municipio</td>
	                            <td>'.$item["nombre_municipio"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">29</span></td>
	                          	<td>No.</td>
	                            <td>'.$item["num_domicilio"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">30</span></td>
	                          	<td>Código postal</td>
	                            <td>'.$item["cp"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">31</span></td>
	                          	<td>Teléfono empresarial</td>
	                            <td>'.$item["telefono_empresarial"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">32</span></td>
	                          	<td>Correo empresarial</td>
	                            <td>'.$item["correo_empresa"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">33</span></td>
	                          	<td>Fax</td>
	                            <td>'.$item["fax"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">34</span></td>
	                          	<td>ID</td>
	                            <td>'.$item["id_empresa_prediagnostico"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">35</span></td>
	                          	<td>ID</td>
	                            <td>'.$item["id_empresa_prediagnostico"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">36</span></td>
	                          	<td>ID</td>
	                            <td>'.$item["id_empresa_prediagnostico"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">37</span></td>
	                          	<td>ID</td>
	                            <td>'.$item["id_empresa_prediagnostico"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">38</span></td>
	                          	<td>ID</td>
	                            <td>'.$item["id_empresa_prediagnostico"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">39</span></td>
	                          	<td>ID</td>
	                            <td>'.$item["id_empresa_prediagnostico"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">40</span></td>
	                          	<td>ID</td>
	                            <td>'.$item["id_empresa_prediagnostico"].'</td>
                       		</tr><tr>
                         		<td><span style="width:2px;" class="text-primary">41</span></td>
	                          	<td>ID</td>
	                            <td>'.$item["id_empresa_prediagnostico"].'</td>
                       		</tr>





                       		';
			

			

	}
}

	public function listadoEmpresasController()
	{
	    if(isset($_GET["ok"]))
	    {
	      echo '
	          <div class="alert alert-success alert-dissmissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>Hey!</strong> Empresa agregado con éxito
               </div>
	          ';
	    }
	    if(isset($_GET["editado"]))
	    {
	      echo '
	          <div class="alert alert-info alert-dissmissible fade show" role="alert">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	              <strong>Hey!</strong> Empresa actualizado con éxito
	          </div>
	          ';
	    }
	    

	    if ($_SESSION["id_rol"]==2)
	    {
	    		
			$arrayRespuesta = Datos::listadoMisEmpresasModel($_SESSION["id_representante_legal"]);
			
		}else
		{
			$arrayRespuesta = Datos::listadoEmpresasModel();

		}
			
			foreach($arrayRespuesta as $row => $item)
			{
			

	            echo '<tr>
                         <td><span class="text-primary">'.$item["id_empresa"].'</span></td>
                          	<td>'.$item["nombre"].'</td>
                            <td>'.$item["nombre_representante"].'</td>
                            ';

                            if($item["estado"]=="Pendiente")
                            {
                            	echo '
                            	
                            		<td><span style="width:100px;"><a href="index.php?action=registrar_prediagnostico_a_empresa&id='.$item["id_empresa"].'"><span class="badge-text badge-text-small danger">'.$item["estado"].'</span></span></td>
                            	</a>';
                            	
                            }
                            else if($item["estado"]=="Mostrar")
                            {
                             echo '
                            	
                            		<td><span style="width:100px;"><a href="index.php?action=mostrar_prediagnostico&id='.$item["id_empresa"].'"><span class="badge-text badge-text-small success">'.$item["estado"].'</span></span></td>
                            	</a>';/*

                            	echo '
                            	<td>
                            	
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-large">'.$item["estado"].'</button>
                                            
                            	</td>';*/

                            }
        
                            
                            
                            if($item["cuestionario"]=="Pendiente")
                            {
                            	
                            	echo '
                            	
                            		<td><span style="width:100px;"><a href="index.php?action=registrar_analisis_empresarial&id='.$item["id_empresa"].'"><span class="badge-text badge-text-small danger">'.$item["cuestionario"].'</span></span></td>
                            	</a>';
                            }
                            else if($item["cuestionario"]=="Mostrar")
                            {
                              echo '
                            	
                            		<td><span style="width:100px;"><a href="##'.$item["id_empresa"].'"><span class="badge-text badge-text-small success">'.$item["cuestionario"].'</span></span></td>
                            	</a>';

                            }
                            $cantidad = Datos::getCantidadUsuariosPorRolModel("problemas_empresariales",$item["id_empresa"],"id_empresa");

                            echo '<td>
                            		<button onclick=clickaction(this) id='.$item["id_empresa"].' type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-large">Problemas ('.$cantidad["cantidad"].')</button>
                            		</td>'
                            	;

                            /*
                            echo '
                            	
                            		<td><span style="width:100px;"><a href="index.php?action=registrar_problema_empresarial&empresa='.$item["nombre"].'&id='.$item["id_empresa"].'"><span class="badge-text badge-text-small info">Registrar ('.$respuesta["cantidad"].')</span></span></td>
                            	</a>';*/
        
                            
                          	
                          	echo '<td class="td-actions"><a href="index.php?action=editar_empresa&id='.$item["id_empresa"].'"><i class="la la-edit edit"></i></a>
                            <a href="#"><i class="la la-close delete"></i></a>

                            </td>
                       </tr>';
			}
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["pass"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Premio eliminada Exitosamente", "success");
		                window.location.href = "index.php?action=cw_premio_vista&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
		    echo '<script type="text/javascript">
function clickaction( b ){
   Console.log(b.id)  
    
</script>';

	}  




	public function listadoProblemasEmpresarialesController()
	{
	    if(isset($_GET["ok"]))
	    {
	      echo '
	          <div class="alert alert-success alert-dissmissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>Hey!</strong> Empresa agregado con éxito
               </div>
	          ';
	    }
	    if(isset($_GET["editado"]))
	    {
	      echo '
	          <div class="alert alert-info alert-dissmissible fade show" role="alert">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	              <strong>Hey!</strong> Empresa actualizado con éxito
	          </div>
	          ';
	    }
	 
		$arrayRespuesta = Datos::returnPrblemasEmpresarialesModel(1);

		
			
			foreach($arrayRespuesta as $row => $item)
			{
			

	            echo '<tr>
                         <td><span class="text-primary">'.$item["id_problema_empresarial"].'</span></td>
                          	<td>'.$item["nombre"].'</td>
                            <td>'.$item["tipo_problema"].'</td>
                            <td>'.$item["descripcion_problema"].'</td>
                            </tr>';

                            
			}
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["pass"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Premio eliminada Exitosamente", "success");
		                window.location.href = "index.php?action=cw_premio_vista&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
		    echo '<script type="text/javascript">
function clickaction( b ){
   Console.log(b.id)  
    
</script>';

	}  

	#botine la  consulta de  un registro apartir de del id del campo

	public function editarController($tabla,$nom_campo)
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::editarModel($id,$tabla,$nom_campo);
			return $respuesta;
		}
	}

	public function getEmpresPorIdController()
	{
		if(isset($_GET["id"]))
		{

			$id = $_GET["id"];


			$respuesta = Datos::getEmpresaPorIdModel($id,"empresas","representante_legal");
			

			return $respuesta;
		}
	}

	public function getEmpresaDetallesPorIdController()
	{
		if(isset($_GET["id"]))
		{

			$id = $_GET["id"];


			$respuesta = Datos::getEmpresaDetallesPorIdModel($id,"empresas","representante_legal");
			

			return $respuesta;
		}
	}





	public function editarEmpresaController()
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::getEmpresaIDModel($id);
			
			return $respuesta;
		}
	}


	#botine la  consulta de  un registro apartir de del id del campo

	public function editarInformacionController()
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::editarAdministradorModel($id,"info_persona","usuarios");
			return $respuesta;
		}
	}


	public function actualizarSectorController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "id_sector"=>$_GET["id"]);

			$respuesta = Datos::actualizarSectorModel($datosController, "sectores");
			if($respuesta == "success")
			{
				 
				

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_sectores&editado=1";
					</script>';	
			}
			else
			{
				echo 
				'<div class="alert alert-danger alert-dissmissible fade show" role="alert">
		                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
		                  <strong>Hey!</strong> sector no actualizado correctamente
		              </div>';
			}
		}
	}




	public function actualizarEmpresaController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNomEmpresa"],
									  "estado"=>$_POST["selectEstado"],
									  "id_representante_legal"=>$_POST["selectRepresentante"],
									  "id_empresa"=>$_GET["id"]);

			

			$respuesta = Datos::actualizarEmpresaModel($datosController, "empresas");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_empresas&editado=1";
					</script>';	
			}
			else
			{
				echo '<script type="text/javascript">
				alert("La Empresa No  Se  A Actualizado Exitosamente!");
				</script>';			
			}
		}
	}



	public function registrarAdministradorController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosUsuarioController = array("email"=>$_POST["txtEmail"],
									  		"pass"=>$_POST["txtPass"],
									  		"id_rol"=>1,
									  		"estado"=>$_POST["selectEstado"]);

			$verificarUsuario=Datos::returnUsuarioRepetidoModel($datosUsuarioController,"usuarios");

			if($verificarUsuario["email"]==$datosUsuarioController["email"])
			{

				echo 
				'<div class="alert alert-warning alert-dissmissible fade show" role="alert">
		                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
		                  <strong>Hey!</strong> el correo ya se encuntra registrado, intente con otro correo.
		              </div>';
				
			}
			else
			{
				$respuesta = Datos::registrarUsuarioModel($datosUsuarioController,"usuarios");

				if ($respuesta=="success") {
					# code...

					$ultimoRegistro=Datos::returUltimoRegistroModel("usuarios","id_usuario");


					$datosController = array( "nombre"=>$_POST["txtNombre"],
											  "a_paterno"=>$_POST["txtApellidoP"],
											  "a_materno"=>$_POST["txtApellidoM"],
											  "id_usuario"=>$ultimoRegistro["id_usuario"]);


					
					$respuesta2 = Datos::registrarInfoPersonaModel($datosController,"info_persona");
				}
			

				if($respuesta == "success" && $respuesta2=="success")
				{
						 echo '<script type="text/javascript">
							window.location.href = "index.php?action=listado_administradores&ok=1";
						</script>';	
				}
				else
				{
					echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
		                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
		                  <strong>Hey!</strong> Hubo un error al agregar el  usuario, inténtalo de nuevo
		              </div>';
				}

			}
		}
	}


	public function registrarBeneficiarioController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosUsuarioController = array("id_representante_legal"=>$_POST["selectRepresentante"],
									  		"email"=>$_POST["email"],
									  		"pass"=>$_POST["pass"],
									  		"id_rol"=>2,
									  		"estado"=>"Activo");

			$verificarUsuario=Datos::returnUsuarioRepetidoModel($datosUsuarioController,"usuarios");

			if($verificarUsuario["email"]==$datosUsuarioController["email"])
			{
				echo 
				'<div class="alert alert-warning alert-dissmissible fade show" role="alert">
		                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
		                  <strong>Hey!</strong> el correo ya se encuntra registrado, intente con otro correo.
		              </div>';
			}
			else
			{
				$respuesta = Datos::registrarUsuarioModel($datosUsuarioController,"usuarios");

				if ($respuesta=="success") {
					# code...

					$ultimoRegistro=Datos::returUltimoRegistroModel("usuarios","id_usuario");
					$datosController= array("id_usuario" =>$ultimoRegistro["id_usuario"] ,
											"id_representante_legal"=> $_POST["selectRepresentante"]
										);
					$respuesta2=Datos::asignarUsuarioRepresentanteModel($datosController,"representante_legal");
				}
			

				if($respuesta2=="success")
				{
						 echo '<script type="text/javascript">
							window.location.href = "index.php?action=listado_representantes_legales&ok=1";
						</script>';	
				}
				else
				{
					echo '<div class="alert alert-danger alert-dissmissible fade show" role="alert">
		                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
		                  <strong>Hey!</strong> Hubo un error al agregar el  usuario, inténtalo de nuevo
		              </div>';
				}
				

			}
		}
	}



	public function actualizarInformacionController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$nombre = mysql_real_escape_string($_POST['txtNombre']);
           	$a_paterno = mysql_real_escape_string($_POST['txtApellidoP']);
            $a_materno = mysql_real_escape_string($_POST['txtApellidoM']);
            $email = mysql_real_escape_string($_POST['txtEmail']);
            $estado = mysql_real_escape_string($_POST['selectEstado']);
            $pass = mysql_real_escape_string($_POST['txtPass']);
            $id_usuario = mysql_real_escape_string($_GET['id']);
            

            
            
            $comprobar = mysql_num_rows(mysql_query("SELECT * FROM usuarios WHERE email = '$email' AND id_usuario != '$id_usuario'"));
            if($comprobar == 0){
            $type = 'jpg';
            $rfoto = $_FILES['img_usuario']['tmp_name'];
            $name = $id.'.'.$type;
            if(is_uploaded_file($rfoto))
            {
              $destino = 'views/archivos/'.$name;
              $nombrea = $name;
              copy($rfoto, $destino);
            }
            else
            {
              $nombrea = $use['img_usuario'];
            }
            $sql = mysql_query("UPDATE usuarios SET nombre = '$nombre', a_paterno = '$a_paterno', a_materno = '$a_materno', email = '$email', estado = '$estado', pass=$pass, , img_usuario = '$nombrea' WHERE id_usuario = '$id_usuario'");
            if($sql) {echo '<script type=text/javascript>window.location=index.php?action=editar_informacion&id=$_SESSION["id"];</script>"';}
            } else {echo 'El nombre de usuario ya está en uso, escoja otro';}

		/*
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "a_paterno"=>$_POST["txtApellidoP"],
									  "a_materno"=>$_POST["txtApellidoM"],
									  "email"=>$_POST["txtEmail"],
									  "estado"=>$_POST["selectEstado"],
									  "pass"=>$_POST["txtPass"],
									  "id_usuario"=>$_GET["id"],
									  "img_usuario"=>$_POST["img_usuario"]);





			$respuesta = Datos::actualizarInformacionModel($datosController, "info_persona");


			$respuesta2 = Datos::actualizarInformacionUsuarioModel($datosController,"usuarios");

			

			

			if($respuesta == "success" && $respuesta2=="success")
			{
				if($_SESSION["id"]==$datosController["id_usuario"]){

					$_SESSION["email"] = $datosController["email"];
					$_SESSION["pass"] = $datosController["pass"];
					$_SESSION["estado"]=$datosController["estado"];

					$_SESSION["nombre"]=$datosController["nombre"];
					$_SESSION["a_paterno"]=$datosController["a_paterno"];
					$_SESSION["a_materno"]=$datosController["a_materno"];

				}

		

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_administradores&editado=1";
					</script>';	
			}
			else
			{
				echo '<script type="text/javascript">
						alert("Usuario No Actualizado Exitosamente!");
					 </script>';
			}*/
		}
	}



	public function actualizarRepresentanteLegalController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre_representante"=>$_POST["txtNomRepresentante"],
									  "genero"=>$_POST["selectGenero"],
									  "telefono_representante"=>$_POST["txtTel"],
									  "grado_estudios"=>$_POST["selectEstudios"],
									  "id_representante_legal"=>$_GET["id"]);

			$respuesta = Datos::actualizarRepresentanteLegalModel($datosController, "representante_legal");

			if($respuesta == "success")
			{
				echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_representantes_legales&editado=1";
					 </script>';	
			}
			else
			{
				 echo '
			          <div class="alert alert-danger alert-dissmissible fade show" role="alert">
			                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
			                    <strong>Hey!</strong> representante legal no ctualizado con exito
			               </div>
			          ';
			}
		}
	}

	#returna en un select2 live los representantes legales
	public function getSelectRepresentanteController()
	{
		

		$todosLosRegistros = Datos::getRepresentanteSinUsuarioModel("representante_legal");

		
		foreach($todosLosRegistros as $row => $item)
		{
		echo '
				<option value="'.$item["id_representante_legal"].'"> '.
					$item["nombre_representante"].'
				</option> 
			';
		}
	}


	public function getRepresentanteSinUsuarioController()
	{

		$todosLosRegistros = Datos::getRepresentanteSinUsuarioModel("representante_legal");

		
		foreach($todosLosRegistros as $row => $item)
		{
			if($item["id_usuario"]==""){

				echo '
					<option value="'.$item["id_representante_legal"].'"> '.
							$item["nombre_representante"].'
					</option> 
					';
			}
		}
	}


	public function getSelectEmpresasController()
	{
		

		$todosLosRegistros = Datos::getSelectEmpresasModel();

		
		foreach($todosLosRegistros as $row => $item)
		{
			if($item["estado"]=="Pendiente")
			{

				echo '
						<option value="'.$item["id_empresa"].'"> '.
							$item["nombre"].'
						</option> 
					';
			}
		}
	}

	public function getSelectMunicipiosController($tabla,$id,$nom_campo)
	{ 

		if($_SESSION["id_rol"]==1){
			$todosLosRegistros = Datos::getSelectDatosModel($tabla);
		}if($_SESSION["id_rol"]==2){
			
			$todosLosRegistros = Datos::getSelectDatosPorCampoModel($tabla,$_SESSION["id_representante_legal"],"id_representante_legal");
		}

		

		
		foreach($todosLosRegistros as $row => $item)
		{
			

			echo '
					<option value="'.$item[$id].'"> '.
						$item[$nom_campo].'
					</option> 
				';
			
		}
	}


	





}
?>