<?php 
require_once 'Food.php';

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="wrapper">
            <?php include 'header.php';?>
            <h1>Add a preset food</h1>
            <form action="index.php" method="post">
                <br><br><label>Date (YYYY/MM/DD): </label><br><br>
                <input type="text" name="date" value='<?php xecho(date('Y/m/d')) ?>'/>
                <?php if (!empty($dateError)){  xecho ($dateError); } ?>
                <br><br>
                <h3>Food Eaten: </h3><br><br>
                <?php foreach ($foods as $food) : ?>
                <input type="radio" name="foodEaten" value="<?php xecho($food->getFoodID()); ?>"><?php echo $food->getName() . ' ' . $food->getCalories() . ' calories, ' . $food->getProtein() . ' protein'; ?><br><br>
                <?php endforeach; ?>
                <a href="index.php?action=gotoAddNewFood">Food not listed? ADD NEW FOOD HERE</a>

                <input type="hidden" name="action" value="addEntry">
                <br><br>
                <input type="submit" value="Add Entry" />
            </form><br><hr>
            <h1>Or add a new food</h1>
            <form action="index.php" method="post">
                <br><br><label>Date (YYYY/MM/DD): </label><br><br>
                <input type="text" name="date2" value='<?php xecho(date('Y/m/d')) ?>'/>
                <?php if (!empty($dateError)){  xecho ($dateError); } ?>
                <br><br>
                <label>Name of Food: </label>
                <input type="text" name="foodName" value='<?php if (!empty($foodName)){  xecho ($foodName); } ?>'/>
                <?php if (!empty($foodNameError)){  xecho ($foodNameError); } ?>
                <br><br>
                <label>Calories: </label>
                <input type="text" name="calories" value='<?php if (!empty($calories)){  xecho ($calories); } ?>'/>
                <?php if (!empty($caloriesError)){  xecho ($caloriesError); } ?>
                <br><br>
                <label>Protein: </label>
                <input type="text" name="protein" value='<?php if (!empty($protein)){  xecho ($protein); } ?>'/>g
                <?php if (!empty($proteinError)){  xecho ($proteinError); } ?>
                <br><br>

                <input type="hidden" name="action" value="addTempFood">

                <input type="submit" value="Add Entry" />
            </form><br><br>
            
        </div>
    </body>
</html>
