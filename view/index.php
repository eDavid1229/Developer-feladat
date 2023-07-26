<?php
    require dirname(__DIR__)."/model/database.php";
    require dirname(__DIR__)."/model/advertisements.php";
    require dirname(__DIR__)."/model/user.php";

    $advertisement_id = filter_input(INPUT_POST, 'advertisements_id', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
    if(!$user_id){
        $user_id = filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);

    }

    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if(!$action){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if(!$action){
            $action = 'list_advertisements';
        }
    }

    switch($action){
        default:
          //  $name = getName($user_id);
            $users = getUsers();
            $advertisements = getAdvertisementsByUser($user_id);
            include('view/advertisementlist.php');
    }


