
<?php //$this->load->view('cal/header');?>
<style type="text/css">
  .fc-sun { color:red;  }
  .fc-ltr .fc-dayGrid-view .fc-day-top .fc-day-number {
    float: none;
  }
  .fc-day-top { text-align: center!important; }
</style>
  <link href='<?php echo base_url(); ?>cal_package/core/main.css' rel='stylesheet' />
  <link href='<?php echo base_url(); ?>cal_package/daygrid/main.css' rel='stylesheet' />
  <link href='<?php echo base_url(); ?>cal_package/list/main.css' rel='stylesheet' />
  <link href="<?php echo base_url(); ?>cal_package/style.css" rel="stylesheet">

  <main class="main_content d-inline-block">
<section class="showcase" style="background: #fff;">
  <div class="container">
    
    <div class="row">       
      <div class="col-md-12 gedf-main">
        <span id="loading">Loading...</span>
        <span id="load-calendar"></span>
      </div>       
    </div>
  </div>
</section>
</main>

 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>  
  <script src='<?php echo base_url(); ?>cal_package/core/main.js'></script>
  <script src='<?php echo base_url(); ?>cal_package/interaction/main.js'></script>
  <script src='<?php echo base_url(); ?>cal_package/moment/main.js'></script>
  <script src='<?php echo base_url(); ?>cal_package/moment-timezone/main.js'></script>
  <script src='<?php echo base_url(); ?>cal_package/daygrid/main.js'></script>
  <script src='<?php echo base_url(); ?>cal_package/timegrid/main.js'></script>
  <script src='<?php echo base_url(); ?>cal_package/list/main.js'></script>
  <script src='<?php echo base_url(); ?>cal_package/google-calendar/main.js'></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('load-calendar');
 
    var calendar = new FullCalendar.Calendar(calendarEl, {
  
    plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list', 'googleCalendar', 'momentTimezonePlugin', 'momentPlugin'],  
    firstDay: 1,
    locale: 'en',  
    timeZone: 'local',  
    editable: true,
    selectable: true,
    selectHelper: true,
    displayEventTime: true, // don't show the time column in list view
    buttonIcons: true, // show the prev/next text
    weekNumbers: false,
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    
    header: {
      left: 'prevYear, prev,next, nextYear, today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
    },
    
    buttonText: {
      today: "Today",  
      month: "Month",
      week: "Week",
      day : "Day",
      listMonth: 'List'
    },

    googleCalendarApiKey: 'AIzaSyCn2Ko4rxGsf4PudP-NWAVRdvpQdnJf6DU',

    eventSources: [
        {
            url: "en.indian#holiday@group.v.calendar.google.com",
            dataType : 'jsonp',
            className: 'feed_one'
        },
        {
            url: "<?php echo base_url();?>TaskController/loadEventData",
            dataType : 'jsonp',
            className: 'feed_two',  
          },
          {
            url: "<?php echo base_url();?>TaskController/loadTaskData",
            dataType : 'jsonp',
            className: 'feed_three',  
          },
          {
            url: "<?php echo base_url();?>TaskController/loadobTaskData",
            dataType : 'jsonp',
            className: 'feed_three',  
          }
    ],
    
    loading: function(bool) {
      document.getElementById('loading').style.display =
        bool ? 'block' : 'none';
    },
 
    });
 
    calendar.render();
  });
</script>


<?php $this->load->view('cal/footer');?>