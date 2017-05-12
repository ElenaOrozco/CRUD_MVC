<?php 
/*
Creamos una clase que contenga la lógica de negocio que nos permita acceder 
a la base de datos. Esta la conoceremos como nuestro modelo de acceso a datos.

Nuestro constructor se encarga de inicializar la cadena de conexión hacia MySQL y esta instancia es guardado en la variable $pdo del tipo private. De esta manera en cada método de mi clase puedo hacer referencia a la instancia de conexión a MySQL.

Los "?", lo usamos como comodines para escapar parametros. De esta forma evitamos concatenar nuestra consulta sql dejandolo propenso a un ataque sql conocido como "SQL Injection". 

Utilizamos try/catch para detectar errores en tiempo de ejecución.
*/

class UserModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=ejemplo_isop', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM user");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new User();

                $alm->__SET('id', $r->id);
                $alm->__SET('nombre', $r->nombre);
                $alm->__SET('direccion', $r->direccion);
                $alm->__SET('telefono', $r->telefono);
                
                

                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM user WHERE id = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new User();

            $alm->__SET('id', $r->id);
            $alm->__SET('nombre', $r->nombre);
            $alm->__SET('direccion', $r->direccion);
            $alm->__SET('telefono', $r->telefono);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM user WHERE id = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(User $data)
    {
        try 
        {

            $sql = "UPDATE user SET 
                        nombre          = ?, 
                        direccion       = ?,
                        telefono        = ?
                    WHERE id = ?";
            /* Recordar que para que funcione hay q ponerlos en el mismo orden*/
            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('nombre'), 
                    $data->__GET('direccion'), 
                    $data->__GET('telefono'),
                    $data->__GET('id')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(User $data)
    {
        try 
        {
        	

        $sql = "INSERT INTO user (id,nombre,direccion, telefono) 
                VALUES (?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
            	$data->__GET('id'),
                $data->__GET('nombre'), 
                $data->__GET('direccion'), 
                $data->__GET('telefono')
                )
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>