<?php
$id = $_SESSION['id'];
$user = findUserByID($id);
?>

<table class="tabel">
    <tr>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Emailadres</th>
        <th>Wachtwoord</th>
        <th>Wijzigen</th>
        <th>Verwijderen</th>
    </tr>
        <tr>
            <td><?php echo $user['first_name']; ?></td>
            <td><?php echo $user['last_name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['password']; ?></td>
            <td><a href="?page=user_records&edit_id=<?php echo $user['id'] ?>" style="color: blue;"><i class="fa-solid fa-pencil"></i></a></td>
            <td><a href="?page=user_records&delete_id=<?php echo $user['id'] ?>" style="color: red;"><i class="fa-solid fa-times"></i></a></td>
        </tr>
</table>