<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




function db_result_to_array($rs,$clave,$valor,$default){
    $resultado=[""=>$default];
    
    foreach($rs as $reg){
        $resultado[$reg->{$clave}]=$reg->{$valor};
    }
    
    return $resultado;
}

