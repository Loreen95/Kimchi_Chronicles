<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Ingrediënten toevoegen";

$result = allRecipes();
$id = $_SESSION['id'];

if (is_post_request()) {
    $ingredientName = $_POST['ingredientName'];
    $recipeId = $_POST['recipeid'];
    $ingredientAmount = $_POST['ingredientAmount'];


    $result = addIngredient($ingredientName, $recipeId, $ingredientAmount);
    // if (!isset($recipe_id) || empty($recipe_id)) {
    //     $error = "Error: Recipe ID is not set or empty";
    // } else {
    //     $result = addIngredient($ingredients);
    // }
}
?>



<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>

<div class="formcontainer">
    <h2 class="registerTitle">Ingrediënten toevoegen</h2>

    <?php
    if (isset($error)) { ?>
        <div class="errors">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="post">
        <div class="input-icons">
            <select class="course" name="recipeid" required>
                <option value="" disabled selected>Selecteer het gerecht</option>
                <?php foreach ($result as $step) {
                    if ($step['author'] == $_SESSION['id']) { ?>
                        <option value="<?php echo $step['id'] ?>"><?php echo $step['title']; ?></option>
                <?php }
                } ?>
            </select>
        </div>
        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" name="ingredientName" placeholder="Naam">
        </div>
        <div class="input-icons">
            <input class="input-field" type="text" name="ingredientAmount" placeholder="Hoeveelheid: 1 wortel of 250 gram">
        </div>
        <input class="input-field" type="submit">
    </form>
</div>


<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>