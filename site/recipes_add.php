<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Recept toevoegen";

$id = $_SESSION['id'];

if (is_post_request()) {
    $recipeName = $_POST['title'];
    $image = $_POST['image-upload'];
    $duration = $_POST['duration'];
    $course = $_POST['course'];
    $difficulty = $_POST['difficulty'];
    $ingredients = $_POST['ingredients'];
    $amounts = $_POST['amounts'];
    $steps = $_POST['steps'];

    $result = addRecipe($recipeName, $image, $duration, $course, $difficulty, $ingredients, $amounts, $steps);
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
            <label for="image-upload">Upload Foto:</label>
            <input class="input-field" type="file" id="image-upload" name="image-upload" accept="image/*">
            <img id="image-preview" src="#" alt="Image Preview" style="display: none;">
        </div>

        <div class="input-icons">
            <label for="input1">Naam gerecht:</label>
            <input class="input-field" type="text" id="input1" name="title" placeholder="Kimchi Fried Rice" required>
        </div>

        <div class="input-icons">
            <label for="input2">Bereidingstijd: </label>
            <input class="input-field" type="text" id="input2" name="duration" placeholder="HH:MM:SS" required>
        </div>

        <div class="input-icons">
            <label for="input3">Ingrediënt:</label>
            <input class="input-field" type="text" id="ingredient-1" name="ingredients[]" placeholder="Bloem">
        </div>

        <div class="input-icons">
            <label for="input4">Hoeveelheid:</label>
            <input class="input-field" type="text" id="amount-1" name="amounts[]" placeholder="250 gram">
        </div>

        <div class="input-icons">
            <label for="input5">Ingrediënt 2:</label>
            <input class="input-field" type="text" id="ingredient-2" name="ingredients[]" placeholder="Bloem">
        </div>

        <div class="input-icons">
            <label for="input6">Hoeveelheid:</label>
            <input class="input-field" type="text" id="amount-2" name="amounts[]" placeholder="250 gram">
        </div>

        <div class="input-icons">
            <label for="input7">Ingrediënt 3:</label>
            <input class="input-field" type="text" id="ingredient-3" name="ingredients[]" placeholder="Bloem">
        </div>

        <div class="input-icons">
            <label for="input8">Hoeveelheid:</label>
            <input class="input-field" type="text" id="amount-3" name="amounts[]" placeholder="250 gram">
        </div>

        <div class="input-icons">
            <label for="input3">Instructie:</label>
            <textarea class="input-field" type="text" id="steps-1" name="steps[]" placeholder="Schrijf hier wat je moet doen"></textarea>
        </div>

        <div class="input-icons">
            <label for="input3">Instructie 1:</label>
            <textarea class="input-field" type="text" id="steps-2" name="steps[]" placeholder="Schrijf hier wat je moet doen"></textarea>
        </div>

        <div class="input-icons">
            <label for="input3">Instructie 2:</label>
            <textarea class="input-field" type="text" id="steps-3" name="steps[]" placeholder="Schrijf hier wat je moet doen"></textarea>
        </div>
        <div class="input-icons">
            <label for="input3">Instructie 3:</label>
            <textarea class="input-field" type="text" id="steps-4" name="steps[]" placeholder="Schrijf hier wat je moet doen"></textarea>
        </div>



        <div class="input-icons">
            <label for="select1">Menugang:</label>
            <select class="course" name="course">
                <option value="" selected disabled>Kies de menugang</option>
                <option value="starter">Voorgerecht</option>
                <option value="main">Hoofdgerecht</option>
                <option value="dessert">Nagerecht</option>
            </select>
        </div>

        <div class="input-icons">
            <label for="select2">Moeilijkheid:</label>
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