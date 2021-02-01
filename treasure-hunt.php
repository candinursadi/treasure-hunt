<?php
	$map = [
		['#', '#', '#', '#', '#', '#', '#', '#'],
		['#', '.', '.', '.', '.', '.', '.', '#'],
		['#', '.', '#', '#', '#', '.', '.', '#'],
		['#', '.', '.', '.', '#', '.', '#', '#'],
		['#', 'X', '#', '.', '.', '.', '.', '#'],
		['#', '#', '#', '#', '#', '#', '#', '#']
	];

    // GET CLEAR PATH (.)
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
    
    // SET TREASURE
    $random = array_rand($clear);
	$treasure = $clear[$random];
	$t = explode(",", $treasure);
	$map[$t[0]][$t[1]] = '$';
	
	echo "\n=============\n";
	echo "TREASURE HUNT\n";
	echo "=============\n\n";
	do{
		echo "Treasure is in ".$treasure."\n";
		echo "Player is in ".$player."\n";

		// SET NEAR PLAYER
		$p = explode(",", $player);
		$y = $p[0];
		$x = $p[1];
		$left = $y.",".($x-1);
		$up = ($y-1).",".$x;
		$right = $y.",".($x+1);
		$down = ($y+1).",".$x;

		// SET PLAYER ON MAP
		$map[$y][$x] = 'X';

		// SHOW GRID
		foreach ($map as $i => $row) { // ROWS
			foreach ($row as $j => $col) { // COLUMNS
				echo $col;
			}
			echo "\n";
		}
		echo "\n";

		// CLEAR PLAYER ON MAP
		$map[$y][$x] = '.';

		// GET DIRECTION
		do{
			$direction = [$left, $up, $right, $down];
			$direction_rand = array_rand($direction);
			$direction_new = $direction[$direction_rand];

			// CEK CLEAR PATH DIRECTION
		}while(!in_array($direction_new, $clear));
		
		$player = $direction_new;
	}while($player != $treasure);

	echo "Player found treasure in ".$player."\n";

	// SET PLAYER ON LAST MAP
	$p = explode(",", $player);
	$y = $p[0];
	$x = $p[1];
	$left = [$y,($x-1)];
	$upleft = [($y-1),($x-1)];
	$up = [($y-1),$x];
	$upright = [($y-1),($x+1)];
	$right = [$y,($x+1)];
	$downright = [($y+1),($x+1)];
	$down = [($y+1),$x];
	$downleft = [($y+1),($x-1)];
	
	$map[$y][$x] = 'X';
	$map[$left[0]][$left[1]] = '$';
	$map[$upleft[0]][$upleft[1]] = '$';
	$map[$up[0]][$up[1]] = '$';
	$map[$upright[0]][$upright[1]] = '$';
	$map[$right[0]][$right[1]] = '$';
	$map[$downright[0]][$downright[1]] = '$';
	$map[$down[0]][$down[1]] = '$';
	$map[$downleft[0]][$downleft[1]] = '$';

	foreach ($map as $i => $row) { // ROWS
		foreach ($row as $j => $col) { // COLUMNS
			echo $col;
		}
		echo "\n";
	}

	echo "Congratulations";
?>