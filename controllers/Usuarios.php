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
        $this->views->getView('usuarios', 'index', $data);
    }
    public function listar()
    {
        $data = $this->model->getUsuarios(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['rol'] = '<span class="badge bg-info">VENDEDOR</span>';
            if ($data[$i]['rol'] == 1) {
                $data[$i]['rol'] = '<span class="badge bg-success">ADMINISTRADOR</span>';
            }
            $data[$i]['acciones'] = '';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
