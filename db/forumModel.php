<?php

/**
 * Zeitzone setzen für korrekten Datenbank Eintrag
 */
date_default_timezone_set('Europe/Zurich');

/**
 * Class forumModel
 */
class forumModel
{

    public $db = '';
    public $user = '';
    public $titel = '';
    public $post = '';
    public $datum = '';
    public $categoryid = '';
    public $accept = '';
    public $changeForum = '';

    /**
     * forumModel constructor.
     * Vorbereiten der Datenbankverbindung und setzen der benötigten Variablen
     */
    public function __construct()
    {
        $this->db = new SQLite3(__DIR__ . '/forum.db');
        $this->user = isset($_SESSION['username']) ? $_SESSION['username'] : '';
        $this->titel = isset($_POST['title']) ? $_POST['title'] : '';
        $this->post = isset($_POST['post']) ? $_POST['post'] : '';
        $this->datum = date('Y-m-d H:i:s');
        $this->accept = 1;
        $this->categoryid = isset($_POST['categoryid']) ? $_POST['categoryid'] : '';
    }

    /**
     * @return SQLite3Result
     * Funktion zum holen aller bereits erfassten Post nach Kategorie gefiltert
     */
    // ToDo Das Switch Case Statment sollte aus dem Model ausgelagert werden und die reine Rückgabe von Daten ralisiert werden
    public function getPost()
    {

        $this->changeForum = isset($_POST['categoryid']) ? $_POST['categoryid'] : '';

        switch ($this->changeForum) {
            case 'hardware':
                $results = $this->db->query('select * from posts where themen = "hardware" and accept = 1;');
                return $results;
                break;

            case 'software':
                $results = $this->db->query('select * from posts where category = "software";');
                return $results;
                break;

            case 'computerspiele':
                $results = $this->db->query('select * from posts where category = "computerspiele" and accept = 1;');
                return $results;
                break;

            case 'diverses':
                $results = $this->db->query('select * from posts where category = "diverses";');
                return $results;
                break;

            default:
                $results = $this->db->query('select * from posts where category = "hardware" and accept = 1;');
                return $results;
                break;

                return $results;
        }
    }

    /**
     * Fügt einen neuen Post in die Datenbank ein
     */
    public function insertPost()
    {

        $query = $this->db->prepare("INSERT INTO 
   	                                    posts (
      	                                 user,
         	                              titel, 
            	                           post, 
               	                        datum, 
                  	                     category,
                  	                     accept)
   	               		               VALUES (
      					   	              :user,
      					      	           :titel, 
                              	        :post,
                                 	     :datum, 
                                    	  :category,
                                    	  :accept);");
        $query->bindValue(':user', $this->user);
        $query->bindValue(':titel', $this->titel);
        $query->bindValue(':post', $this->post);
        $query->bindValue(':datum', $this->datum);
        $query->bindValue(':category', $this->categoryid);
        $query->bindValue(':accept', $this->accept);
        $query->execute();

    }
}

?>