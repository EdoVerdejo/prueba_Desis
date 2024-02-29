<?php

class Personas extends Controller{
    public function index(){
        print_r($this->model->getPersonas());
    }

    public function buscarRut(){
        $rut = $_POST["rut"];
        $data = $this->model->getPersonaByRut($rut);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function insert(){
        $nombreApellido = $_POST['nombreApellido'];
        $alias = $_POST['alias'];
        $rut = $_POST['rut'];
        $email = $_POST['inputEmail'];
        $region = $_POST['inputRegion'];
        $comuna = $_POST['inputComuna'];
        $candidato = $_POST['inputCandidato'];

        if(empty($nombreApellido) || empty($alias) || empty($rut) || empty($email) || empty($region)){
            $msg = "Todos los campos son obligatorios";
        }else{
            $data = $this->model->insertPersonas($nombreApellido, $alias, $rut, $email, $region, $comuna, $candidato);

            if($data == "ok"){
                $msg = "si";
            }else{
                $msg = "Error al registrar voto";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
}

?>