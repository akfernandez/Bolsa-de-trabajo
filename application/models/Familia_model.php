<?php

class Familia_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_familias() {
        $query = $this->db->get('familia');

        return $query->result_array();
    }
    
    function get_datos_familia_by_id($id){
        
        $arr_datosFinales = array();
        
         if ($id == 0) {
             
            $datosUsuario = array("id_familia" => "","familia"=>""); 
        
         } else {
            $this->db->where("id_familia", $id);
            $queryFamilia = $this->db->get('familia');

            

            $datosUsuario = $queryFamilia->result_array()[0];
            
            
        }

        $arr_datosFinales["datosUsuario"] = $datosUsuario;     
        
        return $arr_datosFinales;
    }
    
    function modificarFamilia($id_familia, $array_familia) {


        

        $this->db->where("id_familia", $id_familia);
        $this->db->update('familia', $array_familia);

       
    }
    
    function borrar_familia($id_familia) {
        
        $this->db->delete('familia', array('id_familia' => $id_familia));
    }
    
    
    function crear_familia( $array_familia) {

        $this->db->insert('familia', $array_familia);


    }
    
    

}
