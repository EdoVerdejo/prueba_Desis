<?php
class Conexion{
    private $conect;

    public function __construct()
    {
        $host = "";
        $user = "";
        $pass = "";
        $db   = "";
        $charset = "";

        $arrIni = parse_ini_file("PruebaDesis.INI",true);

        foreach ($arrIni as $key => $val){
            if($key == 'vl_host'){
                $host = $val;
            }
            if($key == 'vl_user'){
                $user  = $val;
            }
            if($key == 'vl_pass'){
                $pass = $val;
            }
            if($key == 'vl_db'){
                $db = $val;
            }
            if($key == 'vl_charset'){
                $charset = $val;
            }
        }
        $pdo = "mysql:host=".$host.";dbname=".$db.";.charset.";
        try {
            $this->conect = new PDO($pdo, $user, $pass);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de la conexión ".$e.getMessage();
        }
    }

    public function conect(){
        return $this->conect;
    }
}
?>