<?php

include_once('database.php');
include_once('controllerTraits.php');


class UserController{

    public function __construct() {
        $this->db = new UsersTable();
    }

    use RequestJson;

    public function get_user(){
        global $dbh;
        $users = $this->db->get_user($_GET['UserID']);
        echo json_encode($users);
    }

    public function set_user(){
        
        $data = $this->get_request_json();
        $last_id['UserID'] = $this->db->insert_user($data->UserName);
        echo json_encode($last_id);
    }

}