<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<form class="connecterbox" action="/connecter" method="post">
    <h3>Se connecter</h3>
    <input type="text" name="login" placeholder="utlisateur"><br>
    <input type="password" name="password" placeholder="Mot de passe"><br>
    <select name="role" id="">
        <option value="admin">Administrateur</option>
        <option value="bib">Bibliothécaires</option>
        <option value="etudiant">Etudiant</option>
    </select>
    <center><button type="submit">Se connecter</button></center>
</form>
</body>
</html>