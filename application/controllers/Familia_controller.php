<?php

class Familia_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array("Familia_model", "Session_model"));
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
    }

    public function index() {
        
    }


    public function crud_familia() {
        $result = $this->Familia_model->get_familias();
//                $array_persona["usuario_id"] = $query->row()->id_usuario;
        $datos = array();


        foreach ($result as $key => $value) {


            $datos[] = array(
                'id' => $value["id_familia"],
                'familia' => $value["familia"],
                
            );
        }


        $this->load->view('plantilla', [
            "cuerpo" => $this->load->view("crud_familias", ["datos" => $datos], TRUE
            )
        ]);
    }

    public function mantenimientoFamilia($accion, $id = 0) {


        $config = $this->validacionesFamilia();

        $this->form_validation->set_rules($config);
        
        if ($this->form_validation->run() == FALSE && $accion != "borrar") {

            $datos = $this->Familia_model->get_datos_familia_by_id($id);
            
            if ($this->input->post('guardar') == "guardar") {
                $datos = $this->setearDatosPost($datos);
            }
            
            

            //var_dump(get_object_vars(json_decode($this->input->post('aptitudes'))));
            $this->load->view('plantilla', [
                "cuerpo" => $this->load->view("formulario_familia", [
                    'datos' => $datos, 'accion' => $accion], TRUE
                )
            ]);
        } else {


            $familia_data = array(
                'familia' => $this->input->post('familia'),
                
                
                    //password_hash probar antes que el sha1 y password_verify
            );

           

            switch ($accion) {
                
                case "crear":

                    $this->crear( $familia_data);
                    
                    redirect("Familia_controller/crud_familia");
                    break;

                case "editar":
                    $this->editar($id, $familia_data);

                    redirect("Familia_controller/mantenimientoFamilia/ver/" . $id);

                    break;

                case "borrar":
                    $this->borrar($id);

                    redirect("Familia_controller/crud_familia");

                    break;
            }
        }
    }

    public function editar($id, $familia_data) {
        $this->Familia_model->modificarFamilia($id, $familia_data);
    }

    public function borrar($id) {
        $this->Familia_model->borrar_familia($id);
    }

    public function crear( $familia_data) {
        $this->Familia_model->crear_familia( $familia_data);
    }

    private function setearDatosPost($datos) {

        $datos['datosUsuario']['familia'] = $this->input->post('familia');
       

        //password_hash probar antes que el sha1 y password_verify

        return $datos;
    }

    private function validacionesFamilia() {
        $config = array(
            array(
                'field' => 'familia',
                'label' => 'Familia',
                'rules' => 'required'
            ),
          
            
        );
        return $config;
    }

}


