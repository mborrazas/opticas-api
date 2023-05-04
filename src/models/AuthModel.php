<?php

class AuthModel
{

    function auth($user, $password)
    {
        
        $db = new db();
        $db = $db->connectionDB();
        $sql = "SELECT * FROM crystal.usuarios where ci=".$user." AND password=".$password."";
        
        $result = $db->query($sql);
        $auth = null;
        if ($result->rowCount() > 0) {
            $auth =  $result->fetchAll(PDO::FETCH_OBJ);
        }
        $result = null;
        $db = null;
        return $auth;
    }
}
