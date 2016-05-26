<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/25/16
 * Time: 8:42 PM
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
        <th>CIN</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date de naissonce</th>
        <th>Sexe</th>
        <th>Section</th>
        <th></th>
    </tr>
    <?php
    foreach($etudiants as $etudiant){
        ?>

        <tr>
            <td><a href="/etudiant/<?php echo $etudiant['cin']; ?>"><?php echo $etudiant['cin']?></a></td>
            <td><a href="/etudiant/<?php echo $etudiant['cin']; ?>"><?php echo $etudiant['nom']?></a></td>
            <td><a href="/etudiant/<?php echo $etudiant['cin']; ?>"><?php echo $etudiant['prenom']?></a></td>
            <td><a href="/etudiant/<?php echo $etudiant['cin']; ?>"><?php echo $etudiant['dn']?></a></td>
            <td><a href="/etudiant/<?php echo $etudiant['cin']; ?>"><?php echo $etudiant['sexe']?></a></td>
            <td><a href="/section/<?php echo $etudiant['id_section']; ?>"><?php echo \Model\Section::get($etudiant['id_section'])['nom'] ?></a></td>
            <td><a href="/etudiant/<?php echo $etudiant['cin']; ?>/modifer">Modifier</a></td>

        </tr>

        <?php
    }
    ?>
</table>
</div>
</body>
</html>
