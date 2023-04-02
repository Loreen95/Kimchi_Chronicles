<?php
$id = $_SESSION['id'];
$recipes = findRecipesByAuthor($id);
?>

<table class="tabel">
    <tr>
        <th>#</th>
        <th>Gerechtnaam</th>
        <th>Wijzigen</th>
        <th>Verwijderen</th>
    </tr>
    <?php foreach ($recipes as $recipe) { ?>
        <tr>
            <td><?php echo $recipe['id']; ?></td>
            <td><?php echo $recipe['title']; ?></td>
            <td><a href="?page=user_recipes_edit&user_recipes_edit_id=<?php echo $recipe['id'] ?>" style="color: blue;"><i class="fa-solid fa-pencil"></i></a></td>
            <td><a href="?page=user_recipes_delete&user_recipes_delete_id=<?php echo $recipe['id'] ?>" style="color: red;"><i class="fa-solid fa-times"></i></a></td>
        </tr>
    <?php } ?>
</table>