<?php 
	for($i =1;$i<=100;$i++) {

		$flag = checkPrime($i);
		if($flag == 1) {
			echo $i."<br/>";
		}
	}
function checkPrime($num)
{
   if ($num == 1)
   return 0;
   for ($i = 2; $i <= $num; $i++)
   {
      if ($num % $i == 0)
      	return 0;
   }
   return 1;
}
?>