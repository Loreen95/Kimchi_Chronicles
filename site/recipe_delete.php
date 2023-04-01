<?php

$id = $_GET['recipe_delete_id'];
$result = findRecipe($id);

foreach($result as $recipe){
    if (is_post_request()) {
        if (isset($_POST['confirm_delete'])) {
            // User has confirmed delete, perform delete action
            deleteRecipe($id);
            redirect_to('dashboard.php?page=recipe_list');
        } else {
            // User has canceled delete, redirect to previous page
            redirect_to('dashboard.php?page=recipe_list');
        }
    } else {
        // Re
        echo '<div class="formcontainer">';
        echo '<p>Weet je zeker dat je recept "' . $recipe['title'] . '" wilt verwijderen?</p>';
        echo '<form method="POST">';
        echo '<div class="input-icons">';
        echo '<input type="submit" name="confirm_delete" value="Ja">';
        echo '<a href="dashboard.php?page=recipe_list">Nee</a>';
        echo '</form>';
        echo '</div>';
    }
}
?>