<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Instructies toevoegen";

$result = allRecipes();

$id = $_SESSION['id'];

if (is_post_request()) {
    $ingredients = $_POST['ingredients'];

    $result = addIngredients($ingredients);
}
?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>
<div id="content">
    <a class="terug-link" href="index.php">&laquo; Terug</a>
</div>

<div class="formcontainer">
    <h2 class="registerTitle">Instructies toevoegen</h2>

    <?php
    if (isset($error)) { ?>
        <div class="errors">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="post">
        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" id="ingredient-1" name="ingredients[]" placeholder="Ingrediënt">
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" id="ingredient-2" name="ingredients[]" placeholder="Ingrediënt">
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" id="ingredient-3" name="ingredients[]" placeholder="Ingrediënt">
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" id="ingredient-4" name="ingredients[]" placeholder="Ingrediënt">
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" id="ingredient-5" name="ingredients[]" placeholder="Ingrediënt">
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" id="ingredient-6" name="ingredients[]" placeholder="Ingrediënt">
        </div>
        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" id="ingredient-7" name="ingredients[]" placeholder="Ingrediënt">
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" id="ingredient-8" name="ingredients[]" placeholder="Ingrediënt">
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" id="ingredient-9" name="ingredients[]" placeholder="Ingrediënt">
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" id="ingredient-10" name="ingredients[]" placeholder="Ingrediënt">
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" id="ingredient-11" name="ingredients[]" placeholder="Ingrediënt">
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" id="ingredient-12" name="ingredients[]" placeholder="Ingrediënt">
        </div>

        <input class="input-field" type="submit">
    </form>
</div>

<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>