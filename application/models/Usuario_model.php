<?php

class Usuario_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    function get_alumnos() {
        $query = $this->db->get('alumno');

        return $query->result_array();
    }

    /**
     * add un usuario a la base de datos
     * @param type $array
     */
    function registrar_usuario($array_usuario, $array_persona, $aptitudes) {

        $this->db->insert('usuario', $array_usuario);

        $this->db->select('id_usuario');
        $this->db->where("nombre_usuario", $array_usuario["nombre_usuario"]);
        $queryUsuario = $this->db->get('usuario');


        $array_persona["usuario_id"] = $queryUsuario->row()->id_usuario;
        $this->db->insert('alumno', $array_persona);

        $this->db->select('id_alumno');
        $this->db->where("usuario_id", $queryUsuario->row()->id_usuario);

        $queryalumno = $this->db->get('alumno');

        foreach ($aptitudes as $value) {
            if (get_object_vars($value)["checked"] == 1) {
                $data = array(
                    'alumno_id' => $queryalumno->row()->id_alumno,
                    'aptitud_id' => get_object_vars($value)["id_aptitud"]
                );

                $this->db->insert('alumno_aptitud', $data);
            }
        }
    }

    function cambiarAptitudes($familia_id) {
        if ($familia_id != 0) {
            $this->db->where("(familia_id = $familia_id)");
        }

        $query = $this->db->get('aptitud');
        return json_encode($query->result());
    }

    function get_lista_familias() {

        $this->db->where("(familia != 'null' )");
        return $this->db->get('familia');
    }

    function get_aptitudes() {

        $query = $this->db->get('aptitud');
        return json_encode($query->result());
    }

    function getAptitudesChecked($id) {
        $sql = 'select ap.id_aptitud, ap.descripcion, ap.familia_id, '
                . 'if(alap.alumno_id>0,"1","0") as checked, if(alap.alumno_id>0,"1","0") as '
                . 'original from aptitud ap left join alumno_aptitud alap on ap.id_aptitud=alap.aptitud_id '
                . 'and alap.alumno_id=?';

        $query = $this->db->query($sql, array($id));
        return json_encode($query->result());
    }

    function get_datos_alumnos_by_id($id) {

        $arr_datosFinales = array();

        if ($id == 0) {
            $datosUsuario = array("id_alumno" => "", "nombre" => "", "apellidos" => "", "dni" => "", "telefono" => "", "email" => "", "usuario_id" => "", "nombre_usuario" => "", "password" => "");
        } else {

            $this->db->where("id_alumno", $id);
            $queryAlumno = $this->db->get('alumno');

            $this->db->where("id_usuario", $queryAlumno->row()->usuario_id);
            $queryUsuario = $this->db->get('usuario');

            $datosUsuario = $queryAlumno->result_array()[0];
            $datosUsuario["nombre_usuario"] = $queryUsuario->row()->nombre_usuario;
            $datosUsuario["password"] = $queryUsuario->row()->password;
        }

        $query3 = $this->db->get('familia');
        $familias = $query3->result_array();

        $arr_datosFinales["datosUsuario"] = $datosUsuario;
        $arr_datosFinales["aptitudes"] = $this->getAptitudesChecked($id);
        $arr_datosFinales["familias"] = $familias;

        return $arr_datosFinales;
    }

    function modificarAlumno($id_alumno, $array_usuario, $array_persona, $aptitudes) {


        $this->db->where('nombre_usuario', $array_usuario["nombre_usuario"]);
        $this->db->update('usuario', $array_usuario);

        $this->db->where("id_alumno", $id_alumno);
        $this->db->update('alumno', $array_persona);

        foreach ($aptitudes as $value) {
            if (get_object_vars($value)["checked"] != get_object_vars($value)["original"]) {
                if (get_object_vars($value)["checked"] == 1) {
                    $data = array(
                        'alumno_id' => $id_alumno,
                        'aptitud_id' => get_object_vars($value)["id_aptitud"]
                    );

                    $this->db->insert('alumno_aptitud', $data);
                } else {
                    $this->db->where("alumno_id", $id_alumno);
                    $this->db->where("aptitud_id",get_object_vars($value)["id_aptitud"]);
                    $this->db->delete('alumno_aptitud');
                }
            }
        }
    }
    
    function borrar_alumno($id_alumno) {
        $this->db->where("id_alumno", $id_alumno);
        $queryAlumno = $this->db->get('alumno');
        $this->db->delete('usuario', array('id_usuario' => $queryAlumno->row()->usuario_id));
    }

}
