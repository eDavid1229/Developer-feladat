<?php
    require dirname(__DIR__)."/model/database.php";
    require dirname(__DIR__)."/model/advertisements.php";
    require dirname(__DIR__)."/model/user.php";

    $advertisement_id = filter_input(INPUT_POST, 'advertisement_id', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $Name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

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
        case "list_users":
            $users = getUsers();
            require dirname(__DIR__)."/view/userlist.php";
            break;
        case "add_user":
            addUser($Name);
            header("Location: .?action=list_users");
            break;
        case "add_advertisement":
                if($user_id && $title) {
                    addAdvertisement($user_id, $title);
                    header("Location: .?user_id=$user_id");
                } else {
                    $error = "Helytelen hírdetési adatok. Nézd meg és próbáld meg újból.";
                    require dirname(__DIR__)."/view/error.php";
                    exit();
                }
                break;
        case "delete_user":
            if ($user_id) {
                try {
                    deleteUser($user_id);
                } catch (PDOException $e) {
                    $error = "Nemtudod törölni a felhasználót, mert hozzávan rendelve egy hirdetés.";
                    require dirname(__DIR__)."/view/error.php";
                    exit();
                }
                header("location: .?action=list_users");
            }
            break;
        case "delete_advertisement":
            if($advertisement_id) {
                deleteAdvertisement($advertisement_id);
                header("Location: .?user_id=$user_id");
            } else {
                $error = "Hibás vagy helytelen hírdetés azonosító.";
                require dirname(__DIR__)."/view/error.php";
            }
            break;

        default:
            $name = getUsersName($user_id);
            $users = getUsers();
            $advertisements = getAdvertisementsByUser($user_id);
            require dirname(__DIR__)."/view/advertisementlist.php";
    }


