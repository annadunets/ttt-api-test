<?php

// Create connection
$user = 'root';
$pass = 'qwerty';
$dbh = new PDO('mysql:host=manta_mysql;dbname=ttt', $user, $pass);

class UsersTable{
    public function insert_user($username){
        global $dbh;
        $sql = "INSERT INTO Users (UserName) VALUES (?)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$username]);
        return $dbh->lastInsertId();
    }

    public function get_user($user_id){
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Users WHERE UserID = ?');
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();
        return $user;
    }
}

class GamesTable{
    public function insert_game($user_id, $status){
        global $dbh;
        $sql = "INSERT INTO Games (UserID, Status) VALUES (?,?)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$user_id, $status]);
        return $dbh->lastInsertId();
    }
}

class MovesTable{
    public function insert_move($game_id, $row, $column, $x_or_0){
        global $dbh;
        $sql = "INSERT INTO Moves (GameID, Row_num, Column_num, X_or_0) Values (?,?,?,?)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$game_id, $row, $column, $x_or_0]);
        return $dbh->lastInsertId();
    }

    public function get_all_moves($game_id){
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Moves WHERE GameID = ?');
        $stmt->execute([$game_id]);
        $moves = $stmt->fetchAll();
        return $moves;
    }

}
 