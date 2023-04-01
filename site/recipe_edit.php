<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Recept aanpassen";


$id = $_GET['recipe_edit_id'];
$recipe = findRecipe($id);

if (is_post_request()) {
    $recipeName = !empty($_POST['title']) ? $_POST['title'] : $recipe['title'];
    $image = !empty($_POST['image']) ? $_POST['image'] : $recipe['image'];
    $duration = !empty($_POST['duration']) ? $_POST['duration'] : $recipe['duration'];
    $course = !empty($_POST['course']) ? $_POST['course'] : $recipe['course'];
    $difficulty = !empty($_POST['difficulty']) ? $_POST['difficulty'] : $recipe['difficulty'];
    $checked_ingredients = !empty($_POST['ingredients']) ? $_POST['ingredients'] : $ingredient['name'];
    $amounts = !empty($_POST['amounts']) ? $_POST['amounts'] : $recipe['amount'];
    $steps = !empty($_POST['steps']) ? $_POST['steps'] : $recipe['steps'];

    $result = addOrUpdateRecipe($recipeName, $image, $duration, $course, $difficulty, $checked_ingredients, $amounts, $steps, $id);
}
?>

<div class="formcontainer">
    <h2 class="registerTitle">Recept aanpassen</h2>
    <div id="content">
        <a href="?page=recipe_delete&recipe_delete_id=<?php echo $recipe['id'] ?>" style="color: red;">Recept verwijderen</a>
    </div>
    <?php
    if (isset($error)) { ?>
        <div class="errors">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="post">
        <div class="input-icons" id="image">
            <label for="image-upload">Upload Foto:</label>
            <input class="input-field" type="file" id="image-upload" name="image-upload" accept="image/*">
            <img id="image-preview" src="public/images/<?php echo $recipe['image'];?>" alt=image-preview/></div>

            <div class=" input-icons">
                <i class="fa-solid fa-book icon"></i>
                <input class="input-field" type="text" id="title" name="title" placeholder="<?php echo $recipe['title'] ?>" value="<?php echo $recipe['title'] ?>">
            </div>


            <div class="input-icons">
                <i class="fa-solid fa-book icon"></i>
                <input class="input-field" type="text" id="duration" name="duration" placeholder="<?php echo $recipe['duration'] ?>" value="<?php echo $recipe['duration'] ?>">
            </div>

            <div class="input-row" style="max-height: 300px; overflow-y: auto;">
                <?php
                $ingredients = allIngredients();
                // Zoekt alle ingredienten en maakt een array voor diegene die al gekoppeld zijn aan het recept.  
                $checked_ingredients = array();
                $recipe_ingredients = findRecipeIngredients($id);
                if (!empty($recipe_ingredients)) {
                    foreach ($recipe_ingredients as $recipe_ingredient) {
                        $checked_ingredients[] = $recipe_ingredient['ingredient_id'];
                    }
                }

                foreach ($ingredients as $ingredient) {
                ?>
                    <div class="input-icons">
                        <input class="input-field2" type="checkbox" id="ingredient-<?php echo $ingredient['id']; ?>" name="ingredients[]" value="
                        <?php echo $ingredient['id']; ?>" <?php if (isset($_POST['ingredients']) && in_array($ingredient['id'], $_POST['ingredients'])) {
                                                                echo 'checked';
                                                            } elseif (in_array($ingredient['id'], $checked_ingredients)) {
                                                                echo 'checked';
                                                            } ?>>
                        <label class="input-field3" for="ingredient-<?php echo $ingredient['id']; ?>"><?php echo $ingredient['name']; ?></label>
                        <input class="input-field1" type="text" id="amount" name="amounts[]" placeholder="Hoeveelheid" value="
                        <?php if (isset($_POST['amounts'])) {
                            foreach ($_POST['amounts'] as $amount) {
                                if ($amount['id'] == $ingredient['id']) {
                                    echo $amount['amount'];
                                    break;
                                }
                            }
                        } elseif (!empty($recipe_ingredients)) {
                            foreach ($recipe_ingredients as $recipe_ingredient) {
                                if ($recipe_ingredient['ingredient_id'] == $ingredient['id']) {
                                    echo $recipe_ingredient['amount'];
                                    break;
                                }
                            }
                        } ?>">
                    </div>
                <?php } ?>
            </div>


            <?php for ($i = 1; $i <= 4; $i++) { ?>
                <div class="input-icons">
                    <i class="fa-solid fa-book icon"></i>
                    <textarea class="input-field" type="text" id="steps-<?php echo $i; ?>" name="steps[]" placeholder="Schrijf hier wat je moet doen" value="<?php echo isset($_POST['steps'][$i - 1]) ? $_POST['steps'][$i - 1] : ''; ?>"></textarea>
                </div>
            <?php } ?>
            <div class="input-icons">
                <i class="fa-solid fa-turn-up icon"></i>
                <select class="input-field" name="course">
                    <option value="" selected disabled>Kies de menugang: <?php echo $recipe['course']; ?></option>
                    <option value="starter">Voorgerecht</option>
                    <option value="main">Hoofdgerecht</option>
                    <option value="dessert">Nagerecht</option>
                </select>
            </div>

            <div class="input-icons">
                <i class="fa-solid fa-turn-up icon"></i>
                <select class="input-field" name="difficulty">
                    <option value="" selected disabled>Kies de Moeilijkheid: <?php echo $recipe['difficulty']; ?></option>
                    <option value="easy">Makkelijk</option>
                    <option value="medium">Gemiddeld</option>
                    <option value="hard">Moeilijk</option>
                </select>
            </div>

            <input class="input-field" type="submit">
    </form>
</div>