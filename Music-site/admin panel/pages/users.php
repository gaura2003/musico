<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/users.css">
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }

        function confirmEdit() {
            return confirm("Are you sure you want to edit this user?");
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>User Registration Data</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Registration Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the database connection file
                include "../admin panel/Includes/connection.php";

                // Prepare and execute SQL statement
                $sql = "SELECT `id`, `name`, `email`, `phone`, `reg_date` FROM `Registration`";
                $result = $conn->query($sql);

                // Check if there are any rows in the result
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["reg_date"] . "</td>";
                        echo "<td>";
                        echo "<a href='process files/edit_user.php?id=" . $row["id"] . "' onclick='return confirmEdit();'> Edit</a> | ";
                        echo "<a href='process files/delete_user.php?id=" . $row["id"] . "' onclick='return confirmDelete();'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No users registered yet.</td></tr>";
                }

                // Close connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
