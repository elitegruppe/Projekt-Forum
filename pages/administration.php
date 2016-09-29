<?php
require_once(__DIR__ . '/../db/dbModel.php');
$db = new dbModel();

$result = $db->getUserList();
?>
<div class="container">
    <h2 class="lead blog-description">Registered Users</h2>
    <table class="table-responsive container table-striped">
        <thead>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Name</th>
            <th>Vorname</th>
            <th>E-Mail</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($item = $result->fetchArray()) {
            echo '<tr>';
            echo '<td>' . $item['username'] . '</td>';
            echo '<td>' . $item['passwort'] . '</td>';
            echo '<td>' . $item['name'] . '</td>';
            echo '<td>' . $item['vorname'] . '</td>';
            echo '<td>' . $item['email'] . '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>