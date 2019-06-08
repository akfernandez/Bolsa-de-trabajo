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
    
    public function cargarAptitudes() {

        echo $this->Usuario_model->get_aptitudes();
       
    }
    
    
    public function cargarAptitudesChecked(){
        
        echo $this->Usuario_model->getAptitudesChecked($this->input->post("id"));
    }


}
