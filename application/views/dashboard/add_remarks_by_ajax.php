


<?php if(@$this->session->flashdata('msg_alert')) { ?>

	<div class="alert alert-success"><?php echo $this->session->flashdata('msg_alert'); ?></div>
<?php } ?>
<table class="table table-bordered table-striped create_responsive_table">
									  	    <tr class="thead">
									  	    	<th>Remark Date And Time</th>
									  	    	<th>Comment</th>
									  	    	<th>By</th>
									  	    </tr>
									  	  

									  	    <?php foreach($remarks_re as $rem) { ?>
										  	    <tr>
										  	    	<td data-heading="Remark Date And Time"><?php echo $rem->demo_remark_date; ?></td>
										  	    	<td data-heading="Comment"><?php echo $rem->demo_remark_comment; ?></td>
										  	    	<td data-heading="By"><?php echo $rem->demo_remark_by; ?></td>
										  	    </tr>
										  	<?php } ?>
									  	    
									  	  </table>