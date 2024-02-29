<?php
class ComunasModel extends Query{

    public function __construct()
    {
        parent::__construct();
    }

    public function getComunas($region)
    {
        $sql = "CALL sp_listar_comunas(".$region.")";
        $data = $this->selectAll($sql);
        return $data;
    }

}   

?>