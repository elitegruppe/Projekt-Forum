<?php
/**
 * Created by PhpStorm.
 * User: sonic
 * Date: 27.09.16
 * Time: 23:31
 */

$db = new SQLite3('forum.db');

$result = $db->query("SELECT * FROM user");

?>
<div class="container center-block">
    <h2>Registered Users</h2>
    <p>List of already registered Users</p>
    <table class="table-responsive">
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