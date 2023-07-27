<?php

function getAdvertisementsByUser($user_id){
    global $db;
    if($user_id){
        $query = 'SELECT A.ID, A.title, C.name FROM advertisements A LEFT JOIN users C ON A.userID = C.userID WHERE A.userID = :user_id ORDER BY A.ID';
    } else{
        $query = 'SELECT A.ID, A.title, C.name FROM advertisements A LEFT JOIN users C ON A.userID = C.userID ORDER BY C.userID';
    }
    $statement = $db->prepare($query);
    if ($user_id){
        $statement ->bindValue(' :user_id', $user_id);
    }
    $statement->execute();
    $advertisements = $statement->fetchAll();
    $statement->closeCursor();
    return $advertisements;
}

function deleteAdvertisements($advertisement_id){
    global $db;
    $querry = 'DELETE FROM advertisements WHERE ID = :adver_id';
    $statement = $db->prepare($query);
    $statement ->bindValue(' :adver_id', $advertisement_id);
    $statement->execute();
    $statement->closeCursor();
}
function addAdvertisements($user_id, $title){
    global $db;
    $query = 'INSERT INTO advertisements (title, userID) VALUES (:title, :userID)';
    $statement = $db->prepare($query);
    $statement ->bindValue(' :title', $title);
    $statement ->bindValue(' :userID', $user_id);
    $statement->execute();
    $statement->closeCursor();
}
