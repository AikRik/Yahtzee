<?php
session_start();
?>
<html>
    <head>
        <title>Yahtzee</title>
    </head>
    <body>
        <h1> Hey Ya'll, Lets Yahtzee</h1>
        <button onclick='createDice()'>Throw Dice</button>
        <div id='dice'> 
            <form method='POST'action="index.php">
                <input id='dice1' name='dice1' type='text' value="">
                <input id='dice2' name='dice2' type='text' value="">
                <input id='dice3' name='dice3' type='text' value="">
                <input id='dice4' name='dice4' type='text' value="">
                <input id='dice5' name='dice5' type='text' value="">
                <button type="submit" name="submitbutton">Check For Points</button>
            </form>
            <form method="POST" action="index.php">
            <button name="resetScore"> Reset Score</button>
            </form>
        </div>
        <div id="score">

        </div>
    </body>
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
    $_SESSION[$score];
    $_SESSION[$scoreCheck] = [];
    
    $diceScores = array($_POST['dice1'],$_POST['dice2'],$_POST['dice3'],$_POST['dice4'],$_POST['dice5']);
    $_SESSION[$allScores] = [];
   
    if(isset($_POST['submitbutton'])) {
        scoreBd();
        yahtzee();
        fullHouse();
        fourOfaKind();
        threeOfaKind();
        bigStreet();
        smallStreet();
        checkScore(); 
    };

/*======================================== PUSHING THE RESULT TO AN EMPTY ARRAY (DNWY) ======================================================*/    
    function scoreBd(){
        global $diceScores;
        
        array_push($_SESSION[$allScores], $diceScores);

    };

        
/*======================================== CHECKING FOR YAHTZEE ======================================================*/
    function yahtzee(){
        global $diceScores;
        global $yahtzee;
        
        $firstValue = current($diceScores);
        
        foreach ($diceScores as $val) {
            if ($firstValue !== $val) {
                return $yahtzee = false;
            }
        }
            return $yahtzee = true;
    }    
/*======================================== CHECKING FOR FULLHOUSE ======================================================*/
    function fullHouse(){
        global $diceScores;
        global $fullHouse;
        
        $diceCount = array_count_values($diceScores);
        $matchingNrs=array_values($diceCount);

        if($matchingNrs[0] == 3 && $matchingNrs[1] == 2 || $matchingNrs[1] == 3 && $matchingNrs[0] == 2){
            return $fullHouse = true;
        }else{
            return $fullHouse = false;
        }
    }
/*======================================== CHECKING FOR FOUR OF A KIND ======================================================*/
        function fourOfaKind(){
        global $diceScores;
        global $fourOfaKind;
        
        $diceCount = array_count_values($diceScores);
        $matchingNrs=array_values($diceCount);

        if($matchingNrs[0] == 4 || $matchingNrs[1] == 4){
            return $fourOfaKind = true;
        }else{
            return $fourOfaKind = false;
        }
    }
/*======================================== CHECKING FOR THREE OF A KIND ======================================================*/
        function threeOfaKind(){
        global $diceScores;
        global $threeOfaKind;
        
        $diceCount = array_count_values($diceScores);
        $matchingNrs=array_values($diceCount);

        if($matchingNrs[0] == 3 || $matchingNrs[1] == 3 || $matchingNrs[2] == 3){
            return $threeOfaKind = true;
        }else{
            return $threeOfaKind = false;
        }
    }
/*======================================== CHECKING FOR BIGSTREET ======================================================*/    
    function bigStreet(){
        global $diceScores;
        global $bigStreet;
        
        $diceCount = array_count_values($diceScores);
        $matchingNrs=array_values($diceCount);

        if($matchingNrs[0] == 1 && $matchingNrs[1] == 1 && $matchingNrs[2] == 1 && $matchingNrs[3] == 1 && $matchingNrs[4] == 1){
            return $bigStreet = true;
        }else{
            return $bigStreet = false;
        }
    }
/*======================================== CHECKING FOR SMALLSTREET ======================================================*/ 
    function smallStreet(){
        global $diceScores;
        global $smallStreet;
        
        $diceCount = array_count_values($diceScores);
        $matchingNrs=array_values($diceCount);

        if($matchingNrs[0] == 1 && $matchingNrs[1] == 1 && $matchingNrs[2] == 1 && $matchingNrs[3] == 2 || $matchingNrs[0] == 1 && $matchingNrs[1] == 1 && $matchingNrs[2] == 1 && $matchingNrs[3] == 2 || $matchingNrs[0] == 1 && $matchingNrs[1] == 1 && $matchingNrs[2] == 2 && $matchingNrs[3] == 1|| $matchingNrs[0] == 1 && $matchingNrs[1] == 2 && $matchingNrs[2] == 1 && $matchingNrs[3] == 1|| $matchingNrs[0] == 2 && $matchingNrs[1] == 1 && $matchingNrs[2] == 1 && $matchingNrs[3] == 1){
            return $smallStreet = true;
        }else{
            return $smallStreet = false;
        }
    }
/*======================================== RESETTING SCORE (DNWY) ======================================================*/       
    if(isset($_POST['resetScore'])){
       $_SESSION["score"] =  $_SESSION["score"] = 0;
        echo "<h4>The score has been reset</h4><br />";
    }
/*======================================== CHECKING THE SCORE ======================================================*/
    function checkScore(){
        global $yahtzee;
        global $fullHouse;
        global $threeOfaKind;
        global $bigStreet;
        global $smallStreet;
        global $fourOfaKind;
        
        $diceScores = array($_POST['dice1'],$_POST['dice2'],$_POST['dice3'],$_POST['dice4'],$_POST['dice5']);
        $allScores = [];

        if($_SESSION['score'] >= 100000){
           echo "You Win!";
        }elseif($yahtzee){
            $_SESSION["score"] =  $_SESSION["score"] + 50;
            echo "<div id='points'> <h1>YAHTZEE!</h1> <h2>You have gained 50 Points!!!</h2><br /><h3>Score = ".$_SESSION[score]."</h3><div><br />";
        }elseif($fullHouse){
            $_SESSION["score"] =  $_SESSION["score"] + 25;
            echo "<div id='points'> <h2>Full House! You have Gained 25 Points!</h2><br /><h3>Score = ".$_SESSION[score]."</h3><div><br />";  
        }elseif($fourOfaKind){
            $_SESSION["score"] =  $_SESSION["score"] + 21;
            echo "<div id='points'> <h2>Four Of A Kind! You have Gained 21 Points!</h2><br /><h3>Score = ".$_SESSION[score]."</h3><div><br />"; 
        }elseif($threeOfaKind){
            $_SESSION["score"] =  $_SESSION["score"] + 21;
            echo "<div id='points'> <h2>Three Of A Kind! You have Gained 21 Points!</h2><br /><h3>Score = ".$_SESSION[score]."</h3><div><br />"; 
        }elseif($bigStreet){
            $_SESSION["score"] =  $_SESSION["score"] + 40;
            echo "<div id='points'> <h2>Large Street! You have Gained 40 Points!</h2><br /><h3>Score = ".$_SESSION[score]."</h3><div><br />"; 
        }elseif($smallStreet){
            $_SESSION["score"] =  $_SESSION["score"] + 40;
            echo "<div id='points'> <h2>Small Street! You have Gained 30 Points!</h2><br /><h3>Score = ".$_SESSION[score]."</h3><div><br />"; 
        }else{
            $_SESSION["score"] =  $_SESSION["score"] + array_sum($diceScores);
            echo "<div id='points'> <h2>Chance! The sum of your dices has been added!</h2><br /><h3>Score = ".$_SESSION[score]."</h3><div><br />";
        }
    };
?>    
 </html>   
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

