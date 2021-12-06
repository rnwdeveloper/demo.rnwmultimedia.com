<?php include('header.php'); ?>

    <main class="main_content d-inline-block">
        <section class="page_title_block d-inline-block w-100 position-relative pb-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page_heading">
                            <h1>FAQ Questions AND Answer</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="coman_design_block d-inline-block w-100 position-relative ">
            <div class="container-fluid">
                <div class="row all_demo_student_block">
                    <div class="col-lg-12">
                        <div class="coman_design_block_box">
                            <div class="coman_design_block_title d-inline-block w-100 border-bottom">
                                <h4 class="d-inline-block align-middle">FAQ Questions AND Answer</h4>
                            </div>
                            <form class="coman_design_block_info">
                                <div class="col-xl-6 mx-auto">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <label>FaQ Category</label>
                                                <div class="btn-group w-100">
                                                    <select class="form-control">
                                                        <option>Faq Category</option>
                                                    </select>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_category">Add</button>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Add Question</label>
                                                <textarea class="form-control" placeholder="Add Question" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Add Answer</label>
                                                <textarea class="form-control" placeholder="Add Answer" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>File Upload</label>
                                                <input type="file" name="" class="form-control">
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="button" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="modal fade" id="add_category" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <from class="modal-content shadow-lg">
          <div class="modal-header">
            <h5 class="modal-title">Add Faq Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label>Faq Category</label>
                <input type="text" name="" class="form-control" placeholder="Add Category">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </from>
      </div>
    </div>
    <?php include('footer.php'); ?>