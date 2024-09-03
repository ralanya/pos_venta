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
            } else {
                $data[$i]['rol'] = '<span class="badge bg-info">VENDEDOR</span>';
            }
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-danger" type="button" onclick="eliminarUsuario('.$data[$i]['id'].')"><i class="fas fa-times-circle"></i></button>                
            </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    // metodo para registrar
    public function registrar()
    {
        if (isset($_POST)) {
            // print_r($_POST); exit;
            if (empty($_POST['nombres'])) {
                $res = array('msg' => 'EL NOMBRE ES REQUERIDO', 'type' => 'warning');
            } else if (empty($_POST['apellidos'])) {
                $res = array('msg' => 'EL APELLIDO ES REQUERIDO', 'type' => 'warning');
            } else if (empty($_POST['correo'])) {
                $res = array('msg' => 'EL CORREO ES REQUERIDO', 'type' => 'warning');
            } else if (empty($_POST['telefono'])) {
                $res = array('msg' => 'EL TELÉFONO ES REQUERIDO', 'type' => 'warning');
            } else if (empty($_POST['direccion'])) {
                $res = array('msg' => 'LA DIRECCIÓN ES REQUERIDO', 'type' => 'warning');
            } else if (empty($_POST['clave'])) {
                $res = array('msg' => 'LA CLAVE ES REQUERIDO', 'type' => 'warning');
            } else if (empty($_POST['rol'])) {
                $res = array('msg' => 'EL ROL ES REQUERIDO', 'type' => 'warning');
            } else {
                $nombres = strClean($_POST['nombres']);
                $apellidos = strClean($_POST['apellidos']);
                $correo = strClean($_POST['correo']);
                $telefono = strClean($_POST['telefono']);
                $direccion = strClean($_POST['direccion']);
                $clave = strClean($_POST['clave']);
                $hash = password_hash($clave, PASSWORD_DEFAULT);
                $rol = strClean($_POST['rol']);
                // verificar si existe los datos
                $verificarCorreo = $this->model->getValidar('correo', $correo);
                if (empty($verificarCorreo)) {
                    $verificarTel = $this->model->getValidar('telefono', $telefono);
                    if (empty($verificarTel)) {
                        $data = $this->model->registrar($nombres, $apellidos, $correo, $telefono, $direccion, $hash, $rol);
                        if ($data > 0) {
                            $res = array('msg' => 'USUARIO REGISTRADO', 'type' => 'success');
                        } else {
                            $res = array('msg' => 'ERROR AL REGISTRAR', 'type' => 'error');
                        }
                    } else {
                        $res = array('msg' => 'EL TELÉFONO DEBE SER ÚNICO', 'type' => 'warning');
                    }
                } else {
                    $res = array('msg' => 'EL CORREO DEBE SER ÚNICO', 'type' => 'warning');
                }
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
    // metodo para eliminar
    public function eliminar($id) {
        if(isset($_GET)){
            if(is_numeric($id)){
                $data = $this->model->eliminar(0,$id);
                if ($data == 1) {
                    $res = array('msg' => 'USUARIO DADO DE BAJA', 'type' => 'success');
                } else {
                    $res = array('msg' => 'ERROR AL ELIMINAR', 'type' => 'error');
                }                
            }else{
                $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
            }
        }else{
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }  
}
