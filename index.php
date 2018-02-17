<?php
include 'inc/functions.php'
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UNO</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <h1>UNO</h1>
    
    <body>
        <div id = "main">
            <div id = "description">
                <h4>Description:</h4>
                <p>
                    This program simmulates a uno game between 4 player. </br>
                    It uses arrays to simulate each player's hand. Random </br>
                    numbers are selected to determine if each player will </br>
                    draw or place a card. I made it more likely for a player </br>
                    to place a card so the game could end quicker. </br>
                </p>
            </div>
            <?php
                play();
                
            ?>
        
        </div>
        
    </body>
    <footer>
        <h2>Press for another game</h2>
            <form>
                <input type="submit" value = "another!"/>
            </form>
        <p>
            Author: Daniel Ochoa Aguila</br>
            Class: CST 336 </br>
            Date: 02-15-2018
        </p>
    </footer>
</html>