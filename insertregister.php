<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <?php
    require_once("autoload.php");
    $hn = $_POST['hn'];
    $vn = $_POST['vn'];
    $vstdate = $_POST['vstdate'];
    $pname = $_POST['pname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $stamp_date = DATE('Y-m-d');
    $stamp_time = DATE('H:i:s');

    $insertdata = new CheckPatient;
    $query = $insertdata->Insertregisterpt($vn, $vstdate, $hn, $pname, $fname, $lname);
    // $query2 = $insertdata->Insertptstamp($vn,'1', $stamp_date, $stamp_time, $stamp_time);
   

    if ($query //&& $query2
    ) {
        echo "<script>
        let timerInterval
        Swal.fire({
         icon: 'Success',
          title: 'บันทึกข้อมูลสำเร็จ!',
          html: 'จะกลับไปหน้าลงทะเบียนใน <b></b> milliseconds.',
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
              const content = Swal.getContent()
              if (content) {
                const b = content.querySelector('b')
                if (b) {
                  b.textContent = Swal.getTimerLeft()
                }
              }
            }, 100)
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
          }
        }).then(function() {
            window.location = 'register.php';
        })
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'เคยบันทึกข้อมูลนี้ไปแล้ว',
            showConfirmButton: false,
            timer: 1000
          }).then(function() {
            window.location = 'register.php';
        })
        </script>";
    }


    ?>
</body>

</html>