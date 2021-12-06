<!DOCTYPE html>
<html lang="en">

<head id="hd">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title id="title">2244 - Harsh Malaviya</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <br><br>
    <p></P>

    <div id="content" class="container border border-dark">
        <div class="head d-flex justify-content-between align-items-center">
            <img src="assets/images/rw_red.png" height="150px" width="150px" alt="">
            <div class="text-center">
                <h1>Result Hosting</h1>
                <h2 class="px-4 py-3 bg-danger"><b style="color:white">Red & White Group of Institutes</b></h2>
            </div>
            <img src="assets/images/rw_red.png" height="150px" width="150px" alt="">
        </div>
        <div class="text-center">
            <h1 class="text-uppercase">Harsh Malaviya</h1>
            <p class="mb-0">Email : abc@gmail.com</p>
            <br><br>
        </div>
        <div class="text-center">
            <h1 class="text-uppercase">GIM Exam Result</h1>
            <h4 class="mb-0">G.I.M</h4>
            <br>
        </div>
        <form method="post" class="mb-4">
            <label for="" class="w-25">GRID</label> : <u class="">2211</u><br />
            <label for="" class="w-25">Student's Name</label> : <u class="">Abc Xyz</u><br />
            <label for="" class="w-25">DOB</label> : <u class="">Abc Xyz</u>
        </form>
        <?php include('ajax_final_result.php'); ?>
        <br><br>
        <div class="w-100 d-flex justify-content-center">
            <h5><a href="https://www.rnwmultimedia.com" target="_blank">rnwmultimedia.com</a></h5>
        </div>
        <br><br>

    </div>


    <br><br>
    <p></P>

    <center>
        <a href="javascript:demoFromHTML()">
            <button id="extra" class="btn btn-outline-success">Download PDF</button>
        </a>
    </center>

    <br><br>
    <div id="editor"></div>


    <script>
      
       

        // var doc = new jsPDF();
        // var specialElementHandlers = {
        //     '#editor': function (element, renderer) {
        //         return true;
        //     }
        // };


        // $('#extra').click(function() {
        // var options = {};
        // var pdf = new jsPDF('p', 'pt', 'a4');
        // pdf.addHTML($("#content"), 15, 15, options, function() {
        //     pdf.save('pageContent.pdf');
        // });
        // });
            // var z= document.getElementsByTagName("body");
        var x = document.getElementById("extra");
        
        x.addEventListener("click", function () {
         
            document.getElementById("title").style.visibility = "hidden";
            x.style.visibility = "hidden";
            var y = document.getElementById("content");
            print(y);
        });
    </script>

</body>

</html>