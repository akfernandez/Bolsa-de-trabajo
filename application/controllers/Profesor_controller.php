<?php

class Profesor_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array("Profesor_model", "Session_model"));
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
    }

    public function index() {
        
    }


    public function crud_profesor() {
        $result = $this->Profesor_model->get_profesores_familia();
//                $array_persona["usuario_id"] = $query->row()->id_usuario;
        $datos = array();


        foreach ($result as $key => $value) {


            $datos[] = array(
                'id' => $value["id_profesor"],
                'nombre' => $value["nombre"],
                'dni' => $value["dni"],
                'email' => $value["email"],
                'familia' => $value["familia"]
            );
        }


        $this->load->view('plantilla', [
            "cuerpo" => $this->load->view("crud_profesores", ["datos" => $datos], TRUE
            )
        ]);
    }

    public function mantenimientoProfesor($accion, $id = 0) {


        $config = $this->validacionesProfesor();

        $this->form_validation->set_rules($config);
        
        if ($this->form_validation->run() == FALSE && $accion != "borrar") {

            $datos = $this->Profesor_model->get_datos_profesor_by_id($id);
            
            if ($this->input->post('guardar') == "guardar") {
                $datos = $this->setearDatosPost($datos);
            }
            
            

            //var_dump(get_object_vars(json_decode($this->input->post('aptitudes'))));
            $this->load->view('plantilla', [
                "cuerpo" => $this->load->view("formulario_profesor", [
                    'datos' => $datos, 'accion' => $accion], TRUE
                )
            ]);
        } else {

            $usuario_data = array(
                'nombre_usuario' => $this->input->post('username'),
                'password' => $this->input->post('pass'),
                'tipo' => "p",
            );

            $profesor_data = array(
                'nombre' => $this->input->post('nombre'),
                'apellidos' => $this->input->post('apellidos'),
                'email' => $this->input->post('email'),
                "familia_id" => $this->input->post('familia'),
                'dni' => $this->input->post('dni'),
                    //password_hash probar antes que el sha1 y password_verify
            );

           

            switch ($accion) {
                
                case "crear":

                    $this->crear($usuario_data, $profesor_data);
                    
                    redirect("Profesor_controller/crud_profesor");
                    break;

                case "editar":
                    $this->editar($id, $usuario_data, $profesor_data);

                    redirect("Profesor_controller/mantenimientoProfesor/ver/" . $id);

                    break;

                case "borrar":
                    $this->borrar($id);

                    redirect("Profesor_controller/crud_profesor");

                    break;
            }
        }
    }

    public function editar($id, $usuario_data, $profesor_data) {
        $this->Profesor_model->modificarprofesor($id, $usuario_data, $profesor_data);
    }

    public function borrar($id) {
        $this->Profesor_model->borrar_profesor($id);
    }

    public function crear($usuario_data, $profesor_data) {
        $this->Profesor_model->crear_profesor($usuario_data, $profesor_data);
    }

    private function setearDatosPost($datos) {

        $datos['datosUsuario']['nombre_usuario'] = $this->input->post('username');
        $datos['datosUsuario']['password'] = $this->input->post('pass');
        $datos['datosUsuario']['nombre'] = $this->input->post('nombre');
        $datos['datosUsuario']['apellidos'] = $this->input->post('apellidos');
        $datos['datosUsuario']['email'] = $this->input->post('email');
        $datos['datosUsuario']['familia_id'] = $this->input->post('familia');
        $datos['datosUsuario']['dni'] = $this->input->post('dni');

        //password_hash probar antes que el sha1 y password_verify

        return $datos;
    }

    private function validacionesProfesor() {
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
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'familia',
                'label' => 'Departamento',
                'rules' => 'required'
            ),
            array(
                'field' => 'username',
                'label' => 'Nombre Usuario',
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
