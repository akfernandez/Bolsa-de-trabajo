<?php

class Inicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('grocery_CRUD');
        // $this->load->helper('url_helper'); lo declaro en config autoload ¡¡NO TE OLVIDES QUE ERES SUBNORMAL!!
    }

    public function index() {

        $this->load->view('plantilla', [
            "cuerpo" => $this->load->view("portada", "", TRUE
            )
        ]);
    }

    function a() {
        $output = $this->grocery_crud->render();
        $this->load->view('example.php',(array)$output);
        $this->_example_output($output);
    }

}
