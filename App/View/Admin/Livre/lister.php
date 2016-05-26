<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/25/16
 * Time: 11:30 AM
 */
/*var_dump($livres);*/
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
        <th>Titre</th>
        <th>Autheur</th>
        <th>Theme</th>
        <th>Anneé</th>
        <th></th>
    </tr>
    <?php
    foreach($livres as $livre){
    ?>
        <tr>
            <td><?php echo $livre['titre'] ?></td>
            <td><?php echo $livre['auteur'] ?></td>
            <td><?php echo $livre['theme'] ?></td>
            <td><?php echo $livre['annee'] ?></td>
            <td>
                <?php
                $id = $livre['id'];
                if(\Model\Emprin::where("id_livre = $id  and etat !='disponible'") == null){
                    ?>
                    <a href="<?php URL("/".$id."/emprint") ?>">Emprinter</a>
                    <?php
                }else{
                    ?>
                    <a href="<?php URL("/".$id."/retourner") ?>">Retourner</a>
                <?php
                }
                ?>

            </td>
        </tr>
    <?php
    }
    ?>
</table>
    </div>
</body>
</html>
