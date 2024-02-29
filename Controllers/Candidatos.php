<?php

class Candidatos extends Controller{

    public function listarCandidatos(){
        $data = $this->model->getCandidatos();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


}

?>