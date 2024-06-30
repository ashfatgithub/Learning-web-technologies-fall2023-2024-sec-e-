<?php
include_once('../model/complaintsModel.php');
$complaintId = $_POST['complaintId'];
$complaints = getAllComplaints();
echo json_encode($complaints);
// ... existing code

$complaints[] = array(
    'complaintId' => $row['complaintId'],
    'userId' => $row['userId'],
    'category' => $row['category'],
    'subCategory' => $row['subCategory'],
    'status' => $row['status'],
    'complaintDetails' => $row['complaintDetails'],
    'fileName' => $row['fileName'], // Add this line for file name
);

// ... rest of the code remains unchanged

?>