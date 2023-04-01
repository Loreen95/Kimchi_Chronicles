<?php
$result = allRecipes()

?>

<table class="tabel">
    <tr>
        <th>#</th>
        <th>Gerechtnaam</th>
        <th>Wijzigen</th>
        <th>Verwijderen</th>
    </tr>
    <?php foreach ($result as $recipe) { ?>
        <tr>
            <td><?php echo $recipe['id']; ?></td>
            <td><?php echo $recipe['title']; ?></td>
            <td><a href="?page=recipe_edit&recipe_edit_id=<?php echo $recipe['id'] ?>" style="color: blue;"><i class="fa-solid fa-pencil"></i></a></td>
            <td><a href="?page=recipe_delete&recipe_delete_id=<?php echo $recipe['id'] ?>" style="color: red;"><i class="fa-solid fa-times"></i></a></td>
        <?php } ?>
        </tr>
</table>