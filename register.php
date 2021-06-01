<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title> Register Point </title>
</head>

<body onclick="getfocus()">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <div class="form__group">
        <h1>สแกน Barcode visit number(vn) ลงทะเบียน</h1>
        <form name="myForm" id="myForm" target="" action="stampregister.php" method="POST">
            <label for="text">สแกนหมายเลข VN(visit number)</label>
            <input name="text" value="" type="text" class="form__input" id="text" maxlength="15" placeholder=" Scan Barcode " required="" autocomplete=off autofocus onKeyUp="if(this.value*1!=this.value) this.value='' ;" />
        </form>

    </div>
    <script type="text/javascript">
        window.onload = function() {
            var auto = setTimeout(function() {
                autoRefresh();
            }, 100);

            function submitform() {
                document.forms["myForm"].submit();
            }
        }
        function getfocus() {
            document.getElementById("text").focus();
        }

        
    </script>


</body>

</html>