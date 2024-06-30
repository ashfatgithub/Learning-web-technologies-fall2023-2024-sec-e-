<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add area</title>
    <link rel="stylesheet" href="../asset/css/addArea.css">
    <script src="../asset/js/addArea.js"></script>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header('location: signIn.php');
    exit();
}
?>
<form>
    <center>
        Area: <input type="text" name="area" id="area"><span id="areaS"></span><br><br>
        Helpline: <input type="text" name="helpline" id="helpline"><span id="helplineS"></span><br><br>
        Status: <input type="text" name="status" id="status"><span id="statusS"></span><br><br>
        <button onclick="addArea()">Add</button>
        <div id="areaResultS"></div>
        <br> <!-- Add a line break to separate buttons -->
        <a href="manageGeographicCoverages.php">Back</a>
        <a href="../controller/logout.php">Logout</a>
    </center>
</form>
</body>
</html>
