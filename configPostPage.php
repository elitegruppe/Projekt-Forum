<?php

$sitename = 'BVZ-Forum';
$kategorie = 'Vorerst ein Platzf&uumlller f&uumlr die Kategorie'

//require_once('/db/dbModel.php')

//$db = new dbModel();

//$username = $db->InserUser();

//$db->savePost($post);


?>


<?php
//in diesem PHP wird die Funktion für das Anzeigen der Posts zur Verfügung stellt. 

function getPost() {

	$db = new SQLite3('db/forum.db');

	$results = $db->query('select * from posts;');

	
	while($row = $results->fetchArray()) {
		echo '<pre><code>';
		
		echo '<div class="container center-block">
		<table class="table-responsive">
			<thead>
				<tr>
					<th>User </th>
					<th><td>' . $row['user'] . '&#09&#09&#09&#09&#09 </td></th>
					<th>Datum </th>
					<th><td>' . $row['datum'] . '</td></th>		
				</tr>
			</thead>			
		</table><br><br>';

		//echo '<div class="container center-block">
		echo'<table class="table-responsive">
			<thead>
				<tr>
					<th>Post</th>			
				</tr>		
			</thead>
			<tbody>';						
				echo '<tr>';
				echo '<td>' . $row['post'] . '</td>';
				echo '</tr>';					
			echo '		
			</tbody>
		</table>
	</div>';
	
	echo '</code></pre>';
	}
}

?>


<?php

include "PostPage.php";

?>