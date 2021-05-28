
<?php 

class  Conexion{
    private static $db_host ="localhost";
    private static $db_user = "root";
    private static $db_pass = "";
    protected $db_name = "valluno";//valluno 
    public $conexion;
    public function abrir_conexion(){
     $this->conexion =  new mysqli(self::$db_host, self::$db_user, self::$db_pass, $this->db_name);
     return $this->conexion;
    }

	public function cerrar_conexion() {
        $this->conexion->close();
    }
  
    /*protected function consultar();
    abstract protected function nuevo();
    abstract protected function editar();
    abstract protected function borrar();
    abstract protected function lista();*/

}