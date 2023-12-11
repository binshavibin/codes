<?php
	function getSum($num1,$num2) 
	{   

		$arr = array(10,20,30,40,50,60,70,80,90,100);
		if($num1 < 0 || $num2 < 0) {
			return '-1';
		} else if($num2 < $num1) {
			return 0;
		} else {
			$start = array_search($num1, $arr);
			$end 	= array_search($num2, $arr);
			if($start <= 0 && $end <=0 ) {
				return 0;
			} else {
				if($end <=0) {
					$end = count($arr)-1;

				}
				$sum  = 0;
				for($sl =$start ;$sl<= $end;$sl++ ) {
					$sum += $arr[$sl];
				}
				return $sum;
			}
		}
	}

	echo getSum(110,120);
?>