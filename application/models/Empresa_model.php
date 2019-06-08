<?php

class Empresa_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_empresas() {
        $query = $this->db->get('empresa');

        return $query->result_array();
    }
    
    function get_datos_empresa_by_id($id){
        
        $arr_datosFinales = array();
        
         if ($id == 0) {
             
            $datosUsuario = array("id_empresa" => "", "razon_social" => "", "telefono_contacto" => "", "cif" => "", "email" => "", "nombre_recursos_humanos"=>"","usuario_id" => "",  "direccion" => "", "nombre_usuario"=>"", "password"=>"");
        
         } else {
            $this->db->where("id_empresa", $id);
            $queryEmpresa = $this->db->get('empresa');

            $this->db->where("id_usuario", $queryEmpresa->row()->usuario_id);
            $queryUsuario = $this->db->get('usuario');

            $datosUsuario = $queryEmpresa->result_array()[0];
            $datosUsuario["nombre_usuario"] = $queryUsuario->row()->nombre_usuario;
            $datosUsuario["password"] = $queryUsuario->row()->password;
        }

        $arr_datosFinales["datosUsuario"] = $datosUsuario;     
        
        return $arr_datosFinales;
    }
    
    function modificarEmpresa($id_empresa, $array_usuario, $array_persona) {


        $this->db->where('nombre_usuario', $array_usuario["nombre_usuario"]);
        $this->db->update('usuario', $array_usuario);

        $this->db->where("id_empresa", $id_empresa);
        $this->db->update('empresa', $array_persona);

       
    }
    
    function borrar_empresa($id_empresa) {
        $this->db->where("id_empresa", $id_empresa);
        $queryEmpresa = $this->db->get('empresa');
        $this->db->delete('usuario', array('id_usuario' => $queryEmpresa->row()->usuario_id));
    }
    
    
    function crear_empresa($array_usuario, $array_persona) {

        $this->db->insert('usuario', $array_usuario);

        $this->db->select('id_usuario');
        $this->db->where("nombre_usuario", $array_usuario["nombre_usuario"]);
        $queryUsuario = $this->db->get('usuario');


        $array_persona["usuario_id"] = $queryUsuario->row()->id_usuario;
        $this->db->insert('empresa', $array_persona);

    }
    
    

}
