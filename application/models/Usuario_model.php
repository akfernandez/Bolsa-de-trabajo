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
    function registrar_usuario($array_usuario, $array_persona, $aptitudes) {

        $this->db->insert('usuario', $array_usuario);

        $this->db->select('id_usuario');
        $this->db->where("nombre_usuario", $array_usuario["nombre_usuario"]);
        $query = $this->db->get('usuario');


        $array_persona["usuario_id"] = $query->row()->id_usuario;
        $this->db->insert('alumno', $array_persona);

        $this->db->select('id_alumno');
        $this->db->where("usuario_id", $query->row()->id_usuario);

        $queryalumno = $this->db->get('alumno');

        foreach ($aptitudes as $key => $value) {
            $data = array(
                'alumno_id' => $queryalumno->row()->id_alumno,
                'aptitud_id' => $value
            );

            $this->db->insert('alumno_aptitud', $data);
        }

      $newdata = array(
            'nombre_usuario' => $array["nombre_usuario"],
            'pass' => $array["contraseña"],
            'dentro' => TRUE
        );
        $this->session->set_userdata($newdata);
    }

    function cambiarAptitudes($familia_id) {
        $this->db->where("(familia_id = $familia_id OR familia_id = 4)");

        $query = $this->db->get('aptitud');
        return json_encode($query->result());
    }

    function get_lista_familias() {

        $this->db->where("(familia != 'null' )");
        return $this->db->get('familia');
    }
    
    function get_aptitudes(){
        
        $query = $this->db->get('aptitud');
        return json_encode($query->result());
    }


}
