<?php

class Settings
{

    public static function hasSteam($id)
    {
        //check to see if the user is an admin
        if (DatabaseConnector::query('SELECT steam_id_64 FROM profiles WHERE user_id=:id', array(':id' => $id))[0]['steam_id_64'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function getUsername($id)
    {
        //check to see if the username is set then using the given $id. else return false.
        if (DatabaseConnector::query('SELECT username FROM users WHERE id=:id', array(':id' => $id))[0]['username']) {
            //return username
            return DatabaseConnector::query('SELECT username FROM users WHERE id=:id', array(':id' => $id))[0]['username'];
        } else {
            return false;
        }
    }

    public static function getUserId($username)
    {
        //grabs the userid of the given username $id. else return false.
        if (DatabaseConnector::query('SELECT id FROM users WHERE username=:username', array(':username' => $username))[0]['id']) {
            //return username
            return DatabaseConnector::query('SELECT id FROM users WHERE username=:username', array(':username' => $username))[0]['id'];
        } else {
            return false;
        }
    }

}


