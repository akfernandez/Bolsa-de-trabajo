<?php

class Empresa_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array("Empresa_model", "Session_model"));
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
    }

    public function index() {
        
    }


    public function crud_empresa() {
        $result = $this->Empresa_model->get_empresas();
//                $array_persona["usuario_id"] = $query->row()->id_usuario;
        $datos = array();


        foreach ($result as $key => $value) {


            $datos[] = array(
                'id' => $value["id_empresa"],
                'razon_social' => $value["razon_social"],
                'cif' => $value["cif"],
                'email' => $value["email"],
                'telefono_contacto' => $value["telefono_contacto"]
            );
        }


        $this->load->view('plantilla', [
            "cuerpo" => $this->load->view("crud_empresas", ["datos" => $datos], TRUE
            )
        ]);
    }

    public function mantenimientoEmpresa($accion, $id = 0) {


        $config = $this->validacionesEmpresa();

        $this->form_validation->set_rules($config);
        
        if ($this->form_validation->run() == FALSE && $accion != "borrar") {

            $datos = $this->Empresa_model->get_datos_empresa_by_id($id);
            
            if ($this->input->post('guardar') == "guardar") {
                $datos = $this->setearDatosPost($datos);
            }
            
            

            //var_dump(get_object_vars(json_decode($this->input->post('aptitudes'))));
            $this->load->view('plantilla', [
                "cuerpo" => $this->load->view("formulario_empresa", [
                    'datos' => $datos, 'accion' => $accion], TRUE
                )
            ]);
        } else {

            $usuario_data = array(
                'nombre_usuario' => $this->input->post('username'),
                'password' => $this->input->post('pass'),
                'tipo' => "e",
            );

            $empresa_data = array(
                'razon_social' => $this->input->post('razon_social'),
                'telefono_contacto' => $this->input->post('telefono_contacto'),
                'email' => $this->input->post('email'),
                "nombre_recursos_humanos" => $this->input->post('nombre_recursos_humanos'),
                'cif' => $this->input->post('cif'),
                'direccion' => $this->input->post('direccion'),
                    //password_hash probar antes que el sha1 y password_verify
            );

           

            switch ($accion) {
                
                case "crear":

                    $this->crear($usuario_data, $empresa_data);
                    
                    redirect("Empresa_controller/crud_empresa");
                    break;

                case "editar":
                    $this->editar($id, $usuario_data, $empresa_data);

                    redirect("Empresa_controller/mantenimientoEmpresa/ver/" . $id);

                    break;

                case "borrar":
                    $this->borrar($id);

                    redirect("Empresa_controller/crud_empresa");

                    break;
            }
        }
    }

    public function editar($id, $usuario_data, $empresa_data) {
        $this->Empresa_model->modificarEmpresa($id, $usuario_data, $empresa_data);
    }

    public function borrar($id) {
        $this->Empresa_model->borrar_empresa($id);
    }

    public function crear($usuario_data, $empresa_data) {
        $this->Empresa_model->crear_empresa($usuario_data, $empresa_data);
    }

    private function setearDatosPost($datos) {
        
        $datos['datosUsuario']['nombre_usuario'] = $this->input->post('username');
        $datos['datosUsuario']['password'] = $this->input->post('pass');
        $datos['datosUsuario']['razon_social'] = $this->input->post('razon_social');
        $datos['datosUsuario']['telefono_contacto'] = $this->input->post('telefono_contacto');
        $datos['datosUsuario']['email'] = $this->input->post('email');
        $datos['datosUsuario']['nombre_recursos_humanos'] = $this->input->post('nombre_recursos_humanos');
        $datos['datosUsuario']['email'] = $this->input->post('email');
        $datos['datosUsuario']['cif'] = $this->input->post('cif');
        $datos['datosUsuario']['direccion'] = $this->input->post('direccion');

        //password_hash probar antes que el sha1 y password_verify

        return $datos;
    }

    private function validacionesEmpresa() {
        $config = array(
            array(
                'field' => 'razon_social',
                'label' => 'Razon Social',
                'rules' => 'required'
            ),
            array(
                'field' => 'telefono_contacto',
                'label' => 'Telefono Contacto',
                'rules' => 'required'
            ),
            array(
                'field' => 'cif',
                'label' => 'CIF',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'nombre_recursos_humanos',
                'label' => 'Nombre Recursos Humanos',
                'rules' => 'required'
            ),
            array(
                'field' => 'direccion',
                'label' => 'Dirección',
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
