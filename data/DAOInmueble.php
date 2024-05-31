<?php
require_once 'conexion.php';
require_once '../model/inmueble.php';

class DAOInmueble
{
    private $conexion;
    private function conectar()
    {
        try {
            $this->conexion = Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getInmueble($id)
    {
        try {
            $this->conectar();

            // Almacenará el registro obtenido de la BD
            $obj = null;

            $sentenciaSQL = $this->conexion->prepare("SELECT * FROM inmuebles WHERE id=?");
            $sentenciaSQL->execute([$id]);

            /* Obtiene los datos */
            $fila = $sentenciaSQL->fetch(PDO::FETCH_OBJ);
            if ($fila) {
                $obj = new Inmueble(); // Usamos el modelo Inmueble
                $obj->id = $fila->id;
                $obj->arrendador = $fila->arrendador;
                $obj->nombre = $fila->nombre;
                $obj->telefono = $fila->telefono;
                $obj->precioAlquiler = $fila->precioalquiler;
                $obj->descripcion = $fila->descripcion;
                $obj->estado = $fila->estado;
                $obj->municipio = $fila->municipio;
                $obj->colonia = $fila->colonia;
                $obj->direccion = $fila->direccion;
                $obj->latitud = $fila->latitud;
                $obj->longitud = $fila->longitud;
                $obj->internet = $fila->internet;
                $obj->agua = $fila->agua;
                $obj->luz = $fila->luz;
                $obj->garage = $fila->garage;
                $obj->estatus = $fila->estatus;
            }
            return $obj;
        } catch (Exception $e) {
            var_dump($e);
            return null;
        } finally {
            Conexion::desconectar();
        }
    }

    public function getInmuebleArrendador($id_arrendador, $id)
    {
        try {
            $this->conectar();

            // Almacenará el registro obtenido de la BD
            $obj = null;

            $sentenciaSQL = $this->conexion->prepare("SELECT * FROM inmuebles WHERE id=? and arrendador = ?");
            $sentenciaSQL->execute([$id, $id_arrendador]);

            /* Obtiene los datos */
            $fila = $sentenciaSQL->fetch(PDO::FETCH_OBJ);
            if ($fila) {
                $obj = new Inmueble(); // Usamos el modelo Inmueble
                $obj->id = $fila->id;
                $obj->arrendador = $fila->arrendador;
                $obj->nombre = $fila->nombre;
                $obj->telefono = $fila->telefono;
                $obj->precioAlquiler = $fila->precioalquiler;
                $obj->descripcion = $fila->descripcion;
                $obj->estado = $fila->estado;
                $obj->municipio = $fila->municipio;
                $obj->colonia = $fila->colonia;
                $obj->direccion = $fila->direccion;
                $obj->latitud = $fila->latitud;
                $obj->longitud = $fila->longitud;
                $obj->internet = $fila->internet;
                $obj->agua = $fila->agua;
                $obj->luz = $fila->luz;
                $obj->garage = $fila->garage;
                $obj->estatus = $fila->estatus;
            }
            return $obj;
        } catch (Exception $e) {
            var_dump($e);
            return null;
        } finally {
            Conexion::desconectar();
        }
    }

    public function obtenerInmuebles()
    {
        try {
            $this->conectar();

            $lista = array();
            /* Se arma la sentencia SQL para seleccionar todos los registros de la base de datos */
            $sentenciaSQL = $this->conexion->prepare("SELECT * FROM inmuebles where estatus = 'Disponible'");

            // Se ejecuta la sentencia SQL, retorna un cursor con todos los elementos
            $sentenciaSQL->execute();

            //$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            /* Podemos obtener un cursor (resultado con todos los renglones como 
            un arreglo de arreglos asociativos o un arreglo de objetos */
            /* Se recorre el cursor para obtener los datos */

            foreach ($resultado as $fila) {
                $obj = new Inmueble(); // Usamos el modelo Inmueble
                $obj->id = $fila->id;
                $obj->arrendador = $fila->arrendador;
                $obj->nombre = $fila->nombre;
                $obj->telefono = $fila->telefono;
                $obj->precioAlquiler = $fila->precioalquiler;
                $obj->descripcion = $fila->descripcion;
                $obj->estado = $fila->estado;
                $obj->municipio = $fila->municipio;
                $obj->colonia = $fila->colonia;
                $obj->direccion = $fila->direccion;
                $obj->latitud = $fila->latitud;
                $obj->longitud = $fila->longitud;
                $obj->internet = $fila->internet;
                $obj->agua = $fila->agua;
                $obj->luz = $fila->luz;
                $obj->garage = $fila->garage;
                $obj->estatus = $fila->estatus;
                // Agrega el objeto al arreglo, no necesitamos indicar un índice, usa el próximo válido
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

    public function obtenerInmueblesArrendador($id)
    {
        try {
            $this->conectar();

            $lista = array();
            /* Se arma la sentencia SQL para seleccionar todos los registros de la base de datos */
            $sentenciaSQL = $this->conexion->prepare("SELECT * FROM inmuebles where arrendador = ?");
            // Se ejecuta la sentencia SQL, retorna un cursor con todos los elementos
            $sentenciaSQL->execute([$id]);

            //$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            /* Podemos obtener un cursor (resultado con todos los renglones como 
            un arreglo de arreglos asociativos o un arreglo de objetos */
            /* Se recorre el cursor para obtener los datos */

            foreach ($resultado as $fila) {
                $obj = new Inmueble(); // Usamos el modelo Inmueble
                $obj->id = $fila->id;
                $obj->arrendador = $fila->arrendador;
                $obj->nombre = $fila->nombre;
                $obj->telefono = $fila->telefono;
                $obj->precioAlquiler = $fila->precioalquiler;
                $obj->descripcion = $fila->descripcion;
                $obj->estado = $fila->estado;
                $obj->municipio = $fila->municipio;
                $obj->colonia = $fila->colonia;
                $obj->direccion = $fila->direccion;
                $obj->latitud = $fila->latitud;
                $obj->longitud = $fila->longitud;
                $obj->internet = $fila->internet;
                $obj->agua = $fila->agua;
                $obj->luz = $fila->luz;
                $obj->garage = $fila->garage;
                $obj->estatus = $fila->estatus;
                // Agrega el objeto al arreglo, no necesitamos indicar un índice, usa el próximo válido
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

    public function eliminar($id)
    {
        try {
            $this->conectar();

            $sentenciaSQL = $this->conexion->prepare("DELETE FROM inmuebles WHERE id = ?");
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

    public function existeInmueble($id)
    {
        try {
            $this->conectar();

            $sentenciaSQL = $this->conexion->prepare("SELECT id FROM inmuebles WHERE id=?");
            //CAST(password as varchar(28))=CAST(sha224(?) as varchar(28))");
            //Se ejecuta la sentencia sql con los parametros dentro del arreglo 
            $sentenciaSQL->execute([$id]);

            /*Obtiene los datos*/
            $fila = $sentenciaSQL->fetch(PDO::FETCH_OBJ);
            // Si hay una fila, significa que el correo existe
            if ($fila !== false) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            var_dump($e);
            return false;
        } finally {
            Conexion::desconectar();
        }
    }

    public function editar(Inmueble $obj)
    {
        try {
            $sql = "UPDATE inmuebles
                SET
                nombre = ?,
                telefono = ?,
                precioalquiler = ?,
                descripcion = ?,
                estado = ?,
                municipio = ?,
                colonia = ?,
                direccion = ?,
                latitud = ?,
                longitud = ?,
                internet = ?,
                agua = ?,
                luz = ?,
                garage = ?,
                estatus = ?
                WHERE id = ?";

            $this->conectar();

            $sentenciaSQL = $this->conexion->prepare($sql);
            $sentenciaSQL->execute(
                array(
                    $obj->nombre,
                    $obj->telefono,
                    $obj->precioAlquiler,
                    $obj->descripcion,
                    $obj->estado,
                    $obj->municipio,
                    $obj->colonia,
                    $obj->direccion,
                    $obj->latitud,
                    $obj->longitud,
                    $obj->internet ? 1 : 0,
                    $obj->agua ? 1 : 0,
                    $obj->luz ? 1 : 0,
                    $obj->garage ? 1 : 0,
                    $obj->estatus,
                    $obj->id
                )
            );
            return true;
        } catch (PDOException $e) {
            echo "<pre>";
            var_dump($obj);
            var_dump($e);
            echo "</pre>";
            return false;
        } finally {
            Conexion::desconectar();
        }
    }


    public function agregar(Inmueble $obj)
    {
        $clave = 0;
        try {
            $sql = "INSERT INTO inmuebles
                (arrendador,
                nombre,
                telefono,
                precioalquiler,
                descripcion,
                estado,
                municipio,
                colonia,
                direccion,
                latitud,
                longitud,
                internet,
                agua,
                luz,
                garage,
                estatus)
                VALUES
                (:arrendador,
                :nombre,
                :telefono,
                :precioalquiler,
                :descripcion,
                :estado,
                :municipio,
                :colonia,
                :direccion,
                :latitud,
                :longitud,
                :internet,
                :agua,
                :luz,
                :garage,
                :estatus)";

            $this->conectar();
            $this->conexion->prepare($sql)
                ->execute(array(
                    ':arrendador' => $obj->arrendador,
                    ':nombre' => $obj->nombre,
                    ':telefono' => $obj->telefono,
                    ':precioalquiler' => $obj->precioAlquiler,
                    ':descripcion' => $obj->descripcion,
                    ':estado' => $obj->estado,
                    ':municipio' => $obj->municipio,
                    ':colonia' => $obj->colonia,
                    ':direccion' => $obj->direccion,
                    ':latitud' => $obj->latitud,
                    ':longitud' => $obj->longitud,
                    ':internet' => $obj->internet ? 1 : 0,
                    ':agua' => $obj->agua ? 1 : 0,
                    ':luz' => $obj->luz ? 1 : 0,
                    ':garage' => $obj->garage ? 1 : 0,
                    ':estatus' => $obj->estatus
                ));

            $clave = $this->conexion->lastInsertId();
            return $clave;
        } catch (PDOException $e) {
            var_dump($e);
            return $clave;
        } finally {
            /* En caso de que se necesite manejar transacciones, 
           no deberá desconectarse mientras la transacción deba 
           persistir */
            Conexion::desconectar();
        }
    }
}
