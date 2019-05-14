<?php

class Usuario_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * add un usuario a la base de datos
     * @param type $array
     */
    function registrar_usuario($array_usuario, $array_persona){
        
      $this->db->insert('usuario', $array_usuario);
      
      $this->db->select('id_usuario');
      $this->db->where("nombre_usuario", $array_usuario["nombre_usuario"]);
      $query = $this->db->get('usuario');
      
       
       $array_persona["usuario_id"]=$query->row()->id_usuario;
       $this->db->insert('alumno', $array_persona);
      
//      $newdata = array(
//            'nombre_usuario' => $array["nombre_usuario"],
//            'pass' => $array["contraseña"],
//            'dentro' => TRUE
//        );
//        $this->session->set_userdata($newdata);
    }
    
   
    
}

