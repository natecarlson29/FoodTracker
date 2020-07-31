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
            <table>
                <tr>
                    <th>Date</th>
                    <th>Food</th>
                    <th>Calories</th>
                    <th>Protein</th>
                    <th></th>
                </tr>
                <tr class="sep_color">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
                <?php $dateCount = "0"; ?>
                <?php $totalCalories = 0; ?>
                        <?php $totalProtein = 0; ?>
                <?php foreach ($logs as $log) : ?>
                    <?php if($dateCount == "0"){
                        $dateCount = $log->getDate();
                    } ?>
                    <?php if($dateCount != $log->getDate()){ ?>
                        <tr>
                        <td><b><?php $formattedDate = date("F d, Y", strtotime($dateCount)); xecho (htmlspecialchars($formattedDate)); ?></b></td>
                        <td><b>Total</b></td>
                        <td><b><?php xecho($totalCalories); ?></b></td>
                        <td><b><?php xecho($totalProtein); ?></b></td>
                        <?php $dateCount = $log->getDate() ?>
                        <?php $totalCalories = 0; ?>
                        <?php $totalProtein = 0; ?>
                        <td></td>
                        </tr>
                        <tr class="sep_color">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                    <?php } ?>
                        <tr>
                            <td><b><?php $formattedDate = date("F d, Y", strtotime($log->getDate())); if($totalCalories == 0 && $totalProtein == 0){xecho (htmlspecialchars($formattedDate)); } else {xecho (htmlspecialchars('||')); }?></b></td>
                            <?php $currentFood = dbMethods::getFoodByID($log->getFoodID()); ?>
                            <td><?php xecho (htmlspecialchars($currentFood->getName())); ?></td>
                            <td><?php xecho (htmlspecialchars($currentFood->getCalories())); ?></td>
                            <td><?php xecho (htmlspecialchars($currentFood->getProtein())); ?></td>
                            <?php $totalCalories += $currentFood->getCalories(); ?>
                            <?php $totalProtein += $currentFood->getProtein(); ?>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="deleteLog"/>
                                    <input type="hidden" name="logsID" value="<?php xecho($log->getLogID()) ?>"/>
                                    <input type="submit" value="Delete"/>
                                </form>
                            </td>
                        </tr>
                <?php endforeach; ?>
                <tr>
                        <td><b><?php $formattedDate = date("F d, Y", strtotime($dateCount)); xecho (htmlspecialchars($formattedDate)); ?></b></td>
                        <td><b>Total</b></td>
                        <td><b><?php xecho($totalCalories); ?></b></td>
                        <td><b><?php xecho($totalProtein); ?></b></td>
                        <td></td>
                </tr>
            </table>
            
            <h3></h3>
        </div>
    </body>
</html>
