<?php
class Usuarios extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        // print_r($_SESSION);
        $data['title'] = 'Usuarios';
        $data['script'] = 'usuarios.js';
        $this->views->getView('usuarios', 'index', $data);
    }
    public function listar()
    {
        $data = $this->model->getUsuarios(1);
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['rol'] == 1) {
                $data[$i]['rol'] = '<span class="badge bg-success">ADMINISTRADOR</span>';
            }else{
                $data[$i]['rol'] = '<span class="badge bg-info">VENDEDOR</span>';
            }
            $data[$i]['acciones'] = '';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    // metodo para registrar
    public function registrar() 
    {
        if(isset($_POST)){
            // print_r($_POST); exit;
            if(empty($_POST['nombres'])){
                $res = array('msg' => 'EL NOMBRE ES REQUERIDO', 'type' => 'warning');
            }else if(empty($_POST['apellidos'])){
                $res = array('msg' => 'EL APELLIDO ES REQUERIDO', 'type' => 'warning');
            }else if(empty($_POST['correo'])){
                $res = array('msg' => 'EL CORREO ES REQUERIDO', 'type' => 'warning');
            }else if(empty($_POST['telefono'])){
                $res = array('msg' => 'EL TELÉFONO ES REQUERIDO', 'type' => 'warning');
            }else if(empty($_POST['direccion'])){
                $res = array('msg' => 'LA DIRECCIÓN ES REQUERIDO', 'type' => 'warning');
            }else if(empty($_POST['clave'])){
                $res = array('msg' => 'LA CLAVE ES REQUERIDO', 'type' => 'warning');
            }else if(empty($_POST['rol'])){
                $res = array('msg' => 'EL ROL ES REQUERIDO', 'type' => 'warning');
            }else{

            }
        }else{
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');    
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}
