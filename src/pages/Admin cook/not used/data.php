
<?php

//function is written to slice the list and remove the oth element from the list
function Slice($List){
	for ($i=0; $i < (count($List) - 1); $i++) { 
		$List[($i)] = $List[$i+1];
	}
	unset($List[count($List)-1]);
	return $List;
}

//set the distance array
$_distArr = array();
$_distArr[0][1] = 1;
$_distArr[1][0] = 1;
$_distArr[1][2] = 1;
$_distArr[1][5] = 1;
$_distArr[2][0] = 1;
$_distArr[2][3] = 1;
$_distArr[3][4] = 1;
$_distArr[3][6] = 1;
$_distArr[4][3] = 1;
$_distArr[5][1] = 1;
$_distArr[5][6] = 1;
$_distArr[5][8] = 1;
$_distArr[6][3] = 1;
$_distArr[6][5] = 1;
$_distArr[6][10] = 1;
$_distArr[7][8] = 1;
$_distArr[8][5] = 1;
$_distArr[8][7] = 1;
$_distArr[8][9] = 1;
$_distArr[8][12] = 1;
$_distArr[9][8] = 1;
$_distArr[10][6] = 1;
$_distArr[10][11] = 1;
$_distArr[10][13] = 1;
$_distArr[11][10] = 1;
$_distArr[12][8] = 1;
$_distArr[12][13] = 1;
$_distArr[12][15] = 1;
$_distArr[13][10] = 1;
$_distArr[13][12] = 1;
$_distArr[13][17] = 1;
$_distArr[14][15] = 1;
$_distArr[15][14] = 1;
$_distArr[15][16] = 1;
$_distArr[16][15] = 1;
$_distArr[16][17] = 1;
$_distArr[17][13] = 1;
$_distArr[17][16] = 1;
$_distArr[17][18] = 1;
$_distArr[18][17] = 1;

//the start and the end
$a = 0;
$n = $_GET['number'];


function Dijkstra($_distArr, $source, $vertex){
$S = array();//the nearest path with its parent and weight
$Q = array();//the left nodes without the nearest path
foreach(array_keys($_distArr) as $val) $Q[$val] = 99999;
$Q[$source] = 0;

//start calculating
while(!empty($Q)){
    $min = array_search(min($Q), $Q);//the most min weight
    if($min == $vertex) break;
    foreach($_distArr[$min] as $key=>$val) if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
        $Q[$key] = $Q[$min] + $val;
        $S[$key] = array($min, $Q[$key]);
    }
    unset($Q[$min]);
}

//list the path
$path = array();
$pos = $vertex;
while($pos != $source){
    $path[] = $pos;
    $pos = $S[$pos][0];
}
$path[] = $source;
$path = array_reverse($path);
$length = $S[$vertex][1];
$Output = array($length,$path);
//echo "Distance = $Output[0]" . "<br />";
//echo "<br />Path is ".implode('->', $Output[1]);
return $Output;
}

function Pathfinder($List,$_distArr){
	$path = array();
	$source = 0;

	while (count($List) > 0) {
		$distance_path = array();
		foreach ($List as $i) {
			$details = Dijkstra($_distArr, $source, $i);
			array_push($distance_path,$details);
		}
		/*echo "distance_path = ";
		print_r($distance_path) . "<br/>";
		echo "count of distance_path = " . count($distance_path) . "count of List = ".count($List) ."<br/>";*/

		do
	{
		$swapped = false;
		for( $i = 0, $c = count( $distance_path ) - 1; $i < $c; $i++ )
		{
			if( $distance_path[$i][0] > $distance_path[$i + 1][0] )
			{
				list( $distance_path[$i + 1], $distance_path[$i] ) =
						array( $distance_path[$i], $distance_path[$i + 1] );
				$swapped = true;
			}
		}
	}
	while( $swapped );
		$path = array_merge($path, $distance_path[0][1]);
		$source = $distance_path[0][0];
		$List = Slice($List);
	}

	echo "path:";
	echo "<pre>";
	print_r($path);
	echo "</pre>";

	return $path;

}

$route = Pathfinder($n,$_distArr);
//echo "<br />Path is ".implode('->', $route[1]);
//$test = Dijkstra($_distArr,0,18);
//echo "Distance = $test[0]" . "<br />";
//echo "<br />Path is ".implode('->', $test[1]);

$distance_path = array();
foreach ($n as $i) {
			$details = Dijkstra($_distArr, 0, $i);
			array_push($distance_path,$details);
		}

$List = $n;
$length = sizeof($List);
//print_r($List)."<br/>";






?>