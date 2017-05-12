<?php 

/*
Crear la entidad User, ya que es la data a mapear ya sea para listar o realizar 
una acción contra la base de datos (registrar/eliminar/actualizar). 
Por regla esta clase contiene como atributos las columnas de la tabla.
*/
class User
{
    private $id;
    private $nombre;
    private $direccion;
    private $telefono;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>