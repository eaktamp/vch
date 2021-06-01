<?php
    include 'config/db.php';
    date_default_timezone_set('Asia/Bangkok');
  
    $date_time = DATE('Y-m-d H:i:s');
    $stamp_date = DATE('Y-m-d');
    $stamp_time = DATE('H:i:s');

    $vn = substr($_POST['text'],3);

     $sql_checkpoint = " SELECT vn,c_point,stamp_date,stamp_time,dateupdate FROM vc_stampdata WHERE vn = $vn ORDER BY dateupdate DESC LIMIT 1 ";
     $respoint   = mysqli_query($conn, $sql_checkpoint);
     $rowpoint   = mysqli_fetch_array($respoint);

     $rowpoint['c_point'];
     $rowpoint['vn'];
     $rowpoint['stamp_date'];
     $time_check = $rowpoint['stamp_time'];
     
     function diff2time($time_a,$time_b){
         $now_time1=strtotime(date("Y-m-d ".$time_a));
         $now_time2=strtotime(date("Y-m-d ".$time_b));
         $time_diff=abs($now_time2-$now_time1);
         $time_diff_h=floor($time_diff/3600);
         $time_diff_m=floor(($time_diff%3600)/60); 
         $time_diff_s=($time_diff%3600)%60;
         return $time_diff_m;
     }
  $cdate =   diff2time($stamp_time,$time_check);
  // $stamp_time;
//echo $time_check;

// if (diff2time($stamp_time,$time_check) > 0 ) {

    $sql_checkvn = " SELECT COUNT(*) AS vsum FROM vc_stampdata WHERE vn = $vn ";
    $resvn   = mysqli_query($conn, $sql_checkvn);
    $rowvn   = mysqli_fetch_array($resvn);
    $c_point = $rowvn['vsum']+1;
 	$sql = " INSERT INTO vc_stampdata (vn,c_point,stamp_date,stamp_time,vc_status,vc_check,vc_zone,check_datetime)
                 VALUES ('$vn','$c_point','$stamp_date','$stamp_time','Y','OK','Cpa10665','$cdate')";

    // if($c_point == 1){
    //     $sql2 = " INSERT INTO vc_stampdata (vn,c_point,stamp_date,stamp_time,vc_status,vc_check,vc_zone,check_datetime)
    //              VALUES ('$vn','2','$stamp_date','$stamp_time','Y','OK','Cpa10665','$cdate')";
    //              mysqli_query($conn, $sql2)
    // }


if (mysqli_query($conn, $sql)) {
      header( "location: stamp.php" );
      exit(0);
  }else {
      header( "location: stamp.php" );
	}
    mysqli_close($conn);
 //} //else {
//     header( "location: index.php" );
    
// }


?>






