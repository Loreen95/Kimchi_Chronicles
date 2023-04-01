<?php 

$id = $_GET['ingredient_delete_id'];
$ingredient = findIngredientByID($id);

if (is_post_request()) {
    if (isset($_POST['confirm_delete'])) {
        // User has confirmed delete, perform delete action
        deleteIngredient($id);
        redirect_to('dashboard.php?page=ingredient_list');
    } else {
        // User has canceled delete, redirect to previous page
        redirect_to('dashboard.php?page=ingredient_list');
    }
} else {
    // Re
    echo '<div class="formcontainer">';
    echo '<p>Weet je zeker dat je ingrediënt "' . $ingredient['name'] . '" wilt verwijderen?</p>';
    echo '<form method="POST">';
    echo '<div class="input-icons">';
    echo '<input type="submit" name="confirm_delete" value="Ja">';
    echo '<a href="dashboard.php?page=ingredient_list">Nee</a>';
    echo '</form>';
    echo '</div>';
}

?>