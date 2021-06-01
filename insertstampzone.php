<?php
include 'config/db.php';
include_once "./autoload.php";

$obj = new CheckPatient();
$vn = $_POST['text'];

$checkvn = $obj->checkRegistervn($vn);

if($checkvn === true){
    echo "เจอ ให้ไปอัพเดทสเตตัสของ vn หน้า register ";
    $stampvc = $obj->stamp_vaccine_point($vn);
    if($stampvc === true){
        echo "<script>  window.location = 'stampzone.php'</script>"; ;
    }else{echo "<script>  window.location = 'stampzone.php'</script>"; ;}
}else{
    echo "ไม่เจอ";
    echo "<script>  window.location = 'stampzone.php'</script>"; ;
}


