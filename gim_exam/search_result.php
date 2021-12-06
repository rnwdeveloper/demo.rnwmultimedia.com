<?php 

    ob_start();
    include('header.php');

    if(isset($_REQUEST['full'])){
        $id = $_REQUEST['grid'];
        echo "window.open('https://demo.rnwmultimedia.com/gim_exam/final_result.php?grid=$id', '_blank');";
    }
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<div class="input-group">
    <form class="input-group" method="post">
        <input type="text" id="gr" class="form-control" placeholder="Student GRID" aria-label="udent GRID" name="grid" id="grid">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" name="full">Full</button>
        </div>
    </form>
            <button class="btn btn-outline-secondary" id="submit" onclick="return Result()" type="submit">Submit</button>
</div>
<div id="content" style="margin:2%">

</div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    /* PREPARE THE SCRIPT */

    function Result() {

        var id = document.getElementById("gr").value;
        $.ajax({
            url: "ajax_total_result.php",
            type: "POST",
            data: {
                'grid': id
            },
            success: function (data) {
                // alert(data);
                $('#content').html(data);
            }
        })
    }
</script>
<?php include('footer.php'); ?>