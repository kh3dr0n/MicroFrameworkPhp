<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/24/16
 * Time: 10:12 PM
 */

include __DIR__.'/../../header.php';
?>

<div class="container">
<h1>Liste de maitere de <?php echo $section['nom']?></h1>

<form action="/section/<?php echo $section['id']?>/matiere" method="post">
    <input type="text" name="matiere" placeholder="Nom de matiere">
    <input type="number" name="coefficient" placeholder="coefficient de matiere">
    <button type="submit">Ajouter</button>
</form>

<table>
    <tr>
        <th>Nom</th>
        <th>Coefficient</th>
    </tr>
    <?php

    foreach($matieres as $matiere){
        ?>
        <tr>
            <td><?php echo $matiere['nom']?></td>
            <td><?php echo $matiere['coefficient']?></td>
        </tr>
    <?php

    }
    ?>
</table>
    </div>
</body>
</html>
