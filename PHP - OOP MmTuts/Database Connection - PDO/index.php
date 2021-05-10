<?php
    include "includes/autoload.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Here we show the user with the name Lyle
        $usersObj = new UsersView();
        $usersObj -> showUser("Lyle");

    // Here we add a user with the name Justine
        // $newUser = new UsersContr();
        // $newUser -> createUser("Justine", "justine@gmail.com");
    ?>
</body>
</html>