<?php

$sitename = 'BVZ-Forum';
$kategorie = 'Vorerst ein Platzf&uumlller f&uumlr die Kategorie'

//require_once('/db/dbModel.php')

//$db = new dbModel();

//$username = $db->InserUser();

//$db->savePost($post);


?>


<?php

class forumModel{

	public $db = '';
	public $user = '';
	public $titel = '';
	public $post = '';
	public $datum = '';
	public $category = '';


	function __construct(){
		$this->db = new SQLite3('db/forum.db');		
		$this->user = isset($_POST['user']) ? $_POST['user'] : '';
		$this->titel = isset($_POST['titel']) ? $_POST['titel'] : '';
		$this->post = isset($_POST['post']) ? $_POST['post'] : '';
		$this->datum = isset($_POST['datum']) ? $_POST['datum'] : '';
		$this->category = isset($_POST['categroy']) ? $_POST['category'] : '';
	}


	function getPost() {

		$results = $this->db->query('select * from posts;');
		return $results;
	
	
	}



	function insertPost() {	
	
		$query = $this->db->prepare("INSERT INTO 
   	                                    posts (
      	                                 user,
         	                              titel, 
            	                           post, 
               	                        datum, 
                  	                     category)
   	               		               VALUES (
      					   	              :user,
      					      	           :titel, 
                              	        :post,
                                 	     :datum, 
                                    	  :category);");
		$query->bindValue(':user', $this->user);
		$query->bindValue(':titel', $this->titel);
	   $query->bindValue(':post', $this->post);
   	$query->bindValue(':datum', $this->datum);
   	$query->bindValue(':category', $this->category);
   	$query->execute();
        
	}

}
?>


<?php

include "PostPage.php";

?>