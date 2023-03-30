<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Recept toevoegen";

$id = $_SESSION['id'];

if (is_post_request()) {



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
            <input class="input-field" type="text" id="input3" name="ingredient[0][name]" placeholder="Bloem">
        </div>

        <div class="input-icons">
            <label for="input4">Hoeveelheid:</label>
            <input class="input-field" type="text" id="input4" name="ingredient[0][amount]" placeholder="250 gram">
        </div>

        <div class="input-icons">
            <label for="input5">Ingrediënt 2:</label>
            <input class="input-field" type="text" id="input5" name="ingredient[1][name]" placeholder="Bloem">
        </div>

        <div class="input-icons">
            <label for="input6">Hoeveelheid:</label>
            <input class="input-field" type="text" id="input6" name="ingredient[1][amount]" placeholder="250 gram">
        </div>

        <div class="input-icons">
            <label for="input7">Ingrediënt 3:</label>
            <input class="input-field" type="text" id="input7" name="ingredient[2][name]" placeholder="Bloem">
        </div>

        <div class="input-icons">
            <label for="input8">Hoeveelheid:</label>
            <input class="input-field" type="text" id="input8" name="ingredient[2][amount]" placeholder="250 gram">
        </div>

        <div class="input-icons">
            <label for="select1">Menugang:</label>
            <select class="course" name="recipe" required>
                <option value="starter">Voorgerecht</option>
                <option value="main">Hoofdgerecht</option>
                <option value="dessert">Nagerecht</option>
            </select>
        </div>

        <div class="input-icons">
            <label for="select2">Moeilijkheid:</label>
            <select class="input-field" id="select2" name="select2">
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