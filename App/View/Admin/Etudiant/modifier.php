<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/25/16
 * Time: 1:28 PM
 */
include __DIR__.'/../../header.php';
?>
<div class="container">
<form action="" method="post">

    <input type="number" name="cin" placeholder="cin" disabled value="<?php echo $etudiant['cin']?>"><br>
    <input type="text" name="nom" placeholder="nom" value="<?php echo $etudiant['nom']?>"><br>
    <input type="text" name="prenom" placeholder="prenom" value="<?php echo $etudiant['prenom']?>"><br>
    <input type="date" name="dn" value="<?php echo $etudiant['dn'] ?>"><br>

    <select name="sexe" id="">
        <option <?php if($etudiant['sexe']=="femme") echo 'selected';?> value="femme">femme</option>
        <option <?php if($etudiant['sexe']=="homme") echo 'selected';?> value="homme">homme</option>
    </select><br>
    <select name="section" id="">
        <?php
        foreach($sections as $section){
            ?>

            <option <?php if($etudiant['id_section']==$section['id']) echo 'selected';?>  value="<?php echo $section['id']?>"><?php echo $section['nom']?></option>

            <?php
        }
        ?>
    </select><br>

    <button type="submit">Mettre à jour</button>
</form>
    </div>
</body>
</html>
