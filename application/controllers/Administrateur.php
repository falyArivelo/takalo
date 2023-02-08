<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrateur extends CI_Controller
{
    
    public function objets(){
        $categorie = $this->Homes->categories();
        $cat['categories'] = $categorie;
        $objets = $this->Homes->objets();
        $data['objets'] = $objets;
        $this->load->view('templates/header');
        $this->load->view('pages/barRecherche',$cat);
        $this->load->view('pagesAdmin/home' , $data);
        $this->load->view('templates/footer');
    }

    public function delete($idObjet){
        $this->Administrateur_model->delete($idObjet);
        redirect('Administrateur/objets');
    }


    public function nouvelObjet(){
        $objets = $this->Homes->categories();
        $data['categories'] = $objets;
        $this->load->view('templates/header');
        $this->load->view('pagesAdmin/nouveauObjet',$data);
        $this->load->view('templates/footer');
    }

    
    // public function MesObjets(){
    //     $objets = $this->Homes->MesObjets();
    //     $data['objets'] = $objets;
    //     $this->load->view('templates/header');
    //     $this->load->view('pagesAdmin/mesObjet',$data);
    //     $this->load->view('templates/footer');
    // }

}