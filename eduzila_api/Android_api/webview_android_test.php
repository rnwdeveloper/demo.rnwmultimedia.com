<?php
session_start();
echo $_SESSION['dataStored'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
</head>

<body>

</body>

<script type="text/javascript">

    function init(val){
    	//alert(val);
    // Do whatever you want with your parameter val
    sessionStorage.setItem('dataStored', val);
    }
</script>
</html>