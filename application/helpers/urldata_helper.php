<script type="text/javascript">
  

  String.prototype.toHHMMSS = function () {
    var sec_num = parseInt(this, 10); // don't forget the second parm
    var hours = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours < 10) {
        hours = "0" + hours;
    }
    if (minutes < 10) {
        minutes = "0" + minutes;
    }
    if (seconds < 10) {
        seconds = "0" + seconds;
    }
    var time = hours + ':' + minutes + ':' + seconds;
    return time;
}

var hms = '<?php echo $_SESSION['l_limit']; ?>';   // your input string
var a = hms.split(':'); // split it at the colons

// minutes are worth 60 seconds. Hours are worth 60 minutes.
var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 
;


var count = seconds.toString(); // it's 00:01:02
// alert(count);


var counter = setInterval(timer, 1000);

function timer() {


    // console.log(count);

    if (parseInt(count) <= 0) {
        clearInterval(counter);
        return;
    }
    var temp = count.toHHMMSS();
    count = (parseInt(count) - 1).toString();
    console.log(temp);
    if(temp == "00:00:01")
    {
      $.ajax({

        url:"<?php echo base_url(); ?>welcome/logout",
        type:'GET'
      });
    }
  // /  $('#timer').html(temp);
}
</script>