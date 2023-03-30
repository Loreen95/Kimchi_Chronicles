<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Instructies toevoegen";

$result = allRecipes();

$id = $_SESSION['id'];

if (is_post_request()) {
    $recipe = [];
    $recipe['recipe_id'] = $_POST['recipe'] ?? '';
    $recipe['steps'] = $_POST['steps'] ?? '';

    $instruction = addInstructions($recipe);
}
?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>
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
            <select class="course" name="recipe" required>
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
            <textarea class="input-field" name="steps" required></textarea>
        </div>

        <input class="input-field" type="submit">
    </form>
</div>

<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>