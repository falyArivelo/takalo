<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function objets()
    {
        if ($_SESSION['connected']['isAdmin'] == 1) {
            redirect('Administrateur/objets');
        } else {
            $categorie = $this->Homes->categories();
            $cat['categories'] = $categorie;
            $objets = $this->Homes->objets();
            $data['objets'] = $objets;
            $this->load->view('templates/header');
            $this->load->view('pages/barRecherche', $cat);
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer');
        }
    }

    public function MesObjets()
    {
        $objets = $this->Homes->MesObjets();
        $data['objets'] = $objets;

        $this->load->view('templates/header');
        $this->load->view('pages/mesObjet', $data);
        $this->load->view('templates/footer');
    }

    public function recherche()
    {
        $titre = $this->input->post('titre');
        $categorie = $this->input->post('categorie');

        $objets = $this->Homes->recherche($titre, $categorie);
        $data['objets'] = $objets;
        $this->load->view('templates/header');
        $this->load->view('pages/mesObjet', $data);
        $this->load->view('templates/footer');
    }

    public function delete($idObjet)
    {
        $this->Administrateur_model->delete($idObjet);
        redirect('Administrateur/objets');
    }


    public function nouvelObjet()
    {
        $objets = $this->Homes->categories();
        $data['categories'] = $objets;
        $this->load->view('templates/header');
        $this->load->view('pagesAdmin/nouveauObjet', $data);
        $this->load->view('templates/footer');
    }

    public function ajoutObjet()
    {
        echo $titre =  $this->input->post('titre');
        echo  $descri =  $this->input->post('descri');
        echo    $idCategorie =  $this->input->post('categorie');
        echo   $photo = $_FILES['sary']['name'];
        echo  $tmp_photo = $_FILES['sary']['tmp_name'];

        $this->Homes->insertObjet($idCategorie, $titre, $descri, $photo, $tmp_photo);
    }


    public function statistique()
    {
        $objets = $this->Homes->membres();
        $echanges = $this->Echanges->echanges();

        $data['membres'] = $objets;
        $data['nombreMembre'] = count($objets);
        $data['echanges'] = $echanges;
        $data['nombreEchange'] = count($echanges);


        $this->load->view('templates/header');
        $this->load->view('pagesAdmin/statistique', $data);
        $this->load->view('templates/footer');
    }

    public function listeMembre()
    {
        $objets = $this->Homes->membres();
        $echanges = $this->Homes->echanges();

        $data['membres'] = $objets;
        $data['nombreMembre'] = count($objets);
        $data['echanges'] = $echanges;
        $data['nombreEchange'] = count($echanges);


        $this->load->view('templates/header');
        $this->load->view('pagesAdmin/listeMembre', $data);
        $this->load->view('templates/footer');
    }

    public function listeEchange()
    {
        $echanges = $this->Homes->echanges();
        $objets = $this->Homes->membres();

        $data['membres'] = $objets;
        $data['nombreMembre'] = count($objets);
        $data['echanges'] = $echanges;
        $data['nombreEchange'] = count($echanges);


        $this->load->view('templates/header');
        $this->load->view('pagesAdmin/listeEchange', $data);
        $this->load->view('templates/footer');
    }

    public function parPrix($idObjet,$taux)
    {
        // echo $idObjet;
        // echo $taux;

        $objet =  $this->Homes->objet($idObjet);
        // echo $objet['idMembre'];
        
        $categorie = $this->Homes->categories();
        $cat['categories'] = $categorie;
        $objets = $this->Homes->parPrix($objet['prix'], $taux);
        $data['objets'] = $objets;
        $this->load->view('templates/header');
        // $this->load->view('pages/barRecherche', $cat);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }
}
