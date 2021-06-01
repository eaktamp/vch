<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register point Check visit </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="card mt-5 shadow">
            <div class="card-header">
                จุดลงทะเบียนฉีดวัคซีน
            </div>
            <div class="card-body ">
                <h2 class="card-title">โปรดตรวจสอบข้อมูลด้านล่างว่าเป็นของท่านหรือไม่แล้วกดยืนยันการลงทะเบียน </h2>
                <br>
                <p class="card-text">
                    <?php
                    require_once("autoload.php");
                    $vn = $_POST['text'];
                    if (strlen($vn) == 15) {
                        $vn = substr($_POST['text'], 3);
                    }
                    $obj = new CheckPatient();
                    $sql = $obj->checkvn($vn);
                    $rowcc =  pg_numrows($sql);
                    while ($row = pg_fetch_assoc($sql)) {
                        $hn = $row['hn'];
                        $pname =  $row['pname'];
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $vstdate = $row['vstdate'];
                        $cid = $row['cid'];
                    ?>

                <h5 class="text-center mb-5">
                    <hr />
                    <?php echo '<B> ชื่อ-สกุล : ' .   $pname  .  $fname . ' ' . $lname . '</B>' ?><br>
                    <?php echo 'วันที่ส่งตรวจ ' . DateThai($row['vstdate'] . $row['vsttime']); ?><br>
                    <?php echo 'clinic. ' . $row['clinic']; ?><br>
                    <?php echo 'visit no. ' .  $row['vn']; ?><br>
                    <?php echo 'เลขประจำตัวผู้ป่วย (hn) : ' .  $hn; ?><br>
                    <?php echo 'cid  : ' .  $cid; ?><br>
                    <hr>
                </h5>

            <?php } ?>
            <?php if ($rowcc < 1) {
                echo "<hr ><h1 class='text-center text-warning'>ไม่พบข้อมูล visit โปรดติดต่อห้องบัตรหรือเจ้าหน้าที่ </h1><hr>";
            } ?>
            </p>


            <form action="insertregister.php" method="post">
                <div class="d-grid gap-2">
                    <input type="text" hidden name="hn" value="<?= $hn ?>">
                    <input type="text" hidden name="vstdate" value="<?= $vstdate; ?>">
                    <input type="text" hidden name="vn" value="<?= $vn ?>">
                    <input type="text" hidden name="pname" value="<?= $pname ?>">
                    <input type="text" hidden name="fname" value="<?= $fname ?>">
                    <input type="text" hidden name="lname" value="<?= $lname ?>">
                    <input type="text" hidden name="cid" value="<?= $cid ?>">
                    <button type="submit" value="submit" name="submit" class="btn btn-primary btn-lg btn-block" style="height: 250px;" <?php if ($rowcc < 1) echo "disabled" ?>>ลงทะเบียนฉีดวัคซีน Covid 19</button>
                    <button type="reset" class="btn btn-secondary btn-lg  btn-block " style="height: 150px; " onclick="location.href='register.php'">ยกเลิก</button>
                </div>
            </form>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>