<?php

/**
 * Created by PhpStorm.
 * User: sonic
 * Date: 28.09.16
 * Time: 10:52
 */
class dbModel
{
    public $db = '';

    public function __construct()
    {
        $this->db = new SQLite3('forum.db');

    }


    public function getUserList()
    {
        $result = $this->db->query("SELECT * FROM user;");
        return $result;
    }

    public function getUser()
    {
        $query = $this->db->prepare("SELECT username from user WHERE username = :username");
        $query->bindValue(':username', $_POST['username']);
        $result = $query->execute();
        $exists = $result->fetchArray();
       return $exists;
    }

    public function insertUser()
    {
        $query = $this->db->prepare("INSERT INTO 
                                        user (
                                        username, 
                                        passwort, 
                                        name, 
                                        vorname, 
                                        email) 
                                      VALUES (
                                      :username, 
                                      :passwort,
                                      :name, 
                                      :vorname, 
                                      :email);");
        $query->bindValue(':username', $_POST['username']);
        $query->bindValue(':passwort', $_POST['password']);
        $query->bindValue(':name', $_POST['nachname']);
        $query->bindValue(':vorname', $_POST['vorname']);
        $query->bindValue(':email', $_POST['email']);
        $query->execute();
    }
}