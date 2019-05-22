<?php

class Session_model extends CI_Model {

    function __construct() {
        parent::__construct();
        
    }
    
    function add_usuario_sesion($array_usuario){
         $newdata = array(
            'nombre_usuario' => $array_usuario["nombre_usuario"],
            'pass' => $array_usuario["contraseña"],
            'dentro' => TRUE,
            'tipo'=> $array_usuario["tipo"]
        );
        $this->session->set_userdata($newdata);
    }
    
    function cerrar_sesion() {
        $this->session->sess_destroy();
    }

    function esta_dentro() {
        return $this->session->userdata("dentro");
    }
    
    function get_tipo_usuario(){
         return $this->session->userdata("tipo");
    }
    
    function es_alumno(){
        if($this->session->userdata("tipo")=="a"){
            return true;
        }
        else{
            return false;
        }
    }


    


}

