<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedDegrees = $_POST['deg'];

    if (!empty($selectedDegrees)) {
        echo "Your selected degrees are: " . implode(", ", $selectedDegrees);
    } else {
        echo "No degrees selected.";
    }
} else {
    echo "No data submitted.";
}
?>