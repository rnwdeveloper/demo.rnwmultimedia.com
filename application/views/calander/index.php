<?php 

$con = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb");


$q = "SELECT * FROM event";
$q1 = mysqli_query($con,$q);
$q2 = mysqli_fetch_all($q1,MYSQLI_ASSOC);
// echo "<pre>";
// print_r($q2);
// die;
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>HTML5/JavaScript Calendar with Day/Week/Month Views (PHP. MySQL)</title>

  <style type="text/css">
    p, body, td { font-family: Tahoma, Arial, Helvetica, sans-serif; font-size: 10pt; }
    body { padding: 0px; margin: 0px; background-color: #ffffff; }
    a { color: #1155a3; }
    .space { margin: 10px 0px 10px 0px; }
    .header { background: #003267; background: linear-gradient(to right, #011329 0%,#00639e 44%,#011329 100%); padding:20px 10px; color: white; box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.75); }
    .header a { color: white; }
    .header h1 a { text-decoration: none; }
    .header h1 { padding: 0px; margin: 0px; }
    .main { padding: 10px; margin-top: 10px; }
  </style>

  <style>
    .toolbar {
      margin: 10px 0px;
    }

    .toolbar > .toolbar-item:not(:last-child) {
      border-right: 1px solid #ccc;
    }

    .toolbar-item {
      padding: 0px 10px;
    }

    .toolbar-item a {
      text-decoration: none;
      color: black;
      display: inline-block;
      margin-right: 5px;
      font-size: 14px;
    }
    .selected-button {
      border-bottom: 2px solid orange;
    }
  </style>

  <script src="<?php echo base_url(); ?>js/daypilot/daypilot-all.min.js"></script>
  <script src="<?php echo base_url(); ?>js/daypilot/jquery-1.9.1.min.js"></script>

</head>
<body>

  <h1><a href='https://code.daypilot.org/27988/html5-calendar-with-day-week-month-views-javascript-php'></a></h1>
  <a href="https://javascript.daypilot.org/"></a>


<div class="main">
  <div style="float:left; width: 220px;">
    <div id="nav"></div>
  </div>
  <div style="margin-left: 220px;">
    <div class="toolbar buttons">
      <span class="toolbar-item"><a id="buttonDay" href="#">Day</a></span>
      <span class="toolbar-item"><a id="buttonWeek" href="#">Week</a></span>
      <span class="toolbar-item"><a id="buttonMonth" href="#">Month</a></span>
    </div>
    <div id="dpDay"></div>
    <div id="dpWeek"></div>
    <div id="dpMonth"></div>
  </div>

</div>

<script type="text/javascript">


  var nav = new DayPilot.Navigator("nav");
  nav.showMonths = 3;
  nav.skipMonths = 3;
  nav.init();

  var day = new DayPilot.Calendar("dpDay");
  day.viewType = "Day";
  addEventHandlers(day);
  day.init();

  var week = new DayPilot.Calendar("dpWeek");
  week.viewType = "Week";
  addEventHandlers(week);
  week.init();

  var month = new DayPilot.Month("dpMonth");
  addEventHandlers(month);
  month.init();

  function addEventHandlers(dp) {
    dp.onEventMoved = function (args) {
      $.post("backend_move.php",
        {
          id: args.e.id(),
          newStart: args.newStart.toString(),
          newEnd: args.newEnd.toString()
        },
        function() {
          console.log("Moved.");
        });
    };

    dp.onEventResized = function (args) {
      $.post("backend_resize.php",
        {
          id: args.e.id(),
          newStart: args.newStart.toString(),
          newEnd: args.newEnd.toString()
        },
        function() {
          console.log("Resized.");
        });
    };

    // event creating
    dp.onTimeRangeSelected = function (args) {

      DayPilot.Modal.prompt("New event name:", "Event").then(function(modal) {
        dp.clearSelection();

        if (!modal.result) {
          return;
        }

        $.post("<?php echo base_url(); ?>TaskController/backend_create",
          {
            start: args.start.toString(),
            end: args.end.toString(),
            name: modal.result
          },
          function(data) {
            var e = new DayPilot.Event({
              start: args.start,
              end: args.end,
              id: data.id,
              resource: args.resource,
              text: modal.result
            });
            dp.events.add(e);
            //$('#sparkContainer').add("div");
            var sparkLines = $('.sparkLines');
            $(".modal_default_inner").append("hello 12345...");
            
          }
        );

      });
    };

    dp.onEventClick = function(args) {

    };
  }

  var switcher = new DayPilot.Switcher({
    triggers: [
      {id: "buttonDay", view: day },
      {id: "buttonWeek", view: week},
      {id: "buttonMonth", view: month}
    ],
    navigator: nav,
    selectedClass: "selected-button",
    onChanged: function(args) {
      console.log("onChanged fired");
      switcher.events.load("<?php echo base_url(); ?>TaskController/backend_events");
    }
  });

  switcher.select("buttonDay");

</script>

</body>
</html>






