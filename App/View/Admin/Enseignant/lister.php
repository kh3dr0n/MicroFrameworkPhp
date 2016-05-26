<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/25/16
 * Time: 1:15 PM
 */
include __DIR__.'/../../header.php';
?>
<div class="container">
    <a class="btn" href="<?php URL('/ajouter')?>">Ajouter</a>
    <form action="" method="get" class="floatright">
        <input type="text" name="chercher" value="<?php echo Request::get('chercher')?>">
        <button type="submit">Chercher</button>
    </form>
<table>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date Naissannce</th>
        <th>Grade</th>
        <th></th>
    </tr>
    <?php
    foreach($enseignants as $e){
        ?>
        <tr>
            <td><?php echo $e['nom'] ?></td>
            <td><?php echo $e['prenom'] ?></td>
            <td><?php echo $e['dn'] ?></td>
            <td><?php echo $e['grade'] ?></td>
            <td><a href="<?php URL($e['id'])?>">Liste des maitere</a></td>
            <td><a href="<?php URL($e['id'])?>/supprimer">Supprimer</a></td>
        </tr>
    <?php
    }
    ?>
</table>
</div>
</body>
</html>
