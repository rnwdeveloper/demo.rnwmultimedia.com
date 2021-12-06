<div class="row">
               <div class="col-md-12 mt-3">
                  <div class="row">
                  <?php foreach($single_reco_demo as $val) {?>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Demo Id:</label> 
                           <b><span  name="demo_id" id="demo_id"><?php echo @$val->demo_id?></span></b>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Name:</label> 
                           <b><span name="stu_name" id="stu_name" ></span></b>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label> Mobile Number:</label> 
                           <b><span name="mob_number" id="mob_number"  ></span></b>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label id="pack_or_cor"></label> 
                           <b><span name="cour_or_peck" id="cour_or_peck" ></span></b>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label id="s_pac_cor"></label> 
                           <b><span name="starting_course" id="starting_course"></span></b>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Demo Date:</label> 
                           <b><span name="starting_date" id="starting_date"></span></b>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Demo Time:</label> 
                           <b><span name="de_time" id="de_time" ></span></b>
                        </div>+
                     </div>
                     <div class="col-lg-5">
                        <div class="form-group">
                           <label>Faculty name:</label> 
                           <b><span name="fac_name" id="fac_name" ></span></b>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Total Attendence:</label> 
                           <b><span name="total_att" id="total_att" ></span></b>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Demo Status:</label>
                           <b><?php  ?></b>
                        </div>
                     </div>
                  </div>
                  <?php }?>
               </div>
            </div>