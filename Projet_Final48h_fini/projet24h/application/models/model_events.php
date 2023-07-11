
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class model_events extends CI_Model {
    public function insert( $date_event, $titre, $contenu) {
        $data = array(
            'date_event' => $date_event,
            'titre' => $titre,
            'contenu' => $contenu
        );

        $this->db->insert('Events', $data);
        return $this->db->insert_id(); // Retourne l'ID de l'événement inséré
    }

    public function check_poids_usersById2($id){
        $sql = "select poids from user_profile where iduser_profile= ? ";
        $sql = sprintf($query,$id);
        $query = $this->db->query($sql);      
        return $query;
    }
   
    public function check_poids_usersById($id){
        try {
            $sql = "SELECT poids from user_profile WHERE iduser_profile='%s' LIMIT 1";
            $sql = sprintf($sql, $id);
            $query = $this->db->query($sql);
            $dbRow = $query->row_array();
            $poids = $dbRow['poids'];
        } catch (Exception $e) {
           // echo $e;
            //$id = null;
        }
        return $poids;
    }
  

    public function gere_Compte(){
        $query = $this->db->query("select * from Code_credit");
        
        $tab = array();
        $i=0;
        foreach($query->result_array() as $row){
            $tab[$i]['idCode_credit'] = $row['idCode_credit'];
            $tab[$i]['nombre'] = $row['nombre'];
            $tab[$i]['montant'] = $row['montant'];
            $i++;
        }
        return $tab;
    }

    public function getExample_suggestion($id){
        $sql = "select * from suggestion_example where user_poids <= %g and user_poids >= %g";
        $sql = sprintf($sql,$id,$id);
        $query = $this->db->query($sql);
        
        $tab = array();
        $i=0;
        foreach($query->result_array() as $row){
            $tab[$i]['num'] = $row['num'];
            $tab[$i]['jour'] = $row['jour'];
            $tab[$i]['nomactivites'] = $row['nomactivites'];
            $tab[$i]['duree'] = $row['duree'];
            $tab[$i]['kaly_type'] = $row['kaly_type'];
            $tab[$i]['kalynom'] = $row['kalynom'];
            $tab[$i]['quantite'] = $row['quantite'];
            $tab[$i]['prix'] = $row['prix'];
            $i++;
        }
        return $tab;
    }

    public function getProfile_ById($id){
        $query = "select * from users where idusers = %g";
        $query = sprintf($query,$id);
        $sql = $this->db->query($query);
        $tab = array();
        $i=0;
        foreach($sql->result_array() as $row){
            $tab[$i]['idusers'] = $row['idusers'];
            $tab[$i]['nom'] = $row['nom'];
            $tab[$i]['prenom'] = $row['prenom'];
            $tab[$i]['telephone'] = $row['telephone'];
            $tab[$i]['genre'] = $row['genre'];
            $tab[$i]['email'] = $row['email'];
            $tab[$i]['addresse'] = $row['addresse'];
            $tab[$i]['mdp'] = $row['mdp'];
            $i++;
        }
        return $tab;
    }

    public function select_poidsById($id) {
        $query = "select * from User_profile where idUser_profile = ?";
        $query = sprintf($query,$id);
        $tab = array();
        $i=0;
        foreach($query->result_array() as $row){
            $tab[$i]['idUser_profile'] = $row['idUser_profile'];
            $tab[$i]['idUsers'] = $row['idUsers'];
            $tab[$i]['age'] = $row['age'];
            $tab[$i]['poids'] = $row['poids'];
            $i++;
        }
        return $tab;
    }

    public function select_User_profil_ById() {
        $query = $this->db->query("select * from User_profil");
        $tab = array();
        $i=0;
        foreach($query->result_array() as $row){
            $tab[$i]['idUser_profil'] = $row['idUser_profil'];
            $tab[$i]['idUsers'] = $row['idUsers'];
            $tab[$i]['age'] = $row['age'];
            $tab[$i]['poids'] = $row['poids'];
            $i++;
        }
        return $tab;
    }

    public function insert_Historique_Proposition($idUser_profil,$num,$jour,$nomactivites,$duree,$Kalytype,$quantite,$prix){
        $sql = "INSERT INTO Historique_Proposition VALUES (default,%g,%g,'%s','%s',%g,'%s','%s',%f)";
        $sql = sprintf($sql,$idUser_profil,$num,$jour,$nomactivites,$duree,$Kalytype,$quantite,$quantite,$prix);
        $this->db->query($sql);
    }

    public function getProposition($condition,$poids){
        if($condition == 1){
            $query = $this->db->query("select * from getdetail_proposition");
            $tab = array();
            $i=0;
            foreach($query->result_array() as $row){
                $tab[$i]['userid'] = $row['userid'];
                $tab[$i]['num'] = $row['num'];
                $tab[$i]['jour'] = $row['jour'];
                $tab[$i]['nomactivites'] = $row['nomactivites'];
                $tab[$i]['duree'] = $row['duree'];
                $tab[$i]['kaly_type'] = $row['kalytype'];
                $tab[$i]['kalynom'] = $row['kalynom'];
                $tab[$i]['quantite'] = $row['quantite']+$poids/2;
                $tab[$i]['prix'] = $row['prix']+10;
                $i++;
            }
            return $tab;
        }else if($condition == -1){
            $query = $this->db->query("select * from getdetail_proposition");
            $tab = array();
            $i=0;
            foreach($query->result_array() as $row){
                $tab[$i]['userid'] = $row['userid'];
                $tab[$i]['num'] = $row['num'];
                $tab[$i]['jour'] = $row['jour'];
                $tab[$i]['nomactivites'] = $row['nomactivites'];
                $tab[$i]['duree'] = $row['duree'];
                $tab[$i]['kaly_type'] = $row['kalytype'];
                $tab[$i]['kalynom'] = $row['kalynom'];
                $tab[$i]['quantite'] = $row['quantite']-$poids+2;
                $tab[$i]['prix'] = $row['prix'];
                $i++;
            }
            return $tab;
        }
    }

    public function gere_CRUD_Regime(){

    }

    public function insert_User_profile($idUser,$age,$poids,$taille){
        $sql = "INSERT INTO User_profile VALUES (default,%g,%g,%f,%f)";
        $sql = sprintf($sql,$idUser,$age,$poids,$taille);
        $this->db->query($sql);
    }

    public function getId_MAX_events(){
        $query = $this->db->query("SELECT MAX(eventsid) AS max FROM events");
        $row = $query->row(); // Fetch the result as an object
        $id = $row->max;
        if($id != null){
            $sql = "select * from events where eventsid= %g";
            
            $sql = sprintf($sql,$id);
            $query = $this->db->query($sql);
                $tab = array();
                $i=0;
                foreach($query->result_array() as $row){
                    $tab[$i]['eventsid'] = $row['eventsid'];
                    $tab[$i]['date_event'] = $row['date_event'];
                    $tab[$i]['titre'] = $row['titre'];
                    $tab[$i]['contenu'] = $row['contenu'];
                    $tab[$i]['photo'] = $row['photo'];
                    $i++;
                }
                return $tab;
        }else{
            $id = null;
            return $id;
        }
    }

    public function selectHistorique_ById($id) {
        $query = $this->db->query("select * from Historique_Proposition where idHistorique_Proposition= ?");
        $query = sprintf($query,$id);
            $tab = array();
            $i=0;
            foreach($query->result_array() as $row){
                $tab[$i]['idUser'] = $row['idUser'];
                $tab[$i]['num'] = $row['num'];
                $tab[$i]['jour'] = $row['jour'];
                $tab[$i]['nomactivites'] = $row['nomactivites'];
                $tab[$i]['duree'] = $row['duree'];
                $tab[$i]['kalytype'] = $row['kalytype'];
                $tab[$i]['kalynom'] = $row['kalynom'];
                $tab[$i]['quantite'] = $row['quantite'];
                $tab[$i]['prix'] = $row['prix'];
                $i++;
            }
            return $tab;
    }

    public function updateEvent($eventId, $data) {
        $this->db->where('eventsId', $eventId);
        $this->db->update('Events', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        } 
    }

    public function insert_events($userId,$date_event,$titre,$contenu,$photo){
        if($photo != null && $date_event != null && $userId != null && $titre != null && $contenu != null){
            $timestamp = strtotime($date_event);
            $formattedDate = date('Y-m-d H:i:s',$timestamp);
            
            $sql = "INSERT INTO events(id,date_event,titre,contenu,photo) VALUES (%g,'%s','%s','%s','%s')";
            $sql = sprintf($sql,$userId,$date_event,$titre,$contenu,$photo);
            $this->db->query($sql);
            $val = true;
        }else{
            $val = false;
        }
        return $val;
    }

    public function deleteEvent($eventId) {
        $this->db->where('eventsId', $eventId);
        $this->db->delete('Events');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function getCode(){
        $query = $this->db->query("select * from Code_credit");
        $query = sprintf($query,$id);
            $tab = array();
            $i=0;
            foreach($query->result_array() as $row){
                $tab[$i]['nombre'] = $row['nombre'];
                $tab[$i]['montant'] = $row['montant'];
                $i++;
            }
            return $tab;
    }
}
?>