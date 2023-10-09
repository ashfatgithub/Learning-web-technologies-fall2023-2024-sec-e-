<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blood Group</title>
</head>
<body>

    <?php
    $bg = ""; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bg = $_POST['bg'];
    }
    ?>

    <form method="POST" action="">
        <fieldset>
            <legend>Blood Group</legend>
            <select name="bg">
                <option value="A+" <?php if ($bg == "A+") echo "selected"; ?>>A+</option>
                <option value="A-" <?php if ($bg == "A-") echo "selected"; ?>>A-</option>
                <option value="B+" <?php if ($bg == "B+") echo "selected"; ?>>B+</option>
                <option value="B-" <?php if ($bg == "B-") echo "selected"; ?>>B-</option>
                <option value="O+" <?php if ($bg == "O+") echo "selected"; ?>>O+</option>
                <option value="O-" <?php if ($bg == "O-") echo "selected"; ?>>O-</option>
                <option value="AB+" <?php if ($bg == "AB+") echo "selected"; ?>>AB+</option>
                <option value="AB-" <?php if ($bg == "AB-") echo "selected"; ?>>AB-</option>
            </select>
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>
    <br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Your blood group is : " . $bg;
    }
    ?>
</body>
</html>
