<?php
require_once "includes01/Person.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
    //Accessing static properties and methods below:
        // echo Person::$drinkingAge;
        // Person::setNewDrinkingAge(16);
        // echo Person::$drinkingAge; 
    $person = new Person("John", "Yellow", 45);
    echo $person -> getDrinkingAge();

    
    ?>
</body>
</html>