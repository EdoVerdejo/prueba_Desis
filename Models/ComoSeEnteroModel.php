<?php
class ComoSeEnteroModel extends Query{

    private $persona, $como_ent;
    public function __construct()
    {
        parent::__construct();
    }

    public function getComoSeEntero()
    {
        $sql = "CALL sp_listar_como_se_entero()";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function insertComoSeEntero(int $persona, int $como_ent){
        $this->persona = $persona;
        $this->como_ent = $como_ent;

        $sql = "CALL sp_insertar_como_se_entero(?,?)";
        $datos = array($this->persona, $this->como_ent);
        $data = $this->save($sql, $datos);

        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }

}   

?>