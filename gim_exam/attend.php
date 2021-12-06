<?php include('header.php'); ?>

<script src="https://cdn.tiny.cloud/1/xv2j3iuikfcxrow45ohppgals9m9dpkje5mlp2k46in6hvj2/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>


<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-6" style="max-width:100%; flex:0 0 100%;">
            <div class="border-top ml-3">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#csv_modal">
                    Upload CSV
                </button>
            </div>

        </div>

    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="csv_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload CSV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="csv_attend.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="file" name="file">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<?php include('footer.php'); ?>