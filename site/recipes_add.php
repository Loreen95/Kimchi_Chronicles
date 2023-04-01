<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Recept toevoegen";

$id = $_SESSION['id'];
$ingredients = allIngredients();

if (is_post_request()) {
    $recipeName = $_POST['title'];
    $image = $_POST['image-upload'];
    $duration = $_POST['duration'];
    $course = $_POST['course'];
    $difficulty = $_POST['difficulty'];
    $checked_ingredients = $_POST['ingredients'];
    $amounts = $_POST['amounts'];
    $steps = $_POST['steps'];

    $result = addRecipe($recipeName, $image, $duration, $course, $difficulty, $checked_ingredients, $amounts, $steps);
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
    <h2 class="registerTitle">Recept toevoegen</h2>

    <?php
    if (isset($error)) { ?>
        <div class="errors">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="post" enctype="multipart/form-data">
        <div class="input-icons" id="image">
            <label for="image-upload">Upload Foto:</label>
            <input class="input-field" type="file" id="image-upload" name="image-upload" accept="image/*">
            <img id="image-preview" src="#" alt="Image Preview" style="display: none;">
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-bowl-food icon"></i>
            <input class="input-field" type="text" id="input1" name="title" placeholder="Kimchi Fried Rice" required>
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-clock icon"></i>
            <input class="input-field" type="text" id="input2" name="duration" placeholder="HH:MM:SS" required>
        </div>

        <div class="input-row" style="max-height: 300px; overflow-y: auto;">
            <label class="fieldtitle">Ingrediënten:</label>
            <?php foreach ($ingredients as $ingredient) { ?>
                <div class="input-icons">
                    <input class="input-field2" type="checkbox" id="ingredient-<?php echo $ingredient['id']; ?>" name="ingredients[]" value="<?php echo $ingredient['id']; ?>">
                    <label class="input-field3" for="ingredient-<?php echo $ingredient['id']; ?>"><?php echo $ingredient['name']; ?></label>
                    <input class="input-field1" type="text" id="amount" name="amounts[]" placeholder="Hoeveelheid">
                </div>
            <?php } ?>
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-book icon"></i>
            <textarea class="input-field" type="text" id="steps-1" name="steps[]" placeholder="Schrijf hier wat je moet doen"></textarea>
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-book icon"></i>
            <textarea class="input-field" type="text" id="steps-2" name="steps[]" placeholder="Schrijf hier wat je moet doen"></textarea>
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-book icon"></i>
            <textarea class="input-field" type="text" id="steps-3" name="steps[]" placeholder="Schrijf hier wat je moet doen"></textarea>
        </div>
        <div class="input-icons">
            <i class="fa-solid fa-book icon"></i>
            <textarea class="input-field" type="text" id="steps-4" name="steps[]" placeholder="Schrijf hier wat je moet doen"></textarea>
        </div>



        <div class="input-icons">
            <i class="fa-solid fa-turn-up icon"></i>
            <select class="input-field" name="course">
                <option value="" selected disabled>Kies de menugang</option>
                <option value="starter">Voorgerecht</option>
                <option value="main">Hoofdgerecht</option>
                <option value="dessert">Nagerecht</option>
            </select>
        </div>

        <div class="input-icons">
            <i class="fa-solid fa-turn-up icon"></i>
            <select class="input-field" name="difficulty">
                <option value="" selected disabled>Kies de Moeilijkheid</option>
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