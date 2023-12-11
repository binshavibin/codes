<?php 
	function checkArmstrong($num) 
	{
		$total=0;  
		$x=$num;  
		while($x !=0) {
			 $rem = $x%10;
			$total = $total+($rem*$rem*$rem);
			$x = round($x/10);		
		}
		if($total == $num) {
			echo $num .' is armstrong <br/>';
		}
	}

	for($i =100 ; $i<1000;$i++) {
		checkArmstrong($i);
	}
	
?>