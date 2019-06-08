<?php

class Aptitud_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array("Aptitud_model", "Session_model"));
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
    }

    public function index() {
        
    }

    public function crud_aptitud() {
        $result = $this->Aptitud_model->get_aptitudes_familia();
//                $array_persona["usuario_id"] = $query->row()->id_usuario;
        $datos = array();


        foreach ($result as $key => $value) {


            $datos[] = array(
                'id' => $value["id_aptitud"],
                'descripcion' => $value["descripcion"],
                'familia' => $value["familia"]
            );
        }


        $this->load->view('plantilla', [
            "cuerpo" => $this->load->view("crud_aptitudes", ["datos" => $datos], TRUE
            )
        ]);
    }

    public function mantenimientoAptitud($accion, $id = 0) {


        $config = $this->validacionesAptitud();

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE && $accion != "borrar") {

            $datos = $this->Aptitud_model->get_datos_aptitud_by_id($id);

            if ($this->input->post('guardar') == "guardar") {
                $datos = $this->setearDatosPost($datos);
            }



            //var_dump(get_object_vars(json_decode($this->input->post('aptitudes'))));
            $this->load->view('plantilla', [
                "cuerpo" => $this->load->view("formulario_aptitud", [
                    'datos' => $datos, 'accion' => $accion], TRUE
                )
            ]);
        } else {

            $aptitud_data = array(
                'descripcion' => $this->input->post('descripcion'),
                "familia_id" => $this->input->post('familia'),
                //password_hash probar antes que el sha1 y password_verify
            );



            switch ($accion) {

                case "crear":

                    $this->crear($aptitud_data);

                    redirect("Aptitud_controller/crud_aptitud");
                    break;

                case "editar":
                    $this->editar($id, $aptitud_data);

                    redirect("Aptitud_controller/mantenimientoAptitud/ver/" . $id);

                    break;

                case "borrar":
                    $this->borrar($id);

                    redirect("Aptitud_controller/crud_aptitud");

                    break;
            }
        }
    }

    public function editar($id, $aptitud_data) {
        $this->Aptitud_model->modificarAptitud($id, $aptitud_data);
    }

    public function borrar($id) {
        $this->Aptitud_model->borrar_aptitud($id);
    }

    public function crear( $aptitud_data) {
        $this->Aptitud_model->crear_aptitud( $aptitud_data);
    }

    private function setearDatosPost($datos) {
        
        $datos['datosUsuario']['descripcion'] = $this->input->post('descripcion');        
        $datos['datosUsuario']['familia_id'] = $this->input->post('familia');
        

        //password_hash probar antes que el sha1 y password_verify

        return $datos;
    }

    private function validacionesAptitud() {
        $config = array(
            array(
                'field' => 'descripcion',
                'label' => 'Descripcion',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'familia',
                'label' => 'Departamento',
                'rules' => 'required'
            ),
            
        );
        return $config;
    }

}
