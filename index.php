<?php
/**
 * Session starten
 */
session_start();
$_SESSION['ID'] = isset($_SESSION['ID']) ? $_SESSION['ID'] : session_unset();

/**
 * Für jede Seite soll hier eine die Headervorlage geladen werden
 */
include __DIR__ . '/templates/layout/header.php';

/**
 * Die Variablen für das Einbinden der angefragten Seite wird hier gesetzt. Ein Default Wert wurde im Switch Case unten
 * definiert.
 */
$page = isset($_GET['page']) ? $_GET['page'] : '';
$logout = isset($_GET['logout']) ? $_GET['logout'] : '';

/**
 * Wird der Logout Link gedrückt wird die Session beendet und es erfolgt ein Refresh der Seite
 */
if ($logout == true) {
    session_destroy();
    $_GET['logout'] = false;
    header("Refresh:0; url=index.php");
}

/**
 * Prüfung um direkt die Login Maske auszurufen
 */
function login()
{
    if (!isset($_SESSION['ID'])) {
        $login = isset($_GET['login']) ? $_GET['login'] : '';
        if ($login == '1') {
            include __DIR__ . '/templates/login/login.php';
        } else {
            include __DIR__ . '/templates/login/registration.php';
        }
    }
}

/**
 * Switch Case um die verschiedenen Inhalte zu laden, gestützt auf der Angabe der page GET Variabel.
 * Wird auch in Kombination mit der Navbar verwendet (Navbar wird dynamisch generiert)
 */
switch ($page) {
    case 'home':
        include __DIR__ . '/pages/home.php';
        login();
        break;
    case 'forum':
        include __DIR__ . '/pages/forum.php';
        include __DIR__ . '/templates/forum/forum.php';
        break;
    case 'about':
        include __DIR__ . '/pages/about.php';
        break;
    case 'administration':
        include __DIR__ . '/pages/administration.php';
        break;
    default:
        include __DIR__ . '/pages/home.php';
        login();
}

/**
 * Footer einbinden damit jede Seite abgeschlossen ist.
 */
include __DIR__ . '/templates/layout/footer.php';