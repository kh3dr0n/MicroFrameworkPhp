<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/25/16
 * Time: 7:48 PM
 */?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav class="left">
            <?php
            if(Auth::hasRole("admin")){?>
                <a href="/etudiant">Liste Etudiant</a>
                <a href="/livre">Liste Livre</a>
                <a href="/enseignant">Liste Enseignant</a>
                <a href="/section">Liste Section</a>
            <?php
            }
            ?>

            <?php
            if(Auth::hasRole("bib")){?>
                <a href="/livre">Liste Livre</a>
                <?php
            }
            ?>
            <?php
            if(Auth::hasRole("etudiant")){?>
            <a href="/notes">Liste notes</a>
            <?php
            }
            ?>



        </nav>
        <nav class="right">
            <a href="/logout">Déconnection</a>
        </nav>
    </header>