<?php
//importa la clase conexión y el modelo para usarlos
require_once 'conexion.php'; 

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
    
    public function login($correo,$password)
	{
		try
		{ 
            $this->conectar();
            
            //Almacenará el registro obtenido de la BD
			$obj = null; 
            
			$sentenciaSQL = $this->conexion->prepare("SELECT id,nombre,apellidos,rol,correo 
            FROM usuarios WHERE correo=? AND password=?");
            //CAST(password as varchar(28))=CAST(sha224(?) as varchar(28))");
			//Se ejecuta la sentencia sql con los parametros dentro del arreglo 
            $sentenciaSQL->execute([$correo,$password]);
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			if($fila){
                $obj = new Usuario();
                $obj->id = $fila->id;
                $obj->nombre = $fila->nombre;
                $obj->apellidos = $fila->apellidos;
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
    
	/*public function obtenerTodos()
	{
		try
		{
            $this->conectar();
            
			$lista = array();
			$sentenciaSQL = $this->conexion->prepare("SELECT id,nombre,apellido1,apellido2,email,genero FROM Usuarios");
			
            //Se ejecuta la sentencia sql, retorna un cursor con todos los elementos
			$sentenciaSQL->execute();
            
            //$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            /*Podemos obtener un cursor (resultado con todos los renglones como 
            un arreglo de arreglos asociativos o un arreglo de objetos*/
            /*Se recorre el cursor para obtener los datos*/
			
            /*foreach($resultado as $fila)
			{
				$obj = new Usuario();
                $obj->id = $fila->id;
	            $obj->nombre = $fila->nombre;
	            $obj->apellido1 = $fila->apellido1;
                $obj->apellido2 = $fila->apellido2;
	            $obj->email = $fila->email;
	            $obj->genero = $fila->genero;
				//Agrega el objeto al arreglo, no necesitamos indicar un índice, usa el próximo válido
                $lista[] = $obj;
			}
            
			return $lista;
		}
		catch(PDOException $e){
			return null;
		}finally{
            Conexion::desconectar();
        }
	}*/
}    
?>    