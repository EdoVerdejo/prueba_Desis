<?php

class Comunas extends Controller{

    public function listarComunas(){
        $region = $_POST["region"];
        $data = $this->model->getComunas($region);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


}

?>