<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/25/16
 * Time: 10:14 AM
 */

include __DIR__.'/../header.php';
?>

<div class="container">

    <table>
        <tr>
            <th>Matiere</th>
            <th>Cofficient</th>
            <th>Type</th>
            <th>Valeur</th>
        </tr>
        <?php
        foreach($notes as $note){
            ?>
            <tr>
                <td><?php echo \Model\Matiere::get($note['id_matiere'])['nom'] ?></td>
                <td><?php echo \Model\Matiere::get($note['id_matiere'])['coefficient'] ?></td>
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
