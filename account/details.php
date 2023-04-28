<?php require_once('./Database/mysql/connection.php'); ?>
<?php 
/*    $username   = "sanju";
    $password   = "sanju2006";
    $first_name = "Sanjuni";
    $last_name  = "Prabuddhika";
    $about      = "Education";
    $password = sha1($password);
    $profile_photo = "";
    $is_deleted = 0;
    $query = "INSERT INTO accounts (username, password, first_name, last_name, about, profile_photo, is_deleted) VALUES ('{$username}', '{$password}', '{$first_name}', '{$last_name}', '{$about}', '{$profile_photo}', $is_deleted)";
*/
    $query = "SELECT id, username, first_name, last_name, about, profile_photo, is_deleted FROM accounts";
    $result = mysqli_query($connection, $query);
    if($result){
        echo '<script>console.log("Connected.")</script>';
        //echo mysqli_num_rows($result);
        //echo 'seccess';
        //$records = mysqli_fetch_assoc($result);
        $table = "<table border=1>";
        $table .= "<th>id</th><th>username</th><th>first_name</th><th>last_name</th><th>about</th><th>profile_photo</th><th>active</th>";
        while ($records = $records = mysqli_fetch_assoc($result)){
            $table .= "<tr>";
            $table .= "<td>" . $records['id'] . "</td>";
            $table .= "<td>" . $records['username'] . "</td>";
            $table .= "<td>" . $records['first_name'] . "</td>";
            $table .= "<td>" . $records['last_name'] . "</td>";
            $table .= "<td>" . $records['about'] . "</td>";
            $table .= "<td>" . $records['profile_photo'] . "</td>";
            $table .= "<td>" . $records['is_deleted'] . "</td>";
            $table .= "</tr>";
            //echo $records['username']. "<br>";
        }
        $table .= "</table>";
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            border-collapse: collapse;
            border:  1px solid grey;
            font-family: Arial, Helvetica, sans-serif;
        }
        tr, td {
            padding: 15px;
        }
    </style>
    <title>Details</title>
</head>
<body>
    <table>
        <tr>
            <th>Accounts</th>
            
        </tr>
        <tr>
            <td><?php echo mysqli_num_rows($result); ?></td>
        </tr>
    </table>
    <br><br>
    <?php  echo $table; ?>
</body>
</html>