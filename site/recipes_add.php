<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Recept toevoegen";

$id = $_SESSION['id'];

if (is_post_request()) {
    $recipe = [];
    $recipe['title'] = $_POST['title'] ?? '';
    $recipe['image'] = $_POST['image'] ?? '';
    $recipe['duration'] = $_POST['duration'] ?? '';
    $recipe['course'] = $_POST['course'] ?? '';
    $recipe['difficulty'] = $_POST['difficulty'] ?? '';
    $recipe['author'] = $_SESSION['id'];

    $result = addRecipe($recipe);
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
            <input class="input-field" type="text" placeholder="Titel" name="title" required>
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-image icon"></i>
            <input class="input-field" type="text" placeholder="Fotonaam" name="image" required>
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-clock icon"></i>
            <input class="input-field" type="text" placeholder="Bereidingstijd: HH/MM/SS" name="duration" required>
        </div>
        <div class="input-icons">
            <i class="fa-solid fa-turn-up icon"></i>
            <select class="course" name="course" required>
                <option value="" disabled selected>Kies de menugang</option>
                <option value="starter">Voorgerecht</option>
                <option value="main">Hoofdgerecht</option>
                <option value="dessert">Nagerecht</option>
            </select>
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-turn-up icon"></i>
            <select class="difficulty" name="difficulty" required>
                <option value="" disabled selected>Kies de moeilijkheid</option>
                <option value="easy">Makkelijk</option>
                <option value="medium">Gemiddeld</option>
                <option value="hard">Moeilijk</option>
            </select>
        </div>

        <input class=" input-field" type="submit">
    </form>
</div>


<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>