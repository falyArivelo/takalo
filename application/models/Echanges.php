<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Echanges extends CI_Model
{

    public function echanges()
    {
        $data = array();
        $sql = "select * from Echanges where dateAcceptation is not null order by dateAcceptation  ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function echange($idEchange)
    {
        $data = array();
        $sql = "select * from Echanges where idEchange =%s order by dateAcceptation  ";
        sprintf($sql, $idEchange);
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function demander($idMEmbre2, $idObjet1, $idObjet2)
    {
        $idMembre1 = $_SESSION['connected']['idMembre'];
        $sql = " insert into Echanges values (null,%s,%s,%s,%s,1,1,null,1) ";
        $sql = sprintf($sql, $idMembre1, $idMEmbre2, $idObjet1, $idObjet2);

        $this->db->query($sql);
    }

    public function accepter($idEchange)
    {
        $sql = "UPDATE Echanges set dateAcceptation = NOW() , etat = 20 Where idEchange = %d  ";
        $sql = sprintf($sql, $idEchange);
        $this->db->query($sql);
    }

    public function refuser($idEchange)
    {
        $sql = "UPDATE Echanges set dateAcceptation = NOW() ,etat = 10 Where idEchange = %s  ";
        $sql = sprintf($sql, $idEchange);
        $this->db->query($sql);
    }

    public function annuller($idEchange)
    {
        $sql = "UPDATE Echanges set dateAcceptation = NOW() , etat = 11 Where idEchange = %d  ";
        $sql = sprintf($sql, $idEchange);
        $this->db->query($sql);
    }

    public function  propositions()
    {
        $idMembre1 = $_SESSION['connected']['idMembre'];
        $data = array();
        $sql = " select e.idEchange,idMembre1,idMembre2,dateDemande,dateAcceptation,etat,idObjet1,idObjet2 from Echanges e join DetailEchange d on e.idEchange = d.idEchange  where dateAcceptation is null  and idMembre2 = %s and etat !=10 order by dateAcceptation ";
        $sql = sprintf($sql, $idMembre1);

        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function insertProprio($idMembre, $idObjet)
    {
        // insert into echanges values(null,1,2,1,2,1,1,now(),20);
        // insert into proprio values (1,1,now());
        $sql = " insert into Proprio values (%s,%s,now()) ";
        $sql = sprintf($sql, $idMembre, $idObjet);
        $this->db->query($sql);
    }


    public function proprio($idObjet)
    {
        $sql = " select * from Membres m where idMembre = ( select idMembre from proprio where idObjet = %s limit 1 ) ";
        $sql= sprintf($sql, $idObjet);
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['idMembre'];
    }

    public function historique($idObjet)
    {
        $data = array();
        $sql = " select * from Membres m join Proprio p on m.idMembre = p.idMembre  where p.idObjet = %s order by p.dateAcquis ";
        $sql = sprintf($sql, $idObjet);

        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    // manu

    public function sendExchangeRequest($data , $idObjets1 , $idObjets2 ){ 
        $this->db->insert('echanges',$data);
        $idMembre1 = $data['idMembre1'];
        $idMembre2 = $data['idMembre2'];
        
        $details = array();
        $actualExchangeIdQuery = sprintf("select idEchange from Echanges where  idMEmbre1 = %s AND idMembre2 = %s ORDER BY datedemande desc limit 1",$idMembre1 , $idMembre2);
        $exchangeIds = $this->db->query($actualExchangeIdQuery)->result();
        $actualExchangeId = $exchangeIds[0]->idEchange ;
        
        foreach ($idObjets1 as $key => $idObjet1) {
            if( $key == 0 ){
                $details[] = array('idEchange'=>$actualExchangeId,'idObjet1'=>$idObjet1,'idObjet2'=>$idObjets2);
            }else{
                $details[] = array('idEchange'=>$actualExchangeId,'idObjet1'=>$idObjet1,'idObjet2'=>$idObjets2);
            }
        }

        foreach ($details as $key => $detail) {
            $this->db->insert('detailEchange',$detail);
        }
    }


    public function validateExchange($exchangeId ){ // details = array(array());
        $updateQuery = sprintf("UPDATE Echanges SET dateAcceptation = NOW() , etat = 20 WHERE idEchange = %s" , $exchangeId);
        $this->db->query($updateQuery);
        $userIdsQuery = sprintf("SELECT idMembre1 , idMembre2 FROM Echanges WHERE idEchange = %g" , $exchangeId);
        $userIds = $this->db->query($userIdsQuery)->result();
        
        // ilay angataana
        $object2IdQuery = sprintf("SELECT DISTINCT idObjet2 FROM DetailEchange WHERE idEchange = %g" , $exchangeId);
        $object2Id= $this->db->query($object2IdQuery)->result();

        // ilay takalony
        $object1IdQuery = sprintf("SELECT DISTINCT idObjet1 FROM DetailEchange WHERE idEchange = %g ORDER BY idObjet1 ASC" , $exchangeId);
        $object1Id= $this->db->query($object1IdQuery)->result();

        foreach ($object1Id as $key => $value) {
            $query = sprintf("INSERT INTO Proprio VALUES ( %s , %s , NOW() )" , $userIds[0]->idMembre2 , $value->idObjet1 );
            $this->db->query($query);
        }

        $query = sprintf("INSERT INTO Proprio VALUES ( %s , %s , NOW() )" , $userIds[0]->idMembre1 , $object2Id[0]->idObjet2 );
        $this->db->query($query);
        
    }
}
