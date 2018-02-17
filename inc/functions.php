<?php

    function printGameState($allPlayer, $color)
    {
        echo "<div id = color$color>";
        echo "<table>";
        foreach($allPlayer as $player)
        {
            echo "<tr>";
            echo "<th>";
            echo "<img src ='".$player['imgURL']."' /> <br/>" ;
            echo $player['name'];
            echo "</th>";
            echo "<th>";
            foreach($player['hand'] as $card)
            {
                echo "<img src = $card />";
            }
            echo "</th>";
            echo "<th id = message>";
            echo "<p>" . $player['message']. "</p>";
            echo "</th>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }

    function returnCard($face, $suit)
    {
        $card = "./img/";
        switch($suit)
        {
            case 1:
                $card = $card . "red/";
                break;
            case 2:
                $card = $card . "green/";
                break;
            case 3:
                $card = $card . "yellow/";
                break;
            case 4:
                $card = $card . "blue/";
                break;
        }
        
        $card = $card . $face . ".png";
        return $card;
    }
    
    function getHand()
    {
        $arr = array();
        for($i = 0; $i < 6; $i++)
        {
            $suit = rand(1,4);
            $face = rand(1,13);
            $card = returnCard($face, $suit);
            array_push($arr,$card);
        }
        
        return $arr;
    }
    
    function getPlayers()
    {
        $player1 = array(
            'name'=>'Kylo',
            'imgURL' => './img/user_img/Kylo.jpg',
            'hand' => getHand(),
            'message' => 'Ready');
        $player2 = array(
            'name'=>'Pony',
            'imgURL' => './img/user_img/Pony.jpg',
            'hand' => getHand(),
            'message' => 'Ready');
        $player3 = array(
            'name'=>'Coco',
            'imgURL' => './img/user_img/Coco.jpg',
            'hand' => getHand(),
            'message' => 'Ready');
        $player4 = array(
            'name'=>'Rocky',
            'imgURL' => './img/user_img/Rocky.jpg',
            'hand' => getHand(),
            'message' => 'Ready');
        $allPlayer = array($player1, $player2, $player3, $player4);
        return $allPlayer;
    }
    
    function placeOrTake($allPlayer, $num)
    {
        //I want it to be more probable for the player to place a card
        //so 4 out of the six will be them placing a card
        // case 2 is them getting one card
        //case 3 is them getting 2 cards
        switch($num)
        {
            case 1:
                array_pop($allPlayer['hand']);
                $allPlayer['message'] = 'place one';
                break;
            case 2:
                array_pop($allPlayer['hand']);
                $allPlayer['message'] = 'place one';
                break;
            case 3:
                array_pop($allPlayer['hand']);
                $allPlayer['message'] = 'place one';
                break;
            case 4:
                array_pop($allPlayer['hand']);
                $allPlayer['message'] = 'place one';
                break;
            case 5:
                $suit = rand(1,4);
                $face = rand(1,13);
                $card = returnCard($face, $suit);
                array_push($allPlayer['hand'],$card);
                $allPlayer['message'] = 'take one';
                break;
            case 6:
                for($i =0; $i<2;$i++)
                {
                    $suit = rand(1,4);
                    $face = rand(1,13);
                    $card = returnCard($face, $suit);
                    array_push($allPlayer['hand'],$card);
                }
                $allPlayer['message'] = 'take two';
                break;
        }
            return $allPlayer;
    }
    
    
    function play()
    {
        $allPlayer = getPlayers();
        echo "<h2>Start!</h2>";
        printGameState($allPlayer, 0);
        $round = 1;
        $winner = -1;
        while(count($allPlayer[0], COUNT_RECURSIVE) != 4 && count($allPlayer[1], COUNT_RECURSIVE) != 4 &&
              count($allPlayer[2], COUNT_RECURSIVE) != 4 && count($allPlayer[3], COUNT_RECURSIVE) != 4)
        {
            echo "<h2>Round " . $round . "</h2>";
            for($i = 0; $i < 4; $i++)
            {
                $num = rand(1,6);
                $allPlayer[$i] = placeOrTake($allPlayer[$i], $num);
                if(count($allPlayer[$i], COUNT_RECURSIVE) == 5)
                {
                    $allPlayer[$i]['message'] = 'UNO!!';
                }
                if(count($allPlayer[$i], COUNT_RECURSIVE) == 4)
                {
                    $winner = $i;
                }
            }
            printGameState($allPlayer, $round % 2);
            $round++;
        }
        echo "<h1>Winner!</h1>";
        echo "<div id = winner>";
        echo "<img src ='". $allPlayer[$winner]['imgURL'] ."' /> <br/>" ;
        echo $allPlayer[$winner]['name'];
        echo "</div>";
         
    }
    
?>