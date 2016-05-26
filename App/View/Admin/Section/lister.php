<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/24/16
 * Time: 9:44 PM
 */

include __DIR__.'/../../header.php';
?>
<div class="container">

    <form action="" method="get" class="floatright">
        <input type="text" name="chercher" value="<?php echo Request::get('chercher')?>">
        <button type="submit">Chercher</button>
    </form>
<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    foreach($sections as $section){
        ?>
        <tr>
            <td><?php echo $section['id'] ?></td>
            <td><?php echo $section['nom'] ?></td>
            <td><a href="/section/<?php echo $section['id']?>">Liste de matieres</a></td>
            <td><a href="/section/<?php echo $section['id']?>/etudiants">Liste de etudiant</a></td>
            <td><a href="/section/supprimer?id=<?php echo $section['id']?>">Supprimer</a></td>
        </tr>
    <?php
    }
    ?>

</table>

<form action="/section/ajouter" method="post">
    <input type="text" name="section" placeholder="Nom section">
    <button type="submit">Ajouter</button>
</form>
    </div>
</body>
</html>
