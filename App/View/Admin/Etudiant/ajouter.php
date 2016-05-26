<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/25/16
 * Time: 9:28 AM
 */

include __DIR__.'/../../header.php';
?>
<div class="container">

<form action="" method="post">

    <input type="number" name="cin" placeholder="cin"><br>
    <input type="text" name="nom" placeholder="nom"><br>
    <input type="text" name="prenom" placeholder="prenom"><br>
    <input type="date" name="dn"><br>

    <select name="sexe" id="">
        <option value="femme">femme</option>
        <option value="homme">homme</option>
    </select><br>
    <select name="section" id="">
        <?php
        foreach($sections as $section){
            ?>

            <option value="<?php echo $section['id']?>"><?php echo $section['nom']?></option>

            <?php
        }
        ?>
    </select><br>

    <button type="submit">Ajouter</button>
</form>
    </
</body>
</html>
