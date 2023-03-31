<footer class="footer">
    Made By: Lisa Hakhoff, 2023
</footer>
</div>
</div>
</body>

</html>
<section id="gegevens">
    <h2>Personal Records</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php ?>
        <tbody>
            <?php
            if (!empty($result)) {
                foreach ($result as $user) { ?>
                    <tr>
                        <td><?php echo $user["first_name"]; ?></td>
                        <td><?php echo $user["last_name"]; ?></td>
                        <td><?php echo $user["email"]; ?></td>
                        <td>
                            <a href='edit_personal_record.php?id=<?php echo $user["id"] ?>" style="color: blue;"><i class=' fa-solid fa-pencil-alt record-icon'></i></a>
                        </td>
                        <td>
                            <a href='delete_personal_record.php?id=<?php echo $user['id'] ?>" style="color: red;"><i class=' record-icon fa-solid fa-times'></i></a>
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
    <?php // Display the edit form with pre-populated fields
    echo "<h2>Edit Personal Record</h2>";
    echo "<form action='update_personal_record.php' method='post'>";
    echo "<input type='hidden' name='id' value='" . $row[' id'] . "'>";
    echo "<label>Name:</label> <input type='text' name='name' value='" . $row[' name'] . "'><br>";
    echo "<label>Address:</label> <input type='text' name='address' value='" . $row[' address'] . "'><br>";
    echo "<label>Phone Number:</label> <input type='text' name='phone_number' value='" . $row[' phone_number'] . "'><br>";
    echo "<label>Email:</label> <input type='email' name='email' value='" . $row[' email'] . "'><br>";
    echo "<input type='submit' value='Save'>";
    echo "</form>";
    ?>
</section>