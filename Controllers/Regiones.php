<?php

class Regiones extends Controller{

    public function listarRegiones(){
        $data = $this->model->getRegiones();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


}

?>