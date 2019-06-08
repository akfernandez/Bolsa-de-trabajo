<?php

class Inicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
      // if (set_value("familia") == $familia->id_familia) echo "selected" 
        // $this->load->helper('url_helper'); lo declaro en config autoload ¡¡NO TE OLVIDES QUE ERES SUBNORMAL!!
//        select ap.id_aptitud, ap.descripcion, ap.familia_id, if(alap.alumno_id>0,"1","0") as checked, if(alap.alumno_id>0,"1","0") as original from aptitud ap left join alumno_aptitud alap on ap.id_aptitud=alap.aptitud_id and alap.alumno_id=6
    }

    public function index() {

        $this->load->view('plantilla', [
            "cuerpo" => $this->load->view("portada", "", TRUE
            )
        ]);
    }

}
