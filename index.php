<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

STUDENT ID: A00916145
NAME:       GEORGE DENG
SET:        COMP 4G
-->
<html>
    <head>
        <meta http-equiv="Content Type" content="text/html; charset=UTF-8">
        <title>COMP4711 LAB 1 - Tic Tac Toe</title>
    </head>
    <body>
        <?php
        if (!isset($_GET['board'])) {
            $position = '---------';
        } else {
            $position = $_GET["board"];
        }
        $squares = str_split($position);

        class Game {
            var $position;

            function __construct($squares) {
                $this->position = $squares;
            }
            
            function display() {
                
                echo '<table cols="3" style="font-size:xx-large; font-weight:bold">';
                echo '<tr>';    // open the first row

                for ($pos = 0; $pos < 9; $pos++)
                {
                    echo $this->show_cell($pos);
                    if ($pos % 3 == 2)
                    {
                        echo '</tr><tr>';   // start a new row for the next square
                    }            
                }

                echo '</tr>';   // close the last row
                echo '</table';
            }
            
            function show_cell($which) {
                $token = $this->position[$which];
                // deal with easy case
                if ($token != '-') 
                {
                    return '<td>' . $token . '</td>';
                }
                
                $this->newposition = $this->position; // copy original pos
                $this->newposition[$which] = 'o'; // this would be their move
                $move = implode($this->newposition); // make a string from the board array
                $link = '?board=' . $move; // this is what we want the link to be
                // so return a cell containing an anchor and showing a hyphen
                return '<td><a href="' . $link . '">' . $token . '</a></td>';
            }

            function winner($token) {
                $won = false;
                
                if (($this->position[0] == $token) &&
                    ($this->position[1] == $token) &&
                    ($this->position[2] == $token)) 
                {
                    $won = true;
                } else if (($this->position[3] == $token) &&
                           ($this->position[4] == $token) &&
                           ($this->position[5] == $token))
                {
                    $won = true;
                } else if (($this->position[6] == $token) &&
                           ($this->position[7] == $token) &&
                           ($this->position[8] == $token))
                {
                    $won = true;
                } else if (($this->position[0] == $token) &&
                           ($this->position[3] == $token) &&
                           ($this->position[6] == $token))
                {
                    $won = true;
                } else if (($this->position[1] == $token) &&
                           ($this->position[4] == $token) &&
                           ($this->position[7] == $token))
                {
                    $won = true;
                } else if (($this->position[2] == $token) &&
                           ($this->position[5] == $token) &&
                           ($this->position[8] == $token)) 
                {
                    $won = true;
                } else if (($this->position[0] == $token) &&
                           ($this->position[4] == $token) &&
                           ($this->position[8] == $token))
                {
                    $won = true;
                } else if (($this->position[2] == $token) &&
                           ($this->position[4] == $token) &&
                           ($this->position[6] == $token))
                {
                    $won = true;
                }
                
                return $won;
            }
            
            function pick_move() {

                $rand = rand(0, 8);
                
                switch ($rand) {
                    case 0:
                        if ($this->position[$rand] == '-')
                        {
                            $this->position[$rand] = 'x';
                            return;
                        }
                    case 1:
                        if ($this->position[$rand] == '-') 
                        {
                            $this->position[$rand] = 'x';
                            return;
                        }
                    case 2:
                        if ($this->position[$rand] == '-')
                        {
                            $this->position[$rand] = 'x';
                            return;
                        }
                    case 3:
                        if ($this->position[$rand] == '-') 
                        {
                            $this->position[$rand] = 'x';
                            return;
                        }
                    case 4:
                        if ($this->position[$rand] == '-')
                        {
                            $this->position[$rand] = 'x';
                            return;
                        }
                    case 5:
                        if ($this->position[$rand] == '-')
                        {
                            $this->position[$rand] = 'x';
                            return;
                        }
                    case 6:
                        if ($this->position[$rand] == '-')
                        {
                            $this->position[$rand] = 'x';
                            return;
                        }
                    case 7:
                        if ($this->position[$rand] == '-')
                        {
                            $this->position[$rand] = 'x';
                            return;
                        }
                    case 8:
                        if ($this->position[$rand] == '-')
                        {
                            $this->position[$rand] = 'x';
                            return;
                        }
                    default:
                        break;
                }
                
                $this->pick_move();
            }

        }
        
        $game = new Game($squares);
        $winner = null;
        $game->pick_move();
        $game->display();        
                
        if ($game->winner('x')) {
            echo 'You win. Lucky guesses!';
        } else if ($game->winner('o')) {
            echo 'I win. Muhahahaha';
        } else {
            echo 'No winner yet, but you are losing.';
        }
        ?>
    </body>
</html>