<?php
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
$_distArr[2][1] = 1;
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
$_distArr[15][12] = 1;
$_distArr[15][14] = 1;
$_distArr[15][16] = 1;
$_distArr[16][15] = 1;
$_distArr[17][13] = 1;
$_distArr[17][18] = 1;
$_distArr[18][17] = 1;

//the start and the end
$a = 0;
//$List = $_GET['number'];
$List = array(2,4,11,18);


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

/*def PathFinder (List):
    Path = []
    Location = 0

    while len(List) > 0:
        
        distanceList = []
        for i in List:
            distanceList.append(g.dijkstraDist(Location,i))
        #print "dist :", distanceList
        #bibble sort
        for j in range(len(List)-1,0,-1):
            for i in range(j):
                if distanceList[i] > distanceList[i+1]:
                    tempList = List[i]
                    tempDist = distanceList[i]
                    List[i] = List[i+1]
                    distanceList[i] = distanceList[i+1]
                    List[i+1] = tempList
                    distanceList[i+1] = tempDist

        Path+=(g.dijkstraPath(Location,List[0]))
        Location = List[0]
        List = List[1:]

    return Path*/


function Pathfinder($List,$_distArr){
	$path = array();
	$source = 0;

	while (count($List) > 0) {
		$distance_path = array();
		foreach ($List as $i) {
			$details = Dijkstra($_distArr, $source, $i);
			array_push($distance_path,$details);
		}
		echo "deatils:";
	echo "<pre>";
	print_r($distance_path);
	echo "</pre>";

		/*echo "distance_path = ";
		print_r($distance_path) . "<br/>";
		echo "count of distance_path = " . count($distance_path) . "count of List = ".count($List) ."<br/>";*/

	/*
	$size = count($distance_path)-1;
    for ($i=0; $i<$size; $i++) {
        for ($j=0; $j<$size-$i; $j++) {
            $k = $j+1;
            if ($distance_path[$k][0] < $distance_path[$j][0]) {
                // Swap elements at indices: $j, $k
                list($distance_path[$j], $distance_path[$k]) = array($distance_path[$k], $distance_path[$j]);
            }
        }
    }*/


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

$route = Pathfinder($List,$_distArr);
//echo "<br />Path is ".implode('->', $route[1]);
//$test = Dijkstra($_distArr,0,18);
//echo "Distance = $test[0]" . "<br />";
//echo "<br />Path is ".implode('->', $test[1]);

$distance_path = array();
foreach ($List as $i) {
			$details = Dijkstra($_distArr, 0, $i);
			array_push($distance_path,$details);
		}

$length = sizeof($List);
//print_r($List)."<br/>";

$data = array(
        array(array(1, -1, -1, -1, 1)),
        array(array(0, -1, 2, 5, 0), array(2, 5, 0, -1, 2), array(5, 0, -1, 2, 5)),
        array(array(1, -1, 3, -1, 1), array(3, -1, 1, -1, 3)),
        array(array(2, -1, 4, 6, 2), array(4, 6, 2, -1, 4, array(6, 2, -1, 4, 6))),
        array(array(3, -1, -1, -1, 3)),
        array(array(1, 6, 8, -1, 1), array(6, 8, -1, 1, 6)),
        array(array(3, -1, 10, 5, 3), array(5, 3, -1, 10, 5), array(10, 5, 3, -1, 10)),
        array(array(8, -1, -1, -1, 8)),
        array(array(5, 9, 12, 7, 5), array(7, 5, 9, 12, 7), array(9, 12, 7, 5, 9), array(12, 7, 5, 9, 12)),
        array(array(8, -1, 10, -1, 8), array(10, -1, 8, -1, 10)),
        array(array(6, 11, 13, 9, 6), array(9, 6, 11, 13, 9), array(11, 13, 9, 6, 11), array(13, 9, 6, 11, 13)),
        array(array(10, -1, -1, -1, 10)),
        array(array(8, 13, 15, -1, 8), array(13, 15, -1, 8, 13), array(15, -1, 8, 13, 15)),
        array(array(10, -1, 17, 12, 10), array(12, 10, -1, 17, 12), array(17, 12, 10, -1, 17)),
        array(array(15, -1, -1, -1, 15)),
        array(array(12, 16, -1, 14, 12), array(14, 12, 16, -1, 14), array(16, -1, 14, 12, 16)),
        array(array(15, -1, 17, -1, 15), array(17, -1, 15, -1, 17)),
        array(array(13, 18, -1, 16, 13), array(16, 13, 18, -1, 16), array(18, -1, 16, 13, 18)),
        array(array(17, -1, -1, -1, 17)));


function directionFinder($data,$route){
	$direction = array();

        for ($i=1; $i < count($route) - 1; $i++){
        $k = $route[$i - 1];
        $l = $route[$i + 1];

        	for ($j = 0; $j < count($data[$route[$i]]); $j++){

            	if ($data[$route[$i]][$j][0] == $k){
	                if($l == $data[$route[$i]][$j][1]){
	                    $direction[count($direction)+1] = "L";
	                    $direction[count($direction)+1] = "F";
	                }
	                else if($l == $data[$route[$i]][$j][2]){
	                    $direction[count($direction)+1] = "F";
	                }
	                else if($l == $data[$route[$i]][$j][3]){
	                    $direction[count($direction)+1] = "R";
	                    $direction[count($direction)+1] = "F";
	                }
	                else if($l == $data[$route[$i]][$j][4]){
	                    $direction[count($direction)+1] = "B";
	                    $direction[count($direction)+1] = "F";
	                }
				}
			}
		}
echo "Directions:";
	echo "<pre>";
	print_r($direction);
	echo "</pre>";
return $direction;

}

$directionList = directionFinder($data,$route);

?>