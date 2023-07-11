<?php
class Auth_model extends CI_Model {

    public function check_credentials($username, $password) {
        // Vérifiez les informations d'identification de l'utilisateur en utilisant la requête SQL
        $query = $this->db->get_where('users', array('email' => $username, 'mdp' => $password));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function check_credentials2($mail, $password)
    {
        try {
            $sql = "SELECT * FROM users WHERE email='%s' AND mdp='%s' LIMIT 1";
            $sql = sprintf($sql, $mail, $password);
            $query = $this->db->query($sql);
            
            if ($query->num_rows() > 0) {
                $dbAll = $query->row_array();
                return $dbAll;
            }
        } catch (Exception $e) {
            // Gérer l'exception, par exemple :
            // echo $e->getMessage();
        }

        return false;
    }

     
    public function addUsers($nom, $prenom, $telephone, $genre, $email, $addresse, $mdp)
    {
        try {
            $sql = "INSERT INTO Users (nom, prenom, telephone, genre, email, addresse, mdp) 
                    VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')";
           // $sql = sprintf($nom, $prenom, $telephone, $genre, $email, $addresse, $mdp);
            $sql = sprintf($sql, $nom, $prenom, $telephone, $genre, $email, $addresse, $mdp);

            $this->db->query($sql);
        } catch (Exception $e) {
            //echo $e;
        }
    }
}

?>