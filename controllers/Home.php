<?php
class Home extends Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data['title'] = 'Iniciar Sesión';
        $this->views->View('principal','login',$data);
    }   
    // validar formulario del login
    function validar() {
        if(isset($_POST['correo']) && isset($_POST['clave'])){
            if(empty($_POST['correo'])){
                $res = array('msg' => 'CORREO REQUERIDO');
            }else if(empty($_POST['clave'])){
                $res = array('msg' => 'CONTRASEÑA REQUERIDA');
            }else{
                $correo = strClean($_POST['correo']);
                $clave = strClean($_POST['clave']);
            }
            echo json_encode($res, JSON_UNESCAPED_UNICODE);
        }
        die();
        
    }
}
?>