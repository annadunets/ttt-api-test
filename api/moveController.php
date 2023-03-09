<?php

include_once('database.php');
include_once('controllerTraits.php');


class MoveController{

    public function __construct() {
        $this->db = new MovesTable();
    }

    use RequestJson;
    
    public function save_move(){
        $data = $this->get_request_json();
        $game_id = $_GET['GameID'];
        $x_or_0 = $this->define_next_move($game_id, $data->Row, $data->Column);
        if($x_or_0 == null){
            echo('This cell is already used');
            return;
        }
        $moves['id'] = $this->db->insert_move($game_id, $data->Row, $data->Column, $x_or_0);
        $moves['x_or_0'] =  $x_or_0;
        echo json_encode($moves);
    }

    public function define_next_move($game_id, $row, $column){
        $all_moves =$this->db->get_all_moves($game_id);

        $x_or_0 = null;

        foreach($all_moves as $move) {
            if ($move['Row_num'] == $row && $move['Column_num'] == $column){
                return $x_or_0;
            }
        }

        

        if(count($all_moves) % 2 == 0){
            # Number of moves is even, it is a time for X"
            $x_or_0 = 'X'; 
        }else{
            # Number of moves is odd, it is a time for 0"
            $x_or_0 = "0";
        }
        return $x_or_0;
    }

    public function get_all_moves(){
        $game_id = $_GET['GameID'];
        $all_moves =$this->db->get_all_moves($game_id);
        echo json_encode($all_moves);
    }



}