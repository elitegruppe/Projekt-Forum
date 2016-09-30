<?php
//require_once('forumModel.php');
require_once(__DIR__ . '/../../db/forumModel.php');
$db = new forumModel();
?>

<!-- EingabeMaske -->
<div class="container">
    <form id="myform" method="post" action="db/forum.php">
        <div class="form-group">
            <label for="category">Kategorie</label>
            <select name="categoryid" class="form-control" id="category" required>
                <option value="hardware">Hardware</option>
                <option value="software">Software</option>
                <option value="computerspiele">Computerspiele</option>
                <option value="diverses">Diverses</option>          
            </select>
        </div>
        <div class="form-group">
            <label for="title">Titel</label>
            <input type="text" class="form-control" id="title" placeholder="Title" required
                   name="title">
        </div>
        <div class="form-group">
            <label for="post">Post</label>
            <textarea class="form-control editor" id="post" placeholder="Post" name="post"></textarea>
        </div>
        <button value="posten" name="posten" type="submit" class="btn btn-default">Posten</button>
        <button value="filtern" name="filtern" type="submit" class="btn btn-default">Filtern</button>
    </form>
    <br>
</div>
<div class="container">
    <!-- EndeEingabeMaske -->
    <!-- AnzeigePosts -->
    <?php
    $results = $db->getPost();
    while ($row = $results->fetchArray()) {
        echo '<pre><code>';
        echo '<div class="container center-block">';
        echo '<table class="table-responsive table-bordered" style="width: 100%">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>User </th>';
        echo '<th><td>' . $row['user'] . '&#09&#09&#09&#09&#09 </td></th>';
        echo '<th class="text-right">Datum </th>';
        echo '<th><td>' . $row['datum'] . '</td></th>';
        echo '</tr>';
        echo '</thead>';
        echo '</table><br><br>';

        echo '<table class="table-responsive table-bordered" style="width: 100%">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>' . $row['titel'] . '</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>' . $row['post'] . '</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</code></pre>';
    }
    ?>
</div>
