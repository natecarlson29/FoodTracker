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
            <h1>Add a new Food</h1>
            <form action="index.php" method="post">
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

                <input type="hidden" name="action" value="addFood">

                <input type="submit" value="GO" />
            </form>
        </div>
    </body>
</html>
