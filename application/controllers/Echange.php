<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Echange extends CI_Controller
{
    public function echanges()
    {
        $categorie = $this->Echanges->categories();
        $cat['categories'] = $categorie;
        $objets = $this->Homes->objets();
        $data['echanges'] = $objets;
        $this->load->view('templates/header');
        $this->load->view('pages/barRecherche', $cat);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }

    public function demander()
    {
    }


    public function accepter()
    {
        $idEchange = $this->input->get('idEchange');
        $this->Echanges->accepter($idEchange);
        $echange = $this->Echanges->echange($idEchange);
        $this->Echanges->insertProprio($echange['idMembre1'], $echange['idObjet2']);
        $this->Echanges->insertProprio($echange['idMembre2'], $echange['idObjet1']);
    }

    public function choix($idObjet)
    {

        $objets = $this->Homes->MesObjets();
        $data['objets'] = $objets;
        $data['idObjet2'] = $idObjet;


        $this->load->view('templates/header');
        $this->load->view('pages/choix', $data);
        $this->load->view('templates/footer');
    }

    public function refuser($idEchange)
    {
        $this->Echanges->refuser($idEchange);
    }

    public function annuler()
    {
        $idEchange = $this->input->get('idEchange');
        $this->Echanges->annuler($idEchange);
    }

    public function propositions()
    {
        $propositions = $this->Echanges->propositions();
        $data['propositions'] = $propositions;
        $this->load->view('templates/header');
        $this->load->view('pages/proposition', $data);
        $this->load->view('templates/footer');
    }

    // public function proprio($idObjet)
    // {
    //     $this->
    // }

    public function insertProprio($idMembre, $idObjet)
    {
        // insert into echanges values(null,1,2,1,2,1,1,now(),20);
        // insert into proprio values (1,1,now());
        $this->Echanges->insertProprio($idMembre, $idObjet);
    }

    public function historique($idObjet)
    {
        $historiques = $this->Echanges->historique($idObjet);
        $data['historiques'] = $historiques;
        $this->load->view('templates/header');
        $this->load->view('pages/historique', $data);
        $this->load->view('templates/footer');
    }

    public function sendExchangeRequest()
    {
        echo $idMembre1 = $_SESSION['connected']['idMembre'];
        echo $idObjets2 = $this->input->post('idObjet2');
        echo  $idMembre2 = $this->Echanges->proprio($idObjets2);

        $idObjets1 = $this->input->post('idObjets1');

        $data = array('idMembre1' => $idMembre1, 'idMembre2' => $idMembre2);

        $this->Echanges->sendExchangeRequest($data, $idObjets1, $idObjets2);
    }

    public function validateExchange($idEchange)
    {
        // $idEchange = $this->input->post('idEchange');
        $this->Echanges->validateExchange($idEchange);
    }
}
