<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

    public function getdata(){
        $query = $this->db->query("select * from users");
        $tab = array();
        $i=0;
        foreach($query->result_array() as $row){
            $tab[$i]['idUsers'] = $row['idUsers'];        
            $tab[$i]['email'] = $row['email'];
            $tab[$i]['genre'] = $row['genre'];
            $tab[$i]['addresse'] = $row['addresse'];
            $i++;
        }
        return $tab;
    }
    public function insert_person($nom,$prenom,$telephone,$genre,$email,$addresse,$password){
        $sql = "INSERT INTO users VALUES (default,'%s','%s','%s','%s','%s','%s','%s')";
        $sql = sprintf($sql,$nom,$prenom,$telephone,$genre,$email,$addresse,$password);
        $this->db->query($sql);
    }
}