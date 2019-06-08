<?php

class Session_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inicioSesion($nombre_usuario, $pass) {

        $this->db->where("nombre_usuario", $nombre_usuario);
        $this->db->where("password", $pass);

        $query = $this->db->get('usuario');
        if ($query->num_rows() > 0) {

            $datos = array(
                'nombre_usuario' => $query->row()->nombre_usuario,
                'pass' =>  $query->row()->password,
                'dentro' => TRUE,
                'tipo' =>  $query->row()->tipo
            );
            $this->Session_model->add_usuario_sesion($datos);
            return true;
        } else {
            return false;
        }
    }

    function add_usuario_sesion($array_usuario) {
        $newdata = array(
            'nombre_usuario' => $array_usuario["nombre_usuario"],
            'pass' => $array_usuario["password"],
            'dentro' => TRUE,
            'tipo' => $array_usuario["tipo"]
        );
        $this->session->set_userdata($newdata);
    }

    function cerrar_sesion() {
        $this->session->sess_destroy();
    }

    function esta_dentro() {
        return $this->session->userdata("dentro");
    }

    function get_tipo_usuario() {
        return $this->session->userdata("tipo");
    }

    function es_alumno() {
        if ($this->session->userdata("tipo") == "a") {
            return true;
        } else {
            return false;
        }
    }
    
    function es_empresa() {
        if ($this->session->userdata("tipo") == "e") {
            return true;
        } else {
            return false;
        }
    }
    
    function es_profesor() {
        if ($this->session->userdata("tipo") == "p") {
            return true;
        } else {
            return false;
        }
    }

}
