<?php

class Usuario_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array("Usuario_model", "Session_model"));
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
    }

    public function index() {
        
    }

    public function cerrar_sesion() {
        $this->Session_model->cerrar_sesion();
        redirect("Inicio");
    }

    public function login() {

        $config = $this->validacionesInicioSesion();

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {


            $this->load->view('plantilla', [
                "cuerpo" => $this->load->view("login", "", TRUE
                )
            ]);
        } else {

            if ($this->Session_model->inicioSesion($this->input->post('username'), $this->input->post('pass'))) {
                redirect("inicio");
            } else {
                $this->load->view('plantilla', [
                    "cuerpo" => $this->load->view("login", "", TRUE
                    )
                ]);
            }
        }
    }

    public function registro() {

        $config = $this->validacionesRegistro();

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {

            $datos = $this->Usuario_model->get_datos_alumnos_by_id(0);

            
            $datos = $this->setearDatosPost($datos);


            //var_dump(get_object_vars(json_decode($this->input->post('aptitudes'))));
            $this->load->view('plantilla', [
                "cuerpo" => $this->load->view("registro_alumno", ['familias' => $this->Usuario_model->get_lista_familias(),
                    'datos' => $datos, 'accion'=>""], TRUE
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

            $aptitudes = json_decode($this->input->post('aptitudes'));

            $this->Usuario_model->registrar_usuario($usuario_data, $alumno_data, $aptitudes);
            $this->Session_model->add_usuario_sesion($usuario_data);
            redirect("inicio");
        }
    }

    private function setearDatosPost($datos) {

        $datos['datosUsuario']['nombre_usuario'] = $this->input->post('username');
        $datos['datosUsuario']['password'] = $this->input->post('pass');
        $datos['datosUsuario']['nombre'] = $this->input->post('nombre');
        $datos['datosUsuario']['apellidos'] = $this->input->post('apellidos');
        $datos['datosUsuario']['email'] = $this->input->post('email');
        $datos['datosUsuario']['telefono'] = $this->input->post('telefono');
        $datos['datosUsuario']['dni'] = $this->input->post('dni');
        if ($this->input->post('aptitudes') != "") {
            $datos['aptitudes'] = $this->input->post('aptitudes');
        }
        //password_hash probar antes que el sha1 y password_verify

        return $datos;
    }

    private function validacionesInicioSesion() {
        $config = array(
            array(
                'field' => 'username',
                'label' => 'Nombre usuario',
                'rules' => 'required'
            ),
            array(
                'field' => 'pass',
                'label' => 'Contraseña',
                'rules' => 'required'
            )
        );
        return $config;
    }

    private function validacionesRegistro() {
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
        return $config;
    }

}
