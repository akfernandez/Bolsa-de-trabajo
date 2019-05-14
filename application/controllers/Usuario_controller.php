<?php

class Usuario_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Usuario_model");
        $this->load->library('form_validation');
    }

    public function index() {
        
    }

    public function login() {

        $this->load->view('plantilla', [
            "cuerpo" => $this->load->view("login", "", TRUE
            )
        ]);
    }

    public function registro() {
        $config = array(
            array(
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'apellidos',
                'label' => 'Apellidos',
                'rules' => 'required'
            ),
            
             array(
                'field' => 'dni',
                'label' => 'DNI',
                'rules' => 'required'
            ),
            
             array(
                'field' => 'telefono',
                'label' => 'Telefono',
                'rules' => 'required'
            ),
            
             array(
                'field' => 'email',
                'label' => 'Direccion email',
                'rules' => 'required'
            ),
            
             array(
                'field' => 'aptitudes',
                'label' => 'Aptitudes',
                'rules' => 'required'
            ),
            
             array(
                'field' => 'username',
                'label' => 'Nombre usuario',
                'rules' => 'required'
            ),
            
             array(
                'field' => 'pass',
                'label' => 'Contraseña',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('plantilla', [
                "cuerpo" => $this->load->view("register", "", TRUE
                )
            ]);
        }
        else{
            $usuario_data = array(
                'nombre_usuario' => $this->input->post('username'),
                'password' => $this->input->post('pass'),
                'tipo' => "a",
 
            );
            
            $alumno_data= array(
                'nombre' => $this->input->post('nombre'),
                'apellidos' => $this->input->post('apellidos'),
                'email' => $this->input->post('email'),
                "telefono"=>$this->input->post('telefono'),
                'dni' => $this->input->post('dni'),
                'aptitudes' => $this->input->post('aptitudes'),
                //password_hash probar antes que el sha1 y password_verify
            );

            $this->Usuario_model->registrar_usuario($usuario_data, $alumno_data);
//            redirect("Inicio");
        }
    }

}
