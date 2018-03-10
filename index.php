<html>
    <h1> Hey Ya'll, Lets Yahtzee</h1>
    <button onclick='createDice()'>Throw Dice</button>
    <div id='dice'> 
        <form method='POST' action='index.php'>
            <input id='dice1' name='dice1' type='text' value="">
            <input id='dice2' name='dice2' type='text' value="">
            <input id='dice3' name='dice3' type='text' value="">
            <input id='dice4' name='dice4' type='text' value="">
            <input id='dice5' name='dice5' type='text' value="">
            <button type="submit">Check For Points</button>
        </form>
    </div>
    <script>

        function createDice(){
            var dicenumbers=[1,2,3,4,5,6];
            var dice1Nr = dicenumbers[Math.floor(Math.random() * dicenumbers.length)];
            var dice2Nr = dicenumbers[Math.floor(Math.random() * dicenumbers.length)];
            var dice3Nr = dicenumbers[Math.floor(Math.random() * dicenumbers.length)];
            var dice4Nr = dicenumbers[Math.floor(Math.random() * dicenumbers.length)];
            var dice5Nr = dicenumbers[Math.floor(Math.random() * dicenumbers.length)];
            document.getElementById('dice1').value=dice1Nr;
            document.getElementById('dice2').value=dice2Nr;
            document.getElementById('dice3').value=dice3Nr;
            document.getElementById('dice4').value=dice4Nr;
            document.getElementById('dice5').value=dice5Nr;
        }
        
    </script>
<?php

echo "Yahtzee"


?>
    
 </html>   
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

