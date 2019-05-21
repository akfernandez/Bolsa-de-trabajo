<?php

class Session_model extends CI_Model {

    function __construct() {
        parent::__construct();
        
    }
    
     
    function cerrar_sesion() {
        $this->session->sess_destroy();
    }

    function esta_dentro() {
        return $this->session->userdata("dentro");
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

