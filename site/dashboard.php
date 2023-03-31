<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Gebruikers dashboard";

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to the login page
    redirect_to("login.php");
    exit();
}

$id = $_SESSION['id'];
$result = findUserByID($id);

if (is_post_request()) {
}
?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>

<section id="gegevens">
    <h2>User Records</h2>
    <table class="records">
        <thead>
            <tr>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Email</th>
                <th>Aanpassen</th>
                <th>Verwijder</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($result)) {
                foreach ($result as $user) { ?>
                    <tr>
                        <td><?php echo $user["first_name"]; ?></td>
                        <td><?php echo $user["last_name"]; ?></td>
                        <td><?php echo $user["email"]; ?></td>
                        <td>
                            <a href="dashboard.php?gegevens&edit=<?php echo $user["id"] ?>" style="color: blue;"><i class='fa-solid fa-pencil-alt record-icon'></i>
                        </td>
                        <td>
                            <a href="deleterecord.php?id=<?php echo $user['id'] ?>" style="color: red;"><i class='record-iconfa-solid fa-times'></i>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan='4'>Geen gegevens gevonden</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</section>

<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>