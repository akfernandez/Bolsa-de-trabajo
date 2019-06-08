<?php

class Direccion_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_direccion() {
        $query = $this->db->get('direccion');

        return $query->result_array();
    }
    
    function get_datos_direccion_by_id($id){
        
        $arr_datosFinales = array();
        
         if ($id == 0) {
             
            $datosUsuario = array("id_direccion" => "", "nombre" => "", "apellidos" => "", "dni" => "", "email" => "", "telefono" => "" , "cargo" => "","usuario_id" => "", "nombre_usuario"=>"", "password"=>"");
        
         } else {
            $this->db->where("id_direccion", $id);
            $queryDireccion = $this->db->get('direccion');

            $this->db->where("id_usuario", $queryDireccion->row()->usuario_id);
            $queryUsuario = $this->db->get('usuario');

            $datosUsuario = $queryDireccion->result_array()[0];
            $datosUsuario["nombre_usuario"] = $queryUsuario->row()->nombre_usuario;
            $datosUsuario["password"] = $queryUsuario->row()->password;
        }

        $arr_datosFinales["datosUsuario"] = $datosUsuario;
        
        return $arr_datosFinales;
    }
    
    function modificarDireccion($id_direccion, $array_usuario, $array_persona) {


        $this->db->where('nombre_usuario', $array_usuario["nombre_usuario"]);
        $this->db->update('usuario', $array_usuario);

        $this->db->where("id_direccion", $id_direccion);
        $this->db->update('direccion', $array_persona);

       
    }
    
    function borrar_direccion($id_direccion) {
        $this->db->where("id_direccion", $id_direccion);
        $queryDireccion = $this->db->get('direccion');
        $this->db->delete('usuario', array('id_usuario' => $queryDireccion->row()->usuario_id));
    }
    
    
    function crear_direccion($array_usuario, $array_persona) {

        $this->db->insert('usuario', $array_usuario);

        $this->db->select('id_usuario');
        $this->db->where("nombre_usuario", $array_usuario["nombre_usuario"]);
        $queryUsuario = $this->db->get('usuario');


        $array_persona["usuario_id"] = $queryUsuario->row()->id_usuario;
        $this->db->insert('direccion', $array_persona);

    }
    
    

}
