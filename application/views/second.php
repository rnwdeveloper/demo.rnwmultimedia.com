
    <main class="main_content d-inline-block view_student_full_sec">
     
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="<?php  echo base_url(); ?>bower_components/orgchart/jquery.orgchart.css" media="all" rel="stylesheet" type="text/css" />
<style type="text/css">
#orgChart{
    width: auto;
    height: auto;
}

#orgChartContainer{
    width: 100%;
    height: 100%;
    overflow: auto;
    background: #eeeeee;
}

    </style>


<h1 style="margin-top:150px;"></h1>
    <div id="orgChartContainer">
      <div id="orgChart"></div>
    </div>
    <div id="consoleOutput">
    </div>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
   <script type="text/javascript" src="<?php  echo base_url(); ?>bower_components/orgchart/jquery.orgchart.js"></script>
    <script type="text/javascript">
    var testData = <?php echo $nn; ?>;
    $(function(){
        org_chart = $('#orgChart').orgChart({
            data: testData,
            showControls: false,
            allowEdit: false,
            // onAddNode: function(node){ 
            //     log('Created new node on node '+node.data.id);
            //     org_chart.newNode(node.data.id); 
            // },
            // onDeleteNode: function(node){
            //     log('Deleted node '+node.data.id);
            //     org_chart.deleteNode(node.data.id); 
            // },
            // onClickNode: function(node){
            //     log('Clicked node '+node.data.id);
            // }

        });
    });

    // just for example purpose
    function log(text){
        $('#consoleOutput').append('<p>'+text+'</p>')
    }
    </script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</main>