<?php 

require_once 'model/user.entidad.php';
require_once 'model/user.model.php';


class UserController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new UserModel();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/user/user.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new User();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/user/user-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){

        $alm = new User();
        
        $alm->id = $_REQUEST['id'];
        $alm->nombre = $_REQUEST['nombre'];
        $alm->direccion = $_REQUEST['direccion'];
        $alm->telefono = $_REQUEST['telefono'];
        

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
?>