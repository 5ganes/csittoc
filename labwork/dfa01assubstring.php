<?php
	// dfa that accepts strings containing 01 as substring 
	function isAccepted($inputString) {
		global $currentState; global $finalState; global $dfa;
		for ($i=0; $i < strlen($inputString); $i++) { 
			$s = $inputString[$i]; 
			$currentState = $dfa[$currentState][$s];
		}
		if($currentState == 'q2'){
			return true;
		}
		else{
			 return false;
		}
	}

	$finalState = 'q2';
	$currentState = 'q0';
	$dfa = [
		'q0' => [ '0' => 'q1', '1' => 'q0' ],
		'q1' => [ '0' => 'q1', '1' => 'q2' ],
		'q2' => [ '0' => 'q2', '1' => 'q2' ]
	];

	$inputString = '100101010';    // $input[2] = 1
 	if(isAccepted($inputString) == true) {
 		echo $inputString . ' is accepted';
 	}
 	else{
 		echo $inputString . ' is rejected';
 	}



?>