<?php

include_once('database.php');
include_once('controllerTraits.php');

class GameController{

    public function __construct() {
        $this->db = new GamesTable();
    }
    
    use RequestJson;
    
    public function start_game(){
        $data = $this->get_request_json();
        $last_id['GameID'] = $this->db->insert_game($data->UserID, 'active');
        echo json_encode($last_id);
    }

    public function set_move(){

    }
}