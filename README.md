# Treasure Hunt

Build a simple program to find a way to find treasure using PHP.

## Set Map

Create a simple map using array
``` 
	$map = [
		['#', '#', '#', '#', '#', '#', '#', '#'],
		['#', '.', '.', '.', '.', '.', '.', '#'],
		['#', '.', '#', '#', '#', '.', '.', '#'],
		['#', '.', '.', '.', '#', '.', '#', '#'],
		['#', 'X', '#', '.', '.', '.', '.', '#'],
		['#', '#', '#', '#', '#', '#', '#', '#']
	];
``` 
(#) represents an obstacle.
(.) represents a clear path.
(X) represents the player’s starting position.
($) represents the treasure’s position.

``` 
Treasure is in 1,6
Player is in 4,1
########
#.....$#
#.###..#
#...#.##
#X#....#
########
``` 

## Get Clear Path

``` 
	$clear = [];
	foreach ($map as $i => $row) { // ROWS
		foreach ($row as $j => $col) { // COLUMNS
			if ($col == ".") {
				$clear[] = $i.",".$j;
			}
			// GET PLAYER POSITION
            if ($col == "X") {
				$player = $i.",".$j;
			}
		}
    }
``` 

## Set Treasure Random Position

``` 
    $random = array_rand($clear);
	$treasure = $clear[$random];
	$t = explode(",", $treasure);
	$map[$t[0]][$t[1]] = '$';
``` 

## Set Coordinate Near Player

``` 
    $p = explode(",", $player);
	$y = $p[0];
	$x = $p[1];
	$left = $y.",".($x-1);
	$up = ($y-1).",".$x;
	$right = $y.",".($x+1);
	$down = ($y+1).",".$x;
``` 

## Get New Direction

``` 
    // GET DIRECTION
	do{
		$direction = [$left, $up, $right, $down];
		$direction_rand = array_rand($direction);
		$direction_new = $direction[$direction_rand];

		// CEK CLEAR PATH DIRECTION
	}while(!in_array($direction_new, $clear));
		
	$player = $direction_new;
``` 

## Highlights

``` 
=============
TREASURE HUNT
=============

Treasure is in 2,1
Player is in 4,1
########
#......#
#$###..#
#...#.##
#X#....#
########

Treasure is in 2,1
Player is in 3,1
########
#......#
#$###..#
#X..#.##
#.#....#
########

Player found treasure in 2,1
########
$$$....#
$X$##..#
$$$.#.##
#.#....#
########
Congratulations
``` 