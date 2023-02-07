<?php 
if ( ! defined('BASEPATH')){
    exit('No direct script access allowed');
}

 class Authentification_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();

    }

    public function form(){
        $this->load->view('pages/login');
    }

    public function valid_login($email,$password){
    
        $sql = "select * from Membres where email ='%s' and motDePasse = '%s' ";
        $sql = sprintf($sql,$email,$password);
        
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function affiche($data){
        echo $data['email'];
    }

    public function save($data){
        $this->db->insert('Membres',$data);

    }


 }
?>