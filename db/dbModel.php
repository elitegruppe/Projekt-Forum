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
    public $username = '';
    public $password = '';
    public $nachname = '';
    public $vorname = '';
    public $email = '';

    public function __construct()
    {
        $this->db = new SQLite3(__DIR__ . '/forum.db');
        $this->username = isset($_POST['username']) ? $_POST['username'] : '';
        $this->password = isset($_POST['password']) ? $_POST['password'] : '';
        $this->nachname = isset($_POST['nachname']) ? $_POST['nachname'] : '';
        $this->vorname = isset($_POST['vorname']) ? $_POST['vorname'] : '';
        $this->email = isset($_POST['email']) ? $_POST['email'] : '';
    }

    public function getUserList()
    {
        $result = $this->db->query("SELECT * FROM user;");
        return $result;
    }

    public function userExists()
    {
        $query = $this->db->prepare("SELECT username from user WHERE username = :username");
        $query->bindValue(':username', $_POST['username']);
        $result = $query->execute();
        return $result->fetchArray();
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
        $query->bindValue(':username', $this->username);
        $query->bindValue(':passwort', $this->password);
        $query->bindValue(':name', $this->nachname);
        $query->bindValue(':vorname', $this->vorname);
        $query->bindValue(':email', $this->email);
        $query->execute();
    }
}