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

    public function inscrire($data){
        $this->db->insert('Membres',$data);
         $email = $data['email'];
        $password = $data['motDePasse'];
        $session = $this->Authentification_model->valid_login($email, $password);
        if (count($session) > 0) {
            $sess_array = array(
                'idMembre' => $session[0]->idMembre,
                'email' => $session[0]->email,
                'isAdmin' => $session[0]->isAdmin
            );

            $this->session->set_userdata('connected', $sess_array);
            redirect('Authentification/secure');
        } else {
            $this->session->set_flashdata('error', 'something went wrong');
            redirect('Authentification/login');
        }



    }


 }
?>