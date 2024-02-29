<?php

class ComoSeEntero extends Controller{

    public function listarComoSeEntero(){
        $data = $this->model->getComoSeEntero();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function insert(){
        $persona = $_POST['persona'];
        $como_se_entero = $_POST['como_se_entero'];

        $data = $this->model->insertComoSeEntero($persona, $como_se_entero);

        if($data == "ok"){
            $msg = "si";
        }else{
            $msg = "Error al registrar voto";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

}

?>