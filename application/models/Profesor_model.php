<?php

class Profesor_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_profesores() {
        $query = $this->db->get('profesor');

        return $query->result_array();
    }

    function get_profesores_familia() {
        $query = $this->db->query("SELECT p.id_profesor, p.nombre, p.apellidos, p.dni, p.email, f.familia
                                    FROM profesor p
                                    JOIN familia f ON p.familia_id=f.id_familia;");
        

        return $query->result_array();
    }
    
    function get_datos_profesor_by_id($id){
        
        $arr_datosFinales = array();
        
         if ($id == 0) {
             
            $datosUsuario = array("id_profesor" => "", "nombre" => "", "apellidos" => "", "dni" => "", "email" => "", "usuario_id" => "",  "familia_id" => "", "nombre_usuario"=>"", "password"=>"");
        
         } else {
            $this->db->where("id_profesor", $id);
            $queryProfesor = $this->db->get('profesor');

            $this->db->where("id_usuario", $queryProfesor->row()->usuario_id);
            $queryUsuario = $this->db->get('usuario');

            $datosUsuario = $queryProfesor->result_array()[0];
            $datosUsuario["nombre_usuario"] = $queryUsuario->row()->nombre_usuario;
            $datosUsuario["password"] = $queryUsuario->row()->password;
        }

        $query3 = $this->db->get('familia');
        $familias = $query3->result_array();


        $arr_datosFinales["datosUsuario"] = $datosUsuario;
        
        $arr_datosFinales["familias"] = $familias;
        
        return $arr_datosFinales;
    }
    
    function modificarProfesor($id_profesor, $array_usuario, $array_persona) {


        $this->db->where('nombre_usuario', $array_usuario["nombre_usuario"]);
        $this->db->update('usuario', $array_usuario);

        $this->db->where("id_profesor", $id_profesor);
        $this->db->update('profesor', $array_persona);

       
    }
    
    function borrar_profesor($id_profesor) {
        $this->db->where("id_profesor", $id_profesor);
        $queryProfesor = $this->db->get('profesor');
        $this->db->delete('usuario', array('id_usuario' => $queryProfesor->row()->usuario_id));
    }
    
    
    function crear_profesor($array_usuario, $array_persona) {

        $this->db->insert('usuario', $array_usuario);

        $this->db->select('id_usuario');
        $this->db->where("nombre_usuario", $array_usuario["nombre_usuario"]);
        $queryUsuario = $this->db->get('usuario');


        $array_persona["usuario_id"] = $queryUsuario->row()->id_usuario;
        $this->db->insert('profesor', $array_persona);

    }
    
    

}
