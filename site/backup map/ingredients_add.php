<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Recept toevoegen";

$id = $_SESSION['id'];

if (is_post_request()) {
    $ingredient = [];
    $ingredient['name'] = $_POST['name'] ?? '';

    $result = addIngredient($ingredient);
}
?>



<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>

<div class="formcontainer">
    <h2 class="registerTitle">Recept toevoegen</h2>

    <?php
    if (isset($error)) { ?>
        <div class="errors">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="post">
        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" placeholder="Name" name="name" required>
        </div>

        <input class=" input-field" type="submit">
    </form>
</div>


<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>