<?php
class PersonasModel extends Query{

    private $nombreYApellido, $alias, $rut, $email, $region, $comuna, $candidato;
    public function __construct()
    {
        parent::__construct();
    }

    public function getPersonas()
    {
        $sql = "SELECT * FROM personas";
        $data = $this->select($sql);
        return $data;
    }

    public function getPersonaByRut($rut)
    {
        $sql = "CALL sp_personaRut('".$rut."')";
        $datos = array($this->rut);
        $data = $this->select($sql);
        return $data;
    }

    public function insertPersonas(string $nombreYApellido, string $alias, string $rut, string $email, int $region, int $comuna, int $candidato){
        $this->nombreYApellido = $nombreYApellido;
        $this->alias = $alias;
        $this->rut = $rut;
        $this->email = $email;
        $this->region = $region;
        $this->comuna = $comuna;
        $this->candidato = $candidato;

        $sql = "CALL sp_registrarPersona(?,?,?,?,?,?,?)";
        $datos = array($this->nombreYApellido, $this->alias, $this->rut, $this->email, $this->region, $this->comuna, $this->candidato);
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