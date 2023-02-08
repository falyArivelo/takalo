<?php 
if ( ! defined('BASEPATH')){
    exit('No direct script access allowed');
}

 class Administrateur_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();

    }


    public function delete($idObjet){
        $this->db->delete('Objets',array('idObjet' => $idObjet));
    }

    public function objets(){
        $data = array();
        $sql = "select * from Objets order by DateHeurePublication desc ";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $data[] = $row;
        }
        return $data;
    }

    public function MesObjets(){
      $idMembre = $_SESSION['connected']['idMembre'];
        $data = array();
        $sql = "select * from Objets o join proprio p on o.idObjet = p.idObjet where p.idMembre = %s order by DateHeurePublication  desc";
        $sql= sprintf($sql,$idMembre);
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $data[] = $row;
        }
        return $data;
    }
 }
?>