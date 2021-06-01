<?php
define('DB_SERVER', '172.16.0.251');
define('DB_USER', 'report');
define('DB_PASS', 'report');
define('DB_NAME', 'screencoviddb');

function DateThai($strDate)
{
	$strYear = date("Y", strtotime($strDate)) + 543;
	$strMonth = date("n", strtotime($strDate));
	$strDay = date("j", strtotime($strDate));
	$strHour = date("H", strtotime($strDate));
	$strMinute = date("i", strtotime($strDate));
	$strSeconds = date("s", strtotime($strDate));
	$strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
	$strMonthThai = $strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
}

class CheckPatient
{
	public  $mycon;
	public function __construct()
	{
		$this->mycon = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		mysqli_set_charset($this->mycon, "utf8");

		$connstring = "host=172.16.0.192 dbname=cpahdb user=iptscanview password=iptscanview";
		$pgcon = pg_connect($connstring);
		pg_set_client_encoding($pgcon, "utf8");
	}

	public function checkvn($vn)
	{
		$sql = "SELECT ov.vn,ov.hn,ov.vstdate,ov.vsttime,
		pt.pname,pt.fname,pt.lname,ksk.department as clinic
		FROM ovst ov
		INNER JOIN patient pt on pt.hn = ov.hn
		INNER JOIN kskdepartment ksk on ksk.depcode = ov.main_dep
		where 1=1 
		AND ov.vn = '$vn'
		--AND ov.vstdate = CURRENT_DATE 
		-- AND main_dep = '502'";
		$query = pg_query($sql);
		return  $query;
	}

	public function Insertregisterpt($value1, $value2, $value3, $value4, $value5, $value6)
	{
		$sqlinsert  = "INSERT INTO screen_register (vn,vstdate,hn,pname,fname,lname) values ('$value1','$value2','$value3','$value4','$value5','$value6');";
		$queryi = mysqli_query($this->mycon, $sqlinsert);
		return $queryi;
	}

	public function Insertptstamp($vn, $c_point, $stamp_date, $stamp_time)
	{
		$select = "select count(*)as cc from vc_stampdata where vn = '$vn'";
		$querys = mysqli_query($this->mycon, $select);
		$rscountvn = mysqli_fetch_array($querys);
		$rscountvn['cc'];
		if($rscountvn['cc'] < '1'){
			 $sqlinsert  = " INSERT INTO vc_stampdata (vn,c_point,stamp_date,stamp_time,vc_status,vc_check,vc_zone,check_datetime) VALUES ('$vn','$c_point','$stamp_date','$stamp_time','Y','OK','Cpa10665','0')";
			$queryi = mysqli_query($this->mycon, $sqlinsert);
			return $queryi;
		}else{	return false;}
	

	
	}


}
