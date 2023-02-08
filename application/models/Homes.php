<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Homes extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function objets()
    {
        $data = array();
        $sql = "select * from Objets order by DateHeurePublication desc ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function objet($idObjet)
    {
        $sql = "select * from Objets where idObjet = %s  ";
        $sql = sprintf($sql, $idObjet);
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function MesObjets()
    {
        $idMembre = $_SESSION['connected']['idMembre'];
        $data = array();
        $sql = "select * from Objets o join proprio p on o.idObjet = p.idObjet where p.idMembre = %s order by DateHeurePublication  desc";
        $sql = sprintf($sql, $idMembre);
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }


    public function categories()
    {
        $data = array();
        $sql = "select * from Categories order by libele ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function uploadImage($temp, $file)
    {
        $upload_img = base_url('assets/images');
        move_uploaded_file($temp, $upload_img . $file);
    }

    public function insertObjet($idCategorie, $titre, $descri, $photo, $tmp_photo)
    {

        $sql = "insert into Objets values (null,%s,NOW(),'%s','%s','%s')";
        $sql = sprintf($sql, $idCategorie, $titre, $descri, $photo);
        $this->db->query($sql);

        $upload_img = FCPATH . 'assets/images';
        move_uploaded_file($tmp_photo, $upload_img . $photo);
    }

    public function membres()
    {
        $data = array();
        $sql = "select * from Membres order by idMembre desc ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function echanges()
    {
        $data = array();
        $sql = "select * from Echanges order by idEchange desc ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function recherche($titre, $idCategorie)
    {
        $data = array();

        $sql = "select * from Objets where titre like '%s%s%s' and idCategorie = %s order by DateHeurePublication desc ";
        $sql = sprintf($sql, '%', $titre, '%', $idCategorie);
        if ($idCategorie == 'tous') {
            $sql = "select * from Objets where titre like '%s%s%s' order by DateHeurePublication desc ";
            $sql = sprintf($sql, '%', $titre, '%');
        }
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function parPrix($prix, $taux)
    {

        $max = $prix + ($taux / 100  * $prix);
        $min = $prix - ($taux / 100  * $prix);
        // // var_dump($max);
        $data = array();
        $sql = "select * from Objets where prix between %s and %s order by DateHeurePublication desc ";
        $sql = sprintf($sql,$min,$max);
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
