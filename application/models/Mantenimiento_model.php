<?php

class Mantenimiento_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_alumnos() {
        $query = $this->db->get('alumno');

        return $query->result_array();
    }

    

}
