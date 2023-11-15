<?php

class Settings
{

    public static function hasSteam($id)
    {
        //check to see if the user is an admin
        if (DatabaseConnector::query('SELECT steam_id_64 FROM profiles WHERE user_id=:id', array(':id' => $id))[0]['steam_id_64']) {
            return DatabaseConnector::query('SELECT steam_id_64 FROM profiles WHERE user_id=:id', array(':id' => $id))[0]['steam_id_64'];
        } else {
            return false;
        }
    }

    public static function resizeImage($file, $width, $height)
    {
        list($w, $h) = getimagesize($file);
        /* calculate new image size with ratio */
        $ratio = max($width/$w, $height/$h);
        $h = ceil($height / $ratio);
        $x = ($w - $width / $ratio) / 2;
        $w = ceil($width / $ratio);
        /* read binary data from image file */
        $imgString = file_get_contents($file);
        /* create image from string */
        $image = imagecreatefromstring($imgString);
        $tmp = imagecreatetruecolor($width, $height);
        imagecopyresampled($tmp, $image,
        0, 0,
        $x, 0,
        $width, $height,
        $w, $h);
        imagejpeg($tmp, $file, 100);
        return $file;
        /* cleanup memory */
        imagedestroy($image);
        imagedestroy($tmp);
    }


    public static function updateAvatar($avatar, $userId) {

        return DatabaseConnector::updateData(
            "profiles", 
            "avatar = :avatar", 
            "user_id = :userId", 
            array(':avatar' => $avatar, ':userId' => $userId)
        );
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


