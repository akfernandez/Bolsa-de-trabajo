<?php

class Mantenimiento_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array("Mantenimiento_model", "Usuario_model"));
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
    }

    public function index() {
        $this->load->view('plantilla', [
            "cuerpo" => $this->load->view("crud_generico", "", TRUE
            )
        ]);
    }

    public function mantenimiento_alumnos() {

        $result = $this->Mantenimiento_model->get_alumnos();
//                $array_persona["usuario_id"] = $query->row()->id_usuario;
        $datos = array();


        foreach ($result as $key => $value) {


            $datos[] = array(
                'id' => $value["id_alumno"],
                'nombre' => $value["nombre"],
                'dni' => $value["dni"],
                'telefono' => $value["telefono"]
            );
        }


        $this->load->view('plantilla', [
            "cuerpo" => $this->load->view("crud_alumnos", ["datos" => $datos], TRUE
            )
        ]);
    }

    public function editar_ver($id, $tabla, $accion) {

        $datos = "";
        $view = "";
        switch ($tabla) {
            case "alumnos":
                $view = "registro_alumno";
                $datos = $this->Usuario_model->get_datos_alumnos_by_id($id);
                
                    $config = $this->validacionAlumnos();

                    $this->form_validation->set_rules($config);


                    if ($this->form_validation->run() == FALSE) {
                        
                        if ($this->input->post('guardar') == "guardar") {
                            $this->setearDatosPost($datos);
                        }

                        
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

                        
                        
                        $accion="ver";
                        //meter cambios en base de datos 
                        
                    
                }

                break;
            case label2:

                break;
            case label3:

                break;
        }

        $this->load->view('plantilla', [
            "cuerpo" => $this->load->view($view, ["datos" => $datos, "accion" => $accion], TRUE)
        ]);
    }

    private function setearDatosPost($datos) {



        $datos["datosUsuario"]['nombre_usuario'] = $this->input->post('username');
        $datos["datosUsuario"]['password'] = $this->input->post('pass');
        $datos["datosUsuario"]['nombre'] = $this->input->post('nombre');
        $datos["datosUsuario"]['apellidos'] = $this->input->post('apellidos');
        $datos["datosUsuario"]['email'] = $this->input->post('email');
        $datos["datosUsuario"]["telefono"] = $this->input->post('telefono');
        $datos["datosUsuario"]['dni'] = $this->input->post('dni');
        //password_hash probar antes que el sha1 y password_verify
    }

    private function validacionAlumnos() {
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
        );
        return $config;
    }

}
