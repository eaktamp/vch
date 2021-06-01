<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>*****************</title>
</head>
<body>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<div class="form__group">
<form name="myForm" id="myForm" target="" action="stamp.php" method="POST">
        <input name="text" value="" maxlength="16"  type="text" class="form__input" id="text" placeholder=" Scan Barcode " required="" autocomplete=off  autofocus  onKeyUp="if(this.value*1!=this.value) this.value='' ;" />
</form>
</div> 
<script type="text/javascript">
    window.onload=function(){
        var auto = setTimeout(function(){ autoRefresh(); }, 100);
        function submitform(){
      //    alert('test');
          document.forms["myForm"].submit();
        }
        // function autoRefresh(){
        //    clearTimeout(auto);
        //    auto = setTimeout(function(){ submitform(); autoRefresh(); }, 10000);
        // }
    }
</script>
</body>
</html>