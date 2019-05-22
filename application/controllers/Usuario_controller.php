<?php

class Usuario_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array("Usuario_model","Session_model"));
        $this->load->library('form_validation');
        $this->load->helper(array('form', "funciones_helper"));
    }

    public function index() {
        
    }
    
    
    public function cerrar_sesion(){
        $this->Session_model->cerrar_sesion();
        redirect("Inicio");
    }

    public function login() {

        $this->load->view('plantilla', [
            "cuerpo" => $this->load->view("login", "", TRUE
            )
        ]);
    }

    public function registro() {
        
            $config = $this->validaciones();
            
        $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {

                $this->load->view('plantilla', [
                    "cuerpo" => $this->load->view("registro_alumno", 
                             ['familias' => $this->Usuario_model->get_lista_familias(),
                                 'aptitudes'=> $this->input->post('aptitudes[]')], TRUE
                    )
                ]);
      
            } else {
                
                $usuario_data = array(
                    'nombre_usuario' => $this->input->post('username'),
                    'password' => $this->input->post('pass'),
                    'tipo' => "a",
                );

                $alumno_data = array(
                    'nombre' => $this->input->post('nombre'),
                    'apellidos' => $this->input->post('apellidos'),
                    'email' => $this->input->post('email'),
                    "telefono" => $this->input->post('telefono'),
                    'dni' => $this->input->post('dni'),
                //password_hash probar antes que el sha1 y password_verify
                );

                $this->Usuario_model->registrar_usuario($usuario_data, $alumno_data,$this->input->post('aptitudes[]'));
                $this->Session_model->add_usuario_sesion($usuario_data);
                redirect("Inicio");
            }
        }
        
   
        private function validaciones(){
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
                'label' => 'Email',
                'rules' => 'required'
            ),
            array(
                'field' => 'aptitudes[]',
                'label' => 'Aptitudes',
                'rules' => 'required'
            ),
            array(
                'field' => 'familia',
                'label' => 'Departamento',
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
            return $config;
        }

}
