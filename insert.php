<?php

$con = new mysqli('localhost', 'root', '', 'mobile');

if ($con->connect_errno) {
    echo $con->connect_error;
    die();
}

?>
<html>
<head>
    <title>mobile</title>
</head>
<body>
<form action="insert.php" method="post">
    <table>
        <tr>
            <td>Model</td>
            <td><input type="text" name="Model"></td>
        </tr>
        <tr>
            <td>RAM</td>
            <td><input type="text" name="RAM"></td>
        </tr>
        <tr>
            <td>ROM</td>
            <td><input type="text" name="ROM"></td>
        </tr>
        <tr>
            <td colspan='2' align="center">
                <input type="submit" name="submit" value="Save Data">
            </td>
        </tr>
    </table>
</form>
<?php
if (isset($_POST['submit'])) {
    $Model = $_POST['Model'];
    $RAM = $_POST['RAM'];
    $ROM = $_POST['ROM'];
    if ($Model != "" && $RAM != "" && $ROM != "") {
        $sql = "INSERT INTO `redmi` (`Model`, `RAM`, `ROM`) VALUES ('$Model','$RAM','$ROM');";
        echo $sql;
        if ($con->query($sql)) {
            echo "Data stored";
        } else {
            echo "Insert data failed";
        }
    } else {
        echo "All Feild Required";
    }
} else {
    echo "Please Enter All The Data";
}
?>
</body>
</html>
