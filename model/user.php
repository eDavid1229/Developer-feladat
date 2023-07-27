<?php

function getUsers(){
    global $db;
    $query = 'SELECT * FROM users ORDER BY userID';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}

function getUsersName($user_id){
    if(!$user_id){
        return "ALL Users";
    }
    global $db;
    $query ='SELECT * FROM users WHERE userID = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    $Name = $user['name'];
    return $Name;
}

function deleteUser($user_id){
    global $db;
    $query ='DELETE * FROM users WHERE userID = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
}

function addUser($Name){
    global $db;
    $query = 'INSERT INTO users (name) VALUES (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $Name);
    $statement->execute();
    $statement->closeCursor();
}