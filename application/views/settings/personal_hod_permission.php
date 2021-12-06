<style type="text/css">
  .save-button{
    float: right;
      color: #fff !important;
      margin: 2px 13px 0 0;
  }
  .search-block{
    padding: 10px 0px;
  }
  .search-box{
      height: 36px;
      line-height: 15px;
      padding: 0 5px;
  }
</style>
<main class="main_content d-inline-block">
  <section class="coman_design_block d-inline-block w-100 position-relative">
    <div class="container-fluid">
      <div class="row search-block">
        <div class="col-md-12">
          <form action="<?php echo base_url(); ?>settings/personal_hod_permission_all_data">
            <input class="search-box" type="text" name="search" placeholder="Enter search name..." value="<?php if($this->input->get('search')){ echo $this->input->get('search'); } ?>">
            <button type="submit" class="btn btn-primary">Search</button>
            <button  type="reset" class="btn btn-danger reset-btn">Reset</button>
            <button  type="submit" class="btn btn-success all-btn">All</button>
          </form>
        </div>
      </div>
      <div class="row all_demo_student_block">
          <div class="col-lg-12">
            <div id="accordion">
               <?php foreach ($hod_all as $m => $values) { ?>
               
             <form class="" action="<?php echo base_url(); ?>settings/upd_hod_personal_permission" method="post">
          <div class="card">
            <div class="card-header" id="headingOne<?php echo $m; ?>">
              <h5 class="mb-0">
                <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne<?php echo $m; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $m; ?>">
                 <?php echo $values->name; ?>
                </button>
                 <button type="submit" class="btn btn-primary save-button">Save</button>
              </h5>
            </div>

            <div id="collapseOne<?php echo $m; ?>" class="collapse" aria-labelledby="headingOne<?php echo $m; ?>" data-parent="#accordion">
              <div class="card-body">
                <div class="row">
                           
                                    
                                      <?php foreach ($f_module as $k => $v) {

                                       if(in_array($v->f_module_name , explode(",", $select_logtype->f_permission))){

                                     ?>

                                    <div class="col-xl-2 col-lg-6 col-md-12 col-sm-12">



                                    <center><input type="checkbox" onclick="change_logtype(<?php echo $values->hod_id.$v->f_module_id; ?>)" id="<?php echo $values->hod_id.$v->f_module_id; ?>">ALL</center>





                                      <div class="col-xl-12">

                                      <h5 class="user_type_permission_block_heading"><?php echo $v->f_module_name; ?><input type="checkbox" name="fp[<?php echo $values->hod_id; ?>][]" <?php if(in_array($v->f_module_name , explode(",", $values->f_permission))){echo "checked";} ?> value="<?php echo $v->f_module_name ;?>" class="logtype<?php echo $values->hod_id.$v->f_module_id; ?>"></h5>

                                    </div>

                                      <div class="radio_box_block">

                                    <?php foreach ($m_module as $p => $q) {

                                      if(in_array($q->module_name , explode(",", $select_logtype->m_permission))){

                                      if($q->f_module_id == $v->f_module_id){

                                     ?>

                                        <label class="radio_btn_top_title" style="font-size: 14px;"><?php echo $q->module_name; ?> <input type="checkbox" name="m_all[<?php echo $values->hod_id; ?>][]" <?php if($v->f_module_name == $q->f_module_name && in_array($q->module_name, explode(",",$values->m_permission))){echo "checked";} ?> value="<?php echo $q->module_name;?>" class="logtype<?php echo $values->hod_id.$v->f_module_id; ?>">:</label>

                                         <?php foreach ($l_module as $a => $b) {

                                          if(in_array($b->name , explode(",", $select_logtype->permission))){

                                        if($b->m_module_id == $q->m_module_id){

                                     ?>

                                        <div class="form-group">

                                          <label class="radio_btn_title" style="font-size: 12px;"><?php echo $b->name; ?><input type="checkbox" name="f_all[<?php echo $values->hod_id; ?>][]" <?php   if($q->module_name == $b->module_name && in_array($b->name, explode(",",$values->permission))){ echo "checked";} ?> value="<?php echo $b->name; ?>" class="logtype<?php echo $values->hod_id.$v->f_module_id; ?>"></label>

                                        

                                        </div>

                                         <?php } } }?>

                                        <?php } } } ?>

                                      </div>



                                    </div>  

                                      

                                    <?php } } ?>
                </div>
              </div>
            </div>
          </div>
          </form>
        <?php } ?>
      </div>
          </div>
      </div>
    </div>
  </section>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.reset,.all-btn').click(function(){
       $('input[name=search]').val('');
    });
  });
</script>


