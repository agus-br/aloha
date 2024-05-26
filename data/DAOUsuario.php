<?php
//importa la clase conexión y el modelo para usarlos
require_once 'conexion.php';
require_once '../model/usuario.php';

class DAOUsuario
{    
	private $conexion; 
    private function conectar(){
        try{
			$this->conexion = Conexion::conectar(); 
		}
		catch(Exception $e)
		{
			die($e->getMessage()); 
		}
	}
    
    public function login($correo,$password){
		try
		{ 
            $this->conectar();
            
            //Almacenará el registro obtenido de la BD
			$obj = null; 
            
			$sentenciaSQL = $this->conexion->prepare("SELECT id, nombre, apellidoPaterno, apellidoMaterno, rol, correo
            FROM usuarios WHERE correo=? AND CAST(password as varchar(28))=CAST(sha224(?) as varchar(28))");
			//CAST(password as varchar(28))=CAST(sha224(?) as varchar(28))");
			//Se ejecuta la sentencia sql con los parametros dentro del arreglo 
			$sentenciaSQL->execute([$correo, $password]);
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			if($fila){
                $obj = new usuario();
                $obj->id = $fila->id;
                $obj->nombre = $fila->nombre;
                $obj->apellidoPaterno = $fila->apellidoPaterno;
                $obj->apellidoMaterno = $fila->apellidoMaterno;
                $obj->rol = $fila->rol;
                $obj->correo = $fila->correo;
            }
            return $obj;
		}
		catch(Exception $e){
            var_dump($e);
            return null;
		}finally{
            Conexion::desconectar();
        }
	}

	public function getUser($id){
		try {
			$this->conectar();

			//Almacenará el registro obtenido de la BD
			$obj = null;

			$sentenciaSQL = $this->conexion->prepare("SELECT id, nombre, apellidopaterno, apellidomaterno, rol, correo, telefono
            FROM usuarios WHERE id=?");
			//CAST(password as varchar(28))=CAST(sha224(?) as varchar(28))");
			//Se ejecuta la sentencia sql con los parametros dentro del arreglo 
			$sentenciaSQL->execute([$id]);

			/*Obtiene los datos*/
			$fila = $sentenciaSQL->fetch(PDO::FETCH_OBJ);
			if ($fila) {
				$obj = new usuario();
				$obj->id = $fila->id;
				$obj->nombre = $fila->nombre;
				$obj->apellidoPaterno = $fila->apellidopaterno;
				$obj->apellidoMaterno = $fila->apellidomaterno;
				$obj->rol = $fila->rol;
				$obj->correo = $fila->correo;
				$obj->telefono = $fila->telefono;
			}
			return $obj;
		} catch (Exception $e) {
			var_dump($e);
			return null;
		} finally {
			Conexion::desconectar();
		}
	}

	public function obtenerArrendadores(){
		try {
			$this->conectar();

			$lista = array();
			/*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL = $this->conexion->prepare("SELECT id, nombre, apellidopaterno, apellidomaterno, rol, correo, telefono, estatus
					FROM usuarios WHERE rol='Arrendador'");

			//Se ejecuta la sentencia sql, retorna un cursor con todos los elementos
			$sentenciaSQL->execute();

			//$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
			$resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
			/*Podemos obtener un cursor (resultado con todos los renglones como 
				un arreglo de arreglos asociativos o un arreglo de objetos*/
			/*Se recorre el cursor para obtener los datos*/

			foreach ($resultado as $fila) {
				$obj = new usuario();
				$obj->id = $fila->id;
				$obj->nombre = $fila->nombre;
				$obj->apellidoPaterno = $fila->apellidopaterno;
				$obj->apellidoMaterno = $fila->apellidomaterno;
				$obj->rol = $fila->rol;
				$obj->correo = $fila->correo;
				$obj->telefono = $fila->telefono;
				$obj->estatus = $fila->estatus;
				//Agrega el objeto al arreglo, no necesitamos indicar un índice, usa el próximo válido
				$lista[] = $obj;
			}

			return $lista;
		} catch (PDOException $e) {
			var_dump($e);
			return null;
		} finally {
			Conexion::desconectar();
		}
	}

	public function eliminar($id){
		try {
			$this->conectar();

			$sentenciaSQL = $this->conexion->prepare("DELETE FROM usuarios WHERE id = ?");
			$resultado = $sentenciaSQL->execute(array($id));
			return $resultado;
		} catch (PDOException $e) {
			//Si quieres acceder expecíficamente al numero de error
			//se puede consultar la propiedad errorInfo
			return 0;
		} finally {
			Conexion::desconectar();
		}
	}

	public function editar(Usuario $obj){
		try {
			$sql = "UPDATE usuarios
                    SET
                    nombre = ?,
                    apellidoPaterno = ?,
                    apellidoMaterno = ?,
                    correo = ?,
                    password = sha224(?)
                    WHERE id = ?;";

			$this->conectar();

			$sentenciaSQL = $this->conexion->prepare($sql);
			$sentenciaSQL->execute(
				array(
					$obj->nombre,
					$obj->apellidoPaterno,
					$obj->apellidoMaterno,
					$obj->correo,
					$obj->password,
					$obj->telefono,
					$obj->id
				)
			);
			return true;
		} catch (PDOException $e) {
			var_dump($e);
			return false;
		} finally {
			Conexion::desconectar();
		}
	}

	public function editarRol(Usuario $obj){
		try {
			$sql = "UPDATE usuarios
                    SET
					telefono = ?,
                    rol = ?
                    WHERE correo = ?;";

			$this->conectar();

			$sentenciaSQL = $this->conexion->prepare($sql);
			$sentenciaSQL->execute(
				array(
					$obj->telefono,
					$obj->rol,
					$obj->correo
				)
			);
			return true;
		} catch (PDOException $e) {
			var_dump($e);
			return false;
		} finally {
			Conexion::desconectar();
		}
	}

	public function agregar(Usuario $obj){
		$clave = 0;
		try {
			$sql = "INSERT INTO Usuarios
                (nombre,
                apellidoPaterno,
                apellidoMaterno,
                rol,
                correo,
                password)
                VALUES
                (:nombre,
                :apellidoPaterno,
                :apellidoMaterno,
                :correo,
                sha224(:password));";
                //sha224(:contrasenia));";

			$this->conectar();
			$this->conexion->prepare($sql)
				->execute(array(
					':nombre' => $obj->nombre,
					':apellidoPaterno' => $obj->apellidoPaterno,
					':apellidoMaterno' => $obj->apellidoMaterno,
					':correo' => $obj->correo,
					':password' => $obj->password
				));

			$clave = $this->conexion->lastInsertId();
			return $clave;
		} catch (Exception $e) {
			var_dump($e);
			return $clave;
		} finally {

			/*En caso de que se necesite manejar transacciones, 
			no deberá desconectarse mientras la transacción deba 
			persistir*/

			Conexion::desconectar();
		}
	}
}    
?>    