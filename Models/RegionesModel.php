<?php
class RegionesModel extends Query{

    public function __construct()
    {
        parent::__construct();
    }

    public function getRegiones()
    {
        $sql = "CALL sp_listar_regiones()";
        $data = $this->selectAll($sql);
        return $data;
    }

}   

?>