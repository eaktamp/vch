<?php session_start();
include "../config/my_con.php";
$todate2 = date('m');
$todate3 = date('Y') + 543;
$todate4 = date('Y') + 1 + 543;
$todate5 = date('Y') - 1 + 543;
if ($todate2 > '10') {
  $betweentodate =   "ระหว่างเดือน ตุลาคม " . $todate3 . " ถึง กันยายน " . $todate4;
} else {
  $betweentodate =   "ระหว่างเดือน ตุลาคม " . $todate5 . " ถึง กันยายน " . $todate3;
}
$yd = $betweentodate;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Abh Report Onlone</title>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/eaktamp.css">
  <script type="text/javascript">
    $(document).ready(function() {
      var shownIds = new Array();
      setInterval(function() {
        $.get("config/realtime_visitperday.php", function(data) {
          data = $.parseJSON(data);
          $("#realtime_visitperday").html("" + data + "");
        });
      }, 1000);
    });
  </script>
</head>
<br>
<body class="container-fluid">
  <div class="content" >
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title text-center hh" style="margin-top:50px" >ข้อมูลจำนวนการรับบริการ ฉีดวัคซีน โรงพยาบาลเจ้าพระยาอภัยภูเบศร</h3>
            <div class=" text-center hh ">ข้อมูล วันที่ <?php echo thaidatefull(date('Y-m-d')) ; ?></div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border" >
              <span class="">
                <!-- <a href="http://172.16.0.251/report/report_form_001.php?sql=sql_0200" title="คลิกเลือกข้อมูลตามช่วงเวลาที่ต้องการ">เลือกข้อมูลตามช่วง</a> -->
              </span>
            </div>
            <center>
              <div style="overflow-x:auto; background-color:#000033" id="realtime_visitperday" >
                <div class="spinner-grow text-secondary" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>
            </center>
          </div>
        </div>
      </div>
    </section> <br>
    <!-- จุดบริการที่ &nbsp;1  &nbsp; ลงทะเบียน <br>
    จุดบริการที่ &nbsp;2  &nbsp; ชั่งน้ำหนักวัดความดันส่วนสูง<br>
    จุดบริการที่ &nbsp;3  &nbsp; ซักประวัติ ประเมินความเสี่ยง ลงนามยินยอม <br>
    จุดบริการที่ &nbsp;4  &nbsp; รอฉีดวัคซีน<br>
    จุดบริการที่ &nbsp;5  &nbsp; ฉีดวัคซีน<br>
    จุดบริการที่ &nbsp;6  &nbsp; พักสังเกตอาการ 30 นาที<br>
    จุดบริการที่ &nbsp;7  &nbsp; รับเอกสาร แนะนำ การปฎิบัติตัวหลังฉีดวัคซีน<br>
    จุดบริการที่ &nbsp;8  &nbsp; test<br> -->
  </div>

  <?php include "config/js.class.php" ?>
</body>

</html>