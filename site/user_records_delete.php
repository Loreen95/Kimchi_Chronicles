<?php
$id = $_GET['delete_id'];
$user = findUserByID($id);

if (is_post_request()) {
    if (isset($_POST['confirm_delete'])) {
        // User has confirmed delete, perform delete action
        deleteUser($id);
        redirect_to('dashboard.php?page=user_records');
    } else {
        // User has canceled delete, redirect to previous page
        redirect_to('dashboard.php?page=user_records');
    }
} else {

    echo '<div class="formcontainer">';
    echo '<p>Weet je zeker dat je jouw account wilt verwijderen?</p>';
    echo '<form method="POST">';
    echo '<div class="input-icons">';
    echo '<input type="submit" name="confirm_delete" value="Ja">';
    echo '<a href="dashboard.php?page=user_records">Nee</a>';
    echo '</form>';
    echo '</div>';
}
