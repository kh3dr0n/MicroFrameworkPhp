<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/25/16
 * Time: 12:16 PM
 */
include __DIR__.'/../../header.php';
?>
<div class="container">
<h1><?php echo $livre['titre'] ?></h1>
<form action="" method="post">
    Etudiant :<select name="etudiant" id="">
        <?php
        foreach($etudiants as $etudiant){
            ?>
            <option value="<?php echo $etudiant['cin']?>"><?php echo $etudiant['cin'].': '.$etudiant['nom'].' '.$etudiant['prenom']?></option>

            <?php
        }
        ?>
    </select><br>
    Date : <input type="date" name="date">
    <button type="submit">Emprenter</button>
</form>
    </div>
</body>
</html>
