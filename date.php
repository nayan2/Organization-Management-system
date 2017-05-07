<?php 


	// $y = date('Y');
	// 			$m = date('m');
	// 			$d = date('d');
	// 		$start = mktime(8 , 59 , 59, $m, $d, $y);
	// 		$leave = mktime(16 , 59 , 59, $m, $d, $y);

	// 		$current = date('Y-m-d H:i:s');
	// 		$a = time($current);
	// 		$x = date('Y-m-d',$a);
	// 		echo "<br>A ".$x;
	// 		$s = date("Y-m-d H:i:s", $start);
	// 		$l = date("Y-m-d H:i:s", $leave);

	// 		echo "C ".$current;
	// 		echo "<br>S ".$s;
	// 		echo "<br>L ".$l."<br>";

	// 		$t = strtotime($l) - strtotime($s) ;
	// 		echo "string".$t/(60*60);

// $first_day_this_month = date('Y-m-01'); // hard-coded '01' for first day
// $last_day_this_month  = date('Y-m-t');

// echo "<br>".$first_day_this_month;
// echo "<br>".$last_day_this_month;
// if($first_day_this_month < $last_day_this_month) {
// 	echo "first";
// } else {
// 	echo "Last";
// }

	// $cmf = date('Y-05-01');
	// $cml = date('Y-05-t');

	// $crdt = date('Y-m-d H:i:s');
	// $crt = time($crdt);
	// $crd = date('Y-m-d',$crt);

	// echo "F : ".$cmf;
	// echo "</br>L : ".$cml;
	// echo "<br>C : ".$crd;

	// if($cmf < $crd && $crd < $cml) {
	// 	echo "string";
	// }

// $time = strtotime('2014-05-05');
// $final = date("Y-m-d", strtotime("-1 month", $time));

// echo "F : ".$final;

		// $start = mktime(0,0,0,7,12,2015);
		// 	$leave = mktime(8,13,2016);

		// 	$current = date('Y-m-d',$start);

		// 	echo "string".$current;

				$m = date('m');
				for ($i=1; $i <= $m ; $i++) { 
					$cs = mktime(0,0,0,$i,01,2015);
					$cl = mktime(0,0,0,$i,12,2015);

					$cts = date('Y-m-01',$cs);
				$ctl = date('Y-m-t',$cl);
				echo "string1 ".$cts;
				echo "string2 ".$ctl;
				}
				
				$current = date('Y-m-d H:i:s');

				echo "string".$current;

				
 ?>