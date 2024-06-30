<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="../asset/css/searchComplaints.css">
    <script src="../asset/js/search.js"></script>
</head>
<body>
    <label for="search">Search:</label>
    <input type="text" name="search" id="search" onkeyup="search()">
    <input type="button" value="Search">
    
    <div id="searchText">
        <table id="table" border="1">
            <!-- Table content goes here -->
        </table>
    </div>
</body>
</html>
