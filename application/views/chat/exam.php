<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <script language ="javascript" >
        var tim = 10000;
        var timset;
        function f1() {
            timset = setInterval("f2()", 1000);
        }
        function f2() {

            tim = parseInt(tim) - 10;
            if (parseInt(tim) < 0) {
                clearInterval(timset);
            }
            else {
                document.getElementById("timershow").value = tim;
                timset = setInterval("f2()", 1000);
            }

        }
    </script>
</head>
<body onload ="f1()" >
    <form id="form1" runat="server">
    <div>
      <input type ="text" id="timershow" />
    </div>
    </form>
</body>
</html>