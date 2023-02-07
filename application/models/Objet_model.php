<?php 
if ( ! defined('BASEPATH')){
    exit('No direct script access allowed');
}

 class Objet_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();

    }

    public function objets(){
        $data = array();
        $sql = "select * from Objets";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $data[] = $row;
        }
        return $data;
    }

 }
?>