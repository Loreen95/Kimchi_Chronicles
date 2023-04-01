<?php
$result = allIngredients();

?>

<table class="tabel">
    <tr>
        <th>Ingrediënt</th>
        <th>Wijzigen</th>
        <th>Verwijderen</th>
    </tr>
    <?php foreach ($result as $ingredient) { ?>
        <tr>
            <td><?php echo $ingredient['name']; ?></td>
            <td><a href="?page=ingredient_edit&ingredient_edit_id=<?php echo $ingredient['id'] ?>" style="color: blue;"><i class="fa-solid fa-pencil"></i></a></td>
            <td><a href="?page=ingredient_delete&ingredient_delete_id=<?php echo $ingredient['id'] ?>" style="color: red;"><i class="fa-solid fa-times"></i></a></td>
        <?php } ?>
        </tr>
</table>