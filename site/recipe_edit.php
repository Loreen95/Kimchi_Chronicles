<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Recept aanpassen";


$id = $_GET['recipe_edit_id'];
$recipes = findRecipeByID($id);
$amounts = findRecipeIngredients($id);

?>

<div class="formcontainer">
    <h2 class="registerTitle">Recept aanpassen</h2>

    <?php
    if (isset($error)) { ?>
        <div class="errors">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <?php
    foreach ($recipes as $recipe) { ?>
        <form method="post">
            <div class="input-icons" id="image">
                <label for="image-upload">Upload Foto:</label>
                <input class="input-field" type="file" id="image-upload" name="image-upload" accept="image/*">
                <img id="image-preview" src="#" alt="Image Preview" style="display: none;">
            </div>

            <div class="input-icons">
                <i class="fa-solid fa-bowl-food icon"></i>
                <input class="input-field" type="text" id="input1" name="title" placeholder="<?php echo $recipe['title']; ?>" required>
            </div>

            <div class="input-icons">
                <i class="fa-solid fa-clock icon"></i>
                <input class="input-field" type="text" id="input2" name="duration" placeholder="<?php echo $recipe['duration']; ?>" required>
            </div>

            <div class="input-row" style="max-height: 300px; overflow-y: auto;">
                <label class="fieldtitle">Ingrediënten:</label>
                <?php 
                $ingredients = allIngredients();
                foreach ($ingredients as $ingredient) { ?>
                    <div class="input-icons">
                        <?php $checked = in_array($ingredient['id'], array_column($ingredients, 'id')); ?>
                        <input class="input-field2" type="checkbox" id="ingredient-<?php echo $ingredient['id']; ?>" name="ingredients[]" value="<?php echo $ingredient['id']; ?>" <?php if ($checked) echo 'checked'; ?>>
                        <label class="input-field3" for="ingredient-<?php echo $ingredient['id']; ?>"><?php echo $ingredient['name']; ?></label>
                        <input class="input-field1" type="text" id="amount" name="amounts[]" placeholder="Hoeveelheid"<?php if ($checked) { ?>value="<?php foreach ($amounts as $amount) {
                                                                                                                                                            if ($amount['id'] == $ingredient['id']) {
                                                                                                                                                                echo $amount['amount'];
                                                                                                                                                                break;
                                                                                                                                                            }
                                                                                                                                                        } ?>" <?php } ?>>
                    </div>
                <?php } ?>
            </div>

            <?php $instructions = findInstructions($id); ?>
            <?php for ($i = 1; $i <= 4; $i++) { ?>
                <div class="input-icons">
                    <i class="fa-solid fa-book icon"></i>
                    <textarea class="input-field" type="text" id="steps-<?php echo $i; ?>" name="steps[]" placeholder="Schrijf hier wat je moet doen">
                    <?php
                    if (!empty($instructions)) {
                        echo $instructions[0]['step_' . $i];
                    }
                    ?></textarea>
                </div>
            <?php } ?>
            <!-- 
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
                </div> -->
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
    <?php } ?>
</div>