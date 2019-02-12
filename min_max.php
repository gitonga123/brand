<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

// function solution($lists) {
// 	$listing = [];
// 	$val = 1;
// 	// foreach ($lists as $list) {
// 	// 	foreach ($list as $key => $value) {
//  //       	 echo $value;
//  //       } 
// 	// }
// 	for ($i=0; $i < count($lists); $i++) { 
		
// 		//echo count($lists[$i]);
// 		for ($j=0; $j < count($lists[$i]); $j++) { 
// 			  $val = $val * $lists[$i][$j];
// 		}
// 		$listing[] = $val;
// 		$val = 1;
// 	}
//   print_r($listing);die();
//   return count(array_unique($listing));
// }


// function solution($A) {
//     int $val = 1;
//     for (int $i = 0; $i < count($A); $i++) {
//         for (int $j =0; $j < count($A[$i]); $j++) {
//             $val = $val * $A[$i][$j];
//         }
        
//         $listing[] = $val;
//         $val = 1;
//     }
    
//     return count(array_unique($listing));
// }

// function solution($A) {
// 	$listing = [];
// 	$val = 1;
// 	for ($i=0; $i < count($A); $i++) { 
		
// 		//echo count($A[$i]);
// 		for ($j=0; $j < count($A[$i]); $j++) { 
// 			  $val = $val * $A[$i][$j];
// 		}
// 		$listing[] = $val;
// 		$val = 1;
// 	}
//   return count(array_unique($listing));
// }

function solution($A) {
	$listing = [];
	$val = 0;
	
	foreach ($A as $list) {
	    foreach ($list as $key => $value) {
	        $val = $val + ( $value * $value);
	    }

	    $listing[] = $val;
	    $val = 0;
	}	
  return count(array_unique($listing));
}

echo solution(
							[
							 [0, 5, 4],
							 [0, 0, -3],
							 [-2, 1, -6],
							 [1, -2, 2]
							]
);

