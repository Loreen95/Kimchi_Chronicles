<?php


$id = $_GET['ingredient_edit_id'];
$ingredient = findIngredientById($id);
if (is_post_request()) {
    $ingredientName = !empty($_POST['name']) ? $_POST['name'] : $ingredient['name'];
    $edit = editIngredient($ingredientName, $id);
}
?>
<div class="formcontainer">
    <?php
    if (isset($error)) { ?>
        <div class="errors">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="post">
        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" id="ingredient" name="name" value="<?php echo $ingredient['name'] ?>">
        </div>
        <input class="input-field" type="submit">
    </form>
</div>