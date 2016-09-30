<?php
date_default_timezone_set('Europe/Zurich');
class forumModel
{

    public $db = '';
    public $user = '';
    public $titel = '';
    public $post = '';
    public $datum = '';
    public $categoryid = '';
    public $accept2 = '';
    public $changeForum = '';


    public function __construct()
    {
        $this->db = new SQLite3(__DIR__ .'/forum.db');
        $this->user = isset($_SESSION['username']) ? $_SESSION['username'] : '';
        $this->titel = isset($_POST['title']) ? $_POST['title'] : '';
        $this->post = isset($_POST['post']) ? $_POST['post'] : '';
        $this->datum = date('Y-m-d H:i:s');
        $this->accept2 = 1;
        $this->categoryid = isset($_POST['categoryid']) ? $_POST['categoryid'] : '';
    }


    public function getPost()
    {

        $this->changeForum = isset($_POST['categoryid']) ? $_POST['categoryid'] : '';    	
    	
    		switch($this->changeForum) {
    			case 'Hardware':
    				$results = $this->db->query('select * from posts where category = "hardware" and accept2 = 0;');
        			return $results;
        			break;
        	
        		case 'Software':
        			$results = $this->db->query('select * from posts where category = "software";');
        			return $results;
        			break;
        		
        		case 'Computerspiele':
        			$results = $this->db->query('select * from posts where category = "computerspiele";');
        			return $results;
        			break;
        		
        		case 'Diverses':
	        		$results = $this->db->query('select * from posts where category = "diverses";');
   	     		return $results;
      	  		break;
        		
        		default:
        			$results = $this->db->query('select * from posts where category = "hardware" and accept2 = 0;');
        			return $results;
        			break;
        		
        	return $results;
        }


    }

    
    public function insertPost()
    {

        $query = $this->db->prepare("INSERT INTO 
   	                                    posts (
      	                                 user,
         	                              titel, 
            	                           post, 
               	                        datum, 
                  	                     category,
                  	                     accept2)
   	               		               VALUES (
      					   	              :user,
      					      	           :titel, 
                              	        :post,
                                 	     :datum, 
                                    	  :category,
                                    	  :accept2);");
        $query->bindValue(':user', $this->user);
        $query->bindValue(':titel', $this->titel);
        $query->bindValue(':post', $this->post);
        $query->bindValue(':datum', $this->datum);
        $query->bindValue(':category', $this->categoryid);
        $query->bindValue(':accept2', $this->accept2);
        $query->execute();

    }
    
    
	   
}

?>