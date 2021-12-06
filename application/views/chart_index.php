<style type="text/css">
/*	html, body {
    margin: 0px;
    padding: 0px;
    width: 100%;
    height: 100%;
    overflow: hidden;
    font-family: Helvetica;
}*/

#tree {
    width: 100%;
    height: auto;
}
</style>

<main class="main_content d-inline-block">
	<section class="page_title_block d-inline-block w-100 position-relative pb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="page_heading">
						<h1>Chart Board</h1>
					</div>
				</div>
			</div>
			<br>
			<!-- <div class="row">
				<div class="col-lg-6">
					
                                    <input type="hidden" id="fromdate" name="filter_startDate" value="">
                                    <input type="hidden" id="todate" name="filter_endDate" value="">
                                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                        <i class="fa fa-calendar"></i>&nbsp;<span><?php echo date('d-m-Y')."-".date('d-m-Y'); ?></span>
                                        <i class="fa fa-caret-down"></i>
                                    </div>
                                
				</div>

			</div> -->
			<br>
			<div class="row">
			<div class="col-md-12">
				<div id="tree"></div>
			</div>
			</div>

			<!-- <div class="row">
											<div class="col-lg-4 col-md-12">
												<div class="graph_box_block">
													<form>
														<div class="graph_box_block_1_form">
															<div class="btn-group w-100">
																<select class="form-control">
																	<option>Select Branch</option>
																	<option>YOGI CHOWK</option>
																</select>
																<button type="button" class="btn btn-success">Filter</button>
																<button type="button" class="btn btn-danger">Reset</button>
															</div>
														</div>
													</form>
													<span class="total_demo_count">Total Demo : 0</span>
												</div>
											</div>
											<div class="col-lg-4 col-md-12">
												<div class="graph_box_block">

													<span class="total_demo_count">Total Demo : 0</span>
												</div>
											</div>
											<div class="col-lg-4 col-md-12 mx-auto">
												<div class="graph_box_block">

													<span class="total_demo_count">Total Demo : 0</span>
												</div>
											</div>
										</div> -->


		</div>



	</section>
	
</main>


<?php include('footer_test.php'); ?>
 
<script src="https://balkangraph.com/js/latest/OrgChart.js"></script>
<script type="text/javascript">
  


window.onload = function () {
    var chart = new OrgChart(document.getElementById("tree"), {
        enableDragDrop: false,
        // tags: {
        //     "assistant": {
        //         template: "ula"
        //     }
        // },
        // nodeMenu: {
        //     details: { text: "Details" },
        //     edit: { text: "Edit" },
        //     add: { text: "Add" },
        //     remove: { text: "Remove" }
        // },
        nodeBinding: {
            field_0: "name",
            field_1: "title",
            img_0: "img"
        },

        nodes:<?php echo $nn; ?>
        // nodes: [
        //     { id: 1, name: "Denny Curtis", title: "CEO", img: "https://cdn.balkan.app/shared/2.jpg" },
        //     { id: 2, pid: 1, name: "Ashley Barnett", title: "Sales Manager", img: "https://cdn.balkan.app/shared/3.jpg" },
        //     { id: 3, pid: 1, name: "Caden Ellison", title: "Dev Manager", img: "https://cdn.balkan.app/shared/4.jpg" },
        //     { id: 4, pid: 2, name: "Elliot Patel", title: "Sales", img: "https://cdn.balkan.app/shared/5.jpg" },
        //     { id: 5, pid: 2, name: "Lynn Hussain", title: "Sales", img: "https://cdn.balkan.app/shared/6.jpg" },
        //     { id: 6, pid: 3, name: "Tanner May", title: "Developer", img: "https://cdn.balkan.app/shared/7.jpg" },
        //     { id: 8, pid: 1, tags: ["assistant"], name: "Rudy Griffiths", title: "Assistant", img: "https://cdn.balkan.app/shared/9.jpg" },
        // ]
    });
};

</script>







