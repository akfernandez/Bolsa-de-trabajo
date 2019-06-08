<?php

class Aptitud_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_aptitudes() {
        $query = $this->db->get('aptitud');

        return $query->result_array();
    }

    function get_aptitudes_familia() {
        $query = $this->db->query("SELECT a.id_aptitud, a.descripcion,  f.familia
                                    FROM aptitud a
                                    JOIN familia f ON a.familia_id=f.id_familia;");
        

        return $query->result_array();
    }
    
    function get_datos_aptitud_by_id($id){
        
        $arr_datosFinales = array();
        
         if ($id == 0) {
             
            $datosUsuario = array("id_aptitud" => "", "descripcion" => "",   "familia_id" => "");
        
         } else {
            $this->db->where("id_aptitud", $id);
            $queryAptitud = $this->db->get('aptitud');

            

            $datosUsuario = $queryAptitud->result_array()[0];
            
        }

        $query3 = $this->db->get('familia');
        $familias = $query3->result_array();


        $arr_datosFinales["datosUsuario"] = $datosUsuario;
        
        $arr_datosFinales["familias"] = $familias;
        
        return $arr_datosFinales;
    }
    
    function modificarAptitud($id_aptitud,  $array_aptitud) {



        $this->db->where("id_aptitud", $id_aptitud);
        $this->db->update('aptitud', $array_aptitud);

       
    }
    
    function borrar_aptitud($id_aptitud) {
        
        $this->db->delete('aptitud', array('id_aptitud' => $id_aptitud));
    }
    
    
    function crear_aptitud( $array_aptitud) {

        
        $this->db->insert('aptitud', $array_aptitud);

    }
    
    

}
