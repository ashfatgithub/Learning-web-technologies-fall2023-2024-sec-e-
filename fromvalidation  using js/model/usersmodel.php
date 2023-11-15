<?php
require_once 'db.php';
function registration($name, $username, $email, $mobile, $gender, $id, $password)
{
    $con = getConnection();

    // Check if the ID already exists
    $checkSql = "SELECT * FROM users WHERE id='{$id}'";
    $checkResult = mysqli_query($con, $checkSql);
    $count = mysqli_num_rows($checkResult);

    if ($count == 1) {
        return false; // ID already exists
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user data into the database
        $insertSql = "INSERT INTO users (name, username, email, mobile, gender, id, password) VALUES('{$name}', '{$username}', '{$email}', '{$mobile}', '{$gender}', '{$id}', '{$hashedPassword}')";
        $insertResult = mysqli_query($con, $insertSql);

        if ($insertResult) {
            return true; // Registration successful
        } else {
            return false; // Registration failed
        }
    }
}





function loginUser($id, $password)
{
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE id='{$id}'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $userData = mysqli_fetch_assoc($result);

            if ($userData) {
                $hashedPassword = $userData['password'];

                if (password_verify($password, $hashedPassword)) {
                    // Passwords match, user is authenticated
                    $name = $userData['name'];
                    $username = $userData['username'];
                    $email = $userData['email'];
                    $mobile = $userData['mobile'];
                    $gender = $userData['gender'];
                    $id = $userData['id'];
                    setcookie('name', $name, time() + 3600, '/');
                    setcookie('username', $username, time() + 3600, '/');
                    setcookie('email', $email, time() + 3600, '/');
                    setcookie('mobile', $mobile, time() + 3600, '/');
                    setcookie('gender', $gender, time() + 3600, '/');
                    setcookie('id', $id, time() + 3600, '/');

                    return true;
                } else {
                    // Invalid password
                    return false;
                }
            }
        }
    }
    return false;
}

function changeUserPassword($currentpassword, $newPassword)
{
    $currentUser = $_COOKIE["id"];
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE id='{$currentUser}'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $userData = mysqli_fetch_assoc($result);
        $hashedPassword = $userData['password'];

        if (password_verify($currentpassword, $hashedPassword)) {
            // Passwords match, update the password
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sqlUpdate = "UPDATE users SET password='{$hashedNewPassword}' WHERE id='{$currentUser}'";
            $resultUpdate = mysqli_query($con, $sqlUpdate);

            if ($resultUpdate) {
                return true;
            } else {
                echo "Error updating password: " . mysqli_error($con);
            }
        } else {
            // Incorrect password
            return false;
        }
    } else {
        // Error in the query
        echo "Error: " . mysqli_error($con);
    }

    return false;
}

function updateProfile($id, $username, $email, $mobile, $name, $gender)
{
    $con = getConnection();
    $sql = "UPDATE users SET username='{$username}', email='{$email}', mobile='{$mobile}', name='{$name}', gender='{$gender}' WHERE id='{$id}'";

    $result = mysqli_query($con, $sql);

    return $result;
}


// Function to check if the user ID is valid
function isValidUserId($id, $con) {
    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM users WHERE id=? LIMIT 1";
    $stmt = mysqli_prepare($con, $sql);

    // Check if the prepare statement is successful
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_fetch_assoc($result)) {
            return true;
        }
    } else {
        // Handle the case where the prepare statement fails
        echo "Error: " . mysqli_error($con);
    }

    return false;
}

function updatePassword($id, $newPassword, $con) {
    // Use prepared statements to prevent SQL injection
    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password=? WHERE id=?";
    $stmt = mysqli_prepare($con, $sql);

    // Check if the prepare statement is successful
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $hashedNewPassword, $id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            return true;
        } else {
            // Handle the case where the update query fails
            echo "Error updating password: " . mysqli_error($con);
        }
    } else {
        // Handle the case where the prepare statement fails
        echo "Error: " . mysqli_error($con);
    }

    return false;
}
?>