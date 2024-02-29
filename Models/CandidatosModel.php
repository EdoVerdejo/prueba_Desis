<?php
class CandidatosModel extends Query{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCandidatos()
    {
        $sql = "CALL sp_listar_candidatos()";
        $data = $this->selectAll($sql);
        return $data;
    }

}   

?>