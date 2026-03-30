<?php
include("connection.php");

$a_name = $_POST['admin_name'];
$a_password = $_POST['admin_password'];
$club_name = $_POST['club_name'];

$sql = "INSERT INTO authentication (A_Name, A_password, club_name) VALUES ('$a_name', '$a_password', '$club_name')"; 
$result = mysqli_query($con, $sql);

if (!$result) {
    echo "Error occurred";
    echo mysqli_error($con);
} else {
    echo "<h1>Profile created";
}        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Creation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2E8B57; /* SeaGreen background */
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
            width: 80%;
            max-width: 800px;
            text-align: center;
        }
        h1 {
            color: #2E8B57;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #2E8B57;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .small-button {
            background-color: #2E8B57; /* SeaGreen color */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 150px;
            margin-top: 20px;
        }
        .small-button:hover {
            background-color: #1E6847; /* Darker SeaGreen */
        }
        /* Change color of text in table row */
        table tr td {
            color: #2E8B57; /* SeaGreen color */
        }
        /* Minimize size of link */
        a {
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ADMIN</h1>
        <table>
            <tr>
                <th>Admin ID</th>
                <th>Admin Name</th>
                <th>Club Name</th>
            </tr>
            <?php
            // Fetch admin details from the database
            $sql = "SELECT Admin_Id, A_Name, club_name FROM authentication";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $row['Admin_Id'] ?></td>
                    <td><?php echo $row['A_Name'] ?></td>
                    <td><?php echo $row['club_name'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <form action="club_page_for_student.php" method="post">
            <input type="submit" value="Back" class="small-button">
        </form>
    </div>
</body>
</html>
