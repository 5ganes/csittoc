<?php
	// dfa that accepts strings which do not contain 3 consecutive 0s 
	function isAccepted($inputString) {
		global $currentState; global $finalState; global $dfa;
		for ($i=0; $i < strlen($inputString); $i++) { 
			$s = $inputString[$i]; 
			$currentState = $dfa[$currentState][$s];
		}
		foreach ($finalState as $fState) {
			if($currentState == $fState){
				return true;
			}
		}
		// for ($i=0; $i < count($finalState); $i++) { 
		// 	if($currentState == $finalState[$i]){
		// 		return true;
		// 	}
		// }

		return false;
	}

	$finalState = [ 'q0', 'q1', 'q2' ];
	$currentState = 'q0';
	$dfa = [
		'q0' => [ '0' => 'q1', '1' => 'q0' ],
		'q1' => [ '0' => 'q2', '1' => 'q0' ],
		'q2' => [ '0' => 'q3', '1' => 'q0' ],
		'q3' => [ '0' => 'q3', '1' => 'q3' ]
	];

	$inputString = '110001';    // $input[2] = 1
 	if(isAccepted($inputString) == true) {
 		echo $inputString . ' is accepted';
 	}
 	else{
 		echo $inputString . ' is rejected';
 	}

?>