<?php

class Ajax_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Usuario_model");
    }

    public function index() {
        
    }

    public function cargarAptitudesSegunFamilia() {

        echo $this->Usuario_model->cambiarAptitudes($this->input->post("id_familia"));
       
    }


}
