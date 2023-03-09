<?php

include_once('database.php');
include_once('controllerTraits.php');

class MoveController{
    use RequestJson;
    
    public function define_move(){
        $data = $this->get_request_json();
        $moves = $this->db->insert_move($data->GameID, $data->Row, $data->Column);
        echo json_encode($moves);
    }

}