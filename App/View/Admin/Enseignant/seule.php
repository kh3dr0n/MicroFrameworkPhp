<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/26/16
 * Time: 8:00 AM
 */
include __DIR__.'/../../header.php';

?>
<div class="container">
    <h3>Liste de Maitere de <?php echo $ens['nom'].' '.$ens['prenom']?></h3>
    <form action="" method="post">
        <select name="matiere" id="">
            <?php foreach($matiere as $key=>$m){?>
            <optgroup label="<?php echo $key?>">
                <?php
                foreach($m as $s){
                    print_r($s);
                    ?>
                    <option value="<?php echo $s['id']?>"><?php echo $s['nom']?></option>
                    <?php
                }
                ?>
            </optgroup>
            <?php } ?>
        </select>
        <button type="submit">Ajouter</button>
    </form>
    <?php
    foreach($enseignanements as $enseignanement){
        echo "<h4>". \Model\Matiere::get($enseignanement['id_matiere'])['nom']."</h4>";
    }
    ?>
    </div>
</body>
</html>