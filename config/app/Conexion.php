<?php
class Conexion{
    private $connect;
    public function __construct() {
        $pdo  = "mysql:host=" . HOST . '; dbname=' . DBNAME . ';' . CHARSET;
        try {
            $this->connect = new PDO($pdo,USER, PASS);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo 'conectado';
        } catch (PDOException $e) {
            echo 'Error en la conexión: ' . $e->getMessage();
        }
    }
    public function conectar() {
        return $this->connect;
    }
}
?>