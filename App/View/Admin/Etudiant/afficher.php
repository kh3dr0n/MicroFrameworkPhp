<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/25/16
 * Time: 10:14 AM
 */

include __DIR__.'/../../header.php';
?>

<div class="container">

<form action="<?php url('/note')?>" method="post">
    <select name="matiere" id="">
        <?php foreach($matieres as $matiere){
         ?>
            <option value="<?php echo $matiere['id']?>"><?php echo $matiere['nom']?></option>
        <?php
        }
        ?>
    </select>
    <select name="type" id="">
        <option value="ds">DS</option>
        <option value="examen">Examen</option>
        <option value="tp">TP</option>
    </select>
    <input type="text" name="valeur">
    <button type="submit">Ajouter Note</button>
</form>
    <table>
        <tr>
            <th>Matiere</th>
            <th>Type</th>
            <th>Valeur</th>
        </tr>
        <?php
        foreach($notes as $note){
            ?>
            <tr>
                <td><?php echo \Model\Matiere::get($note['id_matiere'])['nom'] ?></td>
                <td><?php echo $note['type'] ?></td>
                <td><?php echo $note['valeur'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    </div>
</body>
</html>
