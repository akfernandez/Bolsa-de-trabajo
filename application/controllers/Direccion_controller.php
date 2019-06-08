<?php

class Direccion_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array("Direccion_model", "Session_model"));
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
    }

    public function index() {
        
    }


    public function crud_direccion() {
        $result = $this->Direccion_model->get_direccion();
//                $array_persona["usuario_id"] = $query->row()->id_usuario;
        $datos = array();


        foreach ($result as $key => $value) {


            $datos[] = array(
                'id' => $value["id_direccion"],
                'nombre' => $value["nombre"],
                'dni' => $value["dni"],
                'email' => $value["email"],
                'cargo' => $value["cargo"]
            );
        }


        $this->load->view('plantilla', [
            "cuerpo" => $this->load->view("crud_direccion", ["datos" => $datos], TRUE
            )
        ]);
    }

    public function mantenimientoDireccion($accion, $id = 0) {


        $config = $this->validacionesDireccion();

        $this->form_validation->set_rules($config);
        
        if ($this->form_validation->run() == FALSE && $accion != "borrar") {

            $datos = $this->Direccion_model->get_datos_direccion_by_id($id);
            
            if ($this->input->post('guardar') == "guardar") {
                $datos = $this->setearDatosPost($datos);
            }
            
            

            //var_dump(get_object_vars(json_decode($this->input->post('aptitudes'))));
            $this->load->view('plantilla', [
                "cuerpo" => $this->load->view("formulario_direccion", [
                    'datos' => $datos, 'accion' => $accion], TRUE
                )
            ]);
        } else {

            $usuario_data = array(
                'nombre_usuario' => $this->input->post('username'),
                'password' => $this->input->post('pass'),
                'tipo' => "d",
            );

            $direccion_data = array(
                'nombre' => $this->input->post('nombre'),
                'apellidos' => $this->input->post('apellidos'),
                'email' => $this->input->post('email'),
                "telefono" => $this->input->post('telefono'),
                'dni' => $this->input->post('dni'),
                'cargo' => $this->input->post('cargo'),
                
                    //password_hash probar antes que el sha1 y password_verify
            );

           

            switch ($accion) {
                
                case "crear":

                    $this->crear($usuario_data, $direccion_data);
                    
                    redirect("Direccion_controller/crud_direccion");
                    break;

                case "editar":
                    $this->editar($id, $usuario_data, $direccion_data);

                    redirect("Direccion_controller/mantenimientoDireccion/ver/" . $id);

                    break;

                case "borrar":
                    $this->borrar($id);

                    redirect("Direccion_controller/crud_direccion");

                    break;
            }
        }
    }

    public function editar($id, $usuario_data, $direccion_data) {
        $this->Direccion_model->modificarDireccion($id, $usuario_data, $direccion_data);
    }

    public function borrar($id) {
        $this->Direccion_model->borrar_direccion($id);
    }

    public function crear($usuario_data, $direccion_data) {
        $this->Direccion_model->crear_direccion($usuario_data, $direccion_data);
    }

    private function setearDatosPost($datos) {

        $datos['datosUsuario']['nombre_usuario'] = $this->input->post('username');
        $datos['datosUsuario']['password'] = $this->input->post('pass');
        $datos['datosUsuario']['nombre'] = $this->input->post('nombre');
        $datos['datosUsuario']['apellidos'] = $this->input->post('apellidos');
        $datos['datosUsuario']['email'] = $this->input->post('email');
        $datos['datosUsuario']['telefono'] = $this->input->post('telefono');
        $datos['datosUsuario']['cargo'] = $this->input->post('cargo');
        $datos['datosUsuario']['dni'] = $this->input->post('dni');

        //password_hash probar antes que el sha1 y password_verify

        return $datos;
    }

    private function validacionesDireccion() {
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
                'field' => 'cargo',
                'label' => 'Cargo',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'cargo',
                'label' => 'Cargo',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'telefono',
                'label' => 'Teléfono',
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
