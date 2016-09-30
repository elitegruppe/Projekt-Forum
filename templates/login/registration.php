<div class="container">
    <form class="form-signin" action="db/registration.php" method="post">
        <h2 class="form-signin-heading">Account erstellen</h2>
        <label for="username" class="sr-only">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
        <label for="text" pattern=".{5,10}" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Passwort" required>
        <label for="vorname" class="sr-only">Vorname</label>
        <input type="text" name="vorname" id="vorname" class="form-control" placeholder="Vorname" required>
        <label for="nachname" class="sr-only">Nachname</label>
        <input type="text" name="nachname" id="nachname" class="form-control" placeholder="Nachname" required>
        <label for="email" class="sr-only">E-Mail</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail Adresse" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me">Eingeloggt bleiben
            </label>
        </div>
        <div class="text-right">
            <a href="index.php?login=1">Du bist bereits registriert -> Login für Mitglieder</a>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrieren</button>
    </form>
</div>