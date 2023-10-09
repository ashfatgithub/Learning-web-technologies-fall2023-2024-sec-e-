<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Degree</title>
</head>
<body>
    <form method="POST" action="">
        <fieldset>
            <legend>Degrees</legend>
            <label><input type="checkbox" name="deg[]" value="SSC">SSC</label>
            <label><input type="checkbox" name="deg[]" value="HSC">HSC</label>
            <label><input type="checkbox" name="deg[]" value="BSc">BSc</label>
            <label><input type="checkbox" name="deg[]" value="MSc">MSc</label>
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form><br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedDegrees = $_POST['deg'];
        if (!empty($selectedDegrees)) {
            echo "Your selected degrees are: " . implode(", ", $selectedDegrees);
        } else {
            echo "No degrees selected.";
        }
    }
    ?>
</body>
</html>
