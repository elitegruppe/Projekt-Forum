<?php
require_once(__DIR__ . '/../db/dbModel.php');
//require_once('db/dbModel.php');
$db = new dbModel();


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
        $result = $db->getUserList();
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
<br>
<div class="container">
    <h2 class="lead blog-description">Beiträge</h2>
    <table class="table-responsive container table-striped">
        <thead>
        <tr>
            <th>Username</th>
            <th>Kommentar</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $result = $db->getpostlist();
        while ($item = $result->fetchArray()) {
            echo '<tr>';
//            echo '<td>' . @$item['username'] . '</td>';
            echo '<td>Testuser</td>';
            echo '<td>' . @$item['post'] . '</td>';
            echo '<td>';
            echo '<div class="widget">';
            echo '<input id="accept" type="submit" value="akzeptieren">';
            echo '<a href="accept"></a>';
            echo '<input id="denied" type="submit" value="verweigern">';
            echo '<a href="denied"></a></div>';
            echo '</td>';
            echo '</tr>';
        }
        ?>

        <script type="text/javascript">
            document.getElementById("accept").onclick = function () {
                ;
            };
        </script>
        <script type="text/javascript">
            document.getElementById("denied").onclick = function () {
                location.href = "http://www.google.ch";
            };
        </script>
        </tbody>
    </table>
</div>