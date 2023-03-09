<?php

trait RequestJson {
    public function get_request_json(){
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        return $data;
    }
}