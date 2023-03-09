<?php

include_once('userController.php');
include_once('gameController.php');

if(strpos($_GET['path'], 'user') !== false){
    $user = new UserController();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user->set_user();
    }elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
        $user->get_user();
    }
}

if(strpos($_GET['path'], 'game/move') !== false){
    $move = new MoveController();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $move->define_move();
    }
}elseif(strpos($_GET['path'], 'game') !== false){
    $game = new GameController();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $game->start_game();
    }
}

