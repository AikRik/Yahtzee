<?php
session_start();
?>
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
            document.getElementById('dice1').value=dicenumbers[Math.floor(Math.random() * dicenumbers.length)];
            document.getElementById('dice2').value=dicenumbers[Math.floor(Math.random() * dicenumbers.length)];
            document.getElementById('dice3').value=dicenumbers[Math.floor(Math.random() * dicenumbers.length)];
            document.getElementById('dice4').value=dicenumbers[Math.floor(Math.random() * dicenumbers.length)];
            document.getElementById('dice5').value=dicenumbers[Math.floor(Math.random() * dicenumbers.length)];
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

