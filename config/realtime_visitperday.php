
<?php
include "my_con.php";

function thf($datetime)
{
  if (!is_null($datetime)) {
    list($date, $time) = split('T', $datetime);
    list($Y, $m, $d) = split('-', $date);
    $Y = $Y + 543;
    switch ($m) {
      case "01":
        $m = "มกราคม";
        break;
      case "02":
        $m = "กุมภาพันธ์";
        break;
      case "03":
        $m = "มีนาคม";
        break;
      case "04":
        $m = "เมษายน";
        break;
      case "05":
        $m = "พฤษภาคม";
        break;
      case "06":
        $m = "มิถุนายน";
        break;
      case "07":
        $m = "กรกฎาคม";
        break;
      case "08":
        $m = "สิงหาคม";
        break;
      case "09":
        $m = "กันยายน";
        break;
      case "10":
        $m = "ตุลาคม";
        break;
      case "11":
        $m = "พฤศจิกายน";
        break;
      case "12":
        $m = "ธันวาคม";
        break;
    }
    return $d . " " . $m . " " . $Y . "";
  }
  return "";
}

$sql_rt = "select 
sum(case when maxc_point = '1' then 1 else 0 end) as จุดบริการที่1 ,
sum(case when maxc_point = '2' then 1 else 0 end) as จุดบริการที่2,
sum(case when maxc_point = '3' then 1 else 0 end) as จุดบริการที่3,
sum(case when maxc_point = '4' then 1 else 0 end) as จุดบริการที่4,
sum(case when maxc_point = '5' then 1 else 0 end) as จุดบริการที่5,
sum(case when maxc_point = '6' then 1 else 0 end) as จุดบริการที่6,
sum(case when maxc_point = '7' then 1 else 0 end) as จุดบริการที่7,
sum(case when maxc_point = '8' then 1 else 0 end) as จุดบริการที่8,
sum(case when maxc_point  then 1 else 0 end) as ยอดรวมvisit
FROM
(
	select vn,max(c_point)as maxc_point,max(dateupdate)maxdateupdate FROM (
		SELECT vn,c_point,stamp_date,stamp_time,dateupdate FROM vc_stampdata where c_point < 3
		and stamp_date = CURRENT_DATE
    and vn like '64%%'
	)as tmp
	GROUP BY vn
)as countpoint ";
$result_rt = mysqli_query($conn, $sql_rt);



// $dhc_rt =
// '<div class="container-fluid">
// <table class="table">
// <thead>
// <tr>
// <th class="text-center">จุดบริการที่1 </sup></th>
// <th class="text-center">จุดบริการที่2</th>
// <th class="text-center">จุดบริการที่3</th>
// <th class="text-center">จุดบริการที่4</th>
// <th class="text-center">จุดบริการที่5</th>
// <th class="text-center">จุดบริการที่6</th>
// <th class="text-center">จุดบริการที่7</th>
// <th class="text-center">จุดบริการที่8</th>
// </tr>';
// while ($row_result = mysqli_fetch_assoc($result_rt)) {
//  $dhc_rt .= 
//  '<tr>
//  <td class="text-center">'.$row_result['จุดบริการที่1'].'</td>
//  <td class="text-center">'.$row_result['จุดบริการที่2'].'</td>
//  <td class="text-center">'.$row_result['จุดบริการที่3'].'</td>
//  <td class="text-center">'.$row_result['จุดบริการที่4'].'</td>
//  <td class="text-center">'.$row_result['จุดบริการที่5'].'</td>
//  <td class="text-center">'.$row_result['จุดบริการที่6'].'</td>
//  <td class="text-center">'.$row_result['จุดบริการที่7'].'</td>
//  <td class="text-center">'.$row_result['จุดบริการที่8'].'</td>
//  </tr>
//  <thead>
//  </div>';
// }
// $dhc_rt .= '</table>';


$row_result = mysqli_fetch_assoc($result_rt);
$dhc_rt .= '
<div class="container">
<div class="row mt-5">

  <div class="card" style="width: 30rem;height: 250px; margin:6px ">
    <p style ="font-size:25px;color:#015b64 ;">ยอดผู้ป่วยรอฉีดวัคซีน ในวัน </p>
    <div class="card-body">
      <p class="card-text" style="font-size:90px;" >' .  $row_result['จุดบริการที่1'] . '</p>
    </div>
  </div>
  <div class="card" style="width: 30rem;height: 250px; margin:6px ">
  <p style ="font-size:25px;color:#015b64 ;">ฉีดวัคซีนแล้ว  </p>
    <div class="card-body">
      <p class="card-text" style="font-size:90px">' . $row_result['จุดบริการที่2'] . '</p>
    </div>
  </div>

  <p style="font-size:40px;margin:10px;color:white"> ยอดทั้งหมด จำนวน : '.   $row_result['ยอดรวมvisit'].' Visit </p>
</div>

</div>
';

echo json_encode($dhc_rt);
?>
