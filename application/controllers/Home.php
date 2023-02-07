<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    
    public function objets(){
        $objets = $this->Objet_model->objets();
        $data['objets'] = $objets;
        $this->load->view('pages/home' , $data);

    }
}