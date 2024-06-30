<?php
    session_start();
    if (!isset($_SESSION['loggedIn'])) {
        header('location: signIn.php');
        exit();
    }
    $userName=$_SESSION['userName'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Notifications</title>
        <script src = "../asset/js/show_notification.js"></script>
    <link rel="stylesheet" href="../asset/css/notification.css">

        
    </head>
    <body>
        <form method = "post" action="../controller/logout.php">
            <h3>Welcome <?php echo $userName?></h3>
            
        </form>
        <br><br><br>
        <table id ='table' border="1">
            <script> showNotifications() </script>
        </table>
        <script>
        function confirmBack() {
            return confirm(" go back  and This will mark all notifications as read.");
        }
    </script>
    <div>
    <button name='back' onclick="markRead(); return false;">Back</button>
            <button name = 'logout'>LogOut</button>
    </div>
    </body>
</html>
