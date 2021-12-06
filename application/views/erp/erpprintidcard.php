<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Invoice</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap');

    * {
        box-sizing: border-box;
    }
    .invoice-wrapper {
    overflow: hidden;
    text-align: center;
    }
    .print-id h5, .print-id p, .print-id h4 {
        margin-bottom: 0;
        margin-top: 2px;font-weight: 500;
    }
    .invoice-wrapper .logo {
        padding: 10px;
        padding-bottom: 0;
    }
    .inner-idcard {
        border: 1px solid #d3d3d3; 
        box-sizing: border-box;
    }
    .print-id img{
        border: 1px solid #000;
        margin-top: 6px;
    }
    .print-id h4 {
        margin-bottom: 6px;
        margin-top: 8px;
    }
    .tagline {
        background-color: red;
        color: #fff;
        padding: 6px 6px;
        margin-top: 5px; 
    }
    .print-id + p {
        margin-bottom: 0;
    }
    </style>
</head>

<body>
    <div class="invoice-wrapper" style="height: <?php echo $list_id_card->layout_height; ?>; width: <?php echo $list_id_card->layout_width; ?>;">
        <div class="inner-idcard">
        <?php if($list_id_card->logo_permi=="yes") { ?>
            <div class="logo" style=" position:relative; left: <?php echo $list_id_card->logoxpos; ?>;  top: <?php echo $list_id_card->logoypos; ?> ">
                <img src="<?php echo base_url(); ?>dist/branchlogo/<?php echo $list_id_card->logo;  ?>" width="<?php echo $list_id_card->logo_width; ?>" alt="Id card logo" />
            </div>
            <?php } ?>
            <div class="print-id">
            <?php if($list_id_card->photos=="yes") { ?>
                <img src="http://demo.rnwmultimedia.com/dist/admissiondocuments/<?php echo $list_doc->photos; ?>" width="<?php echo $list_id_card->photo_width; ?>" style=" position:relative; left: <?php echo $list_id_card->photoxpos; ?>;  top: <?php echo $list_id_card->photoypos; ?> "/>
                <?php } ?>
                <h4 style="font-size: <?php echo $list_id_card->firstname_fontsize; ?>; position:relative; left: <?php echo $list_id_card->namexpos; ?>;  top: <?php echo $list_id_card->nameypos; ?>"><strong><?php if($list_id_card->name=="yes") { ?><?php echo $list_admission->first_name; ?><?php } ?> <?php if($list_id_card->surname=="yes") { ?><?php echo $list_admission->surname ?><?php } ?></strong>
                </h4>
                <?php if($list_id_card->admission_date=="yes") {   ?>
                <h5 style="font-size: <?php echo $list_id_card->admission_date_fountsize; ?>; position:relative; left: <?php echo $list_id_card->datexpos; ?>;  top: <?php echo $list_id_card->dateypos; ?> ">Date: <span><?php date_default_timezone_set("Asia/Calcutta"); echo date('d-M-Y', strtotime($list_admission->admission_date)); ?></span></h5>

             
                <?php } ?>
                <?php if($list_id_card->gr_id=="yes") { ?>
                <h5 style="font-size: <?php echo $list_id_card->gr_id_fountsize; ?>; position:relative; left: <?php echo $list_id_card->gr_idxpos; ?>;  top: <?php echo $list_id_card->gr_idypos; ?>">GR ID: <span><?php echo $list_admission->gr_id; ?></span></h5>
                <?php } ?>
                <?php if($list_id_card->branch=="yes") { ?>
                <h5 style="font-size: <?php echo $list_id_card->branch_fount_size; ?>;">Branch: <span>
                        <?php $branch_ids = explode(",", $list_admission->branch_id);
                        foreach ($list_branch as $row) {
                            if (in_array($row->branch_id, $branch_ids)) {
                                echo $row->branch_name;
                            }
                        } ?>
                    </span></h5>
                <?php } ?>
                <?php if($list_id_card->course=="yes") { ?>
                <h5 style="font-size: <?php echo $list_id_card->course_fountsize; ?>; position:relative; left: <?php echo $list_id_card->coursexpos; ?>;  top: <?php echo $list_id_card->courseypos; ?>">Course: <span>
                        <?php if ($list_admission->type=="single") { ?>
                        <?php $courseids = explode(",", $list_admission->course_id);
                            foreach ($list_course as $row) {
                                if (in_array($row->course_id, $courseids)) {
                                    echo @$row->course_name;
                                }
                            } ?>
                        <?php } else if ($list_admission->type=="package") { ?>
                        <?php $packageids = explode(",", $list_admission->package_id);
                            foreach ($list_package as $row) {
                                if (in_array($row->package_id, $packageids)) {
                                    echo $row->package_name;
                                }
                            } ?>
                        <?php } else  { 
                            $clgids = explode(",", $list_admission->college_courses_id);
                            foreach ($all_college_courses as $row) {
                                if (in_array($row->college_courses_id, $clgids)) {
                                    echo $row->college_course_name;
                                }
                            } 
                        } ?>
                    </span></h5>
                <?php } ?>
                <h5 style="font-size: <?php echo $list_id_card->duration_fountsize; ?>; position:relative; left: <?php echo $list_id_card->durationxpos; ?>;  top: <?php echo $list_id_card->durationypos; ?>">Duration: <span>
                        <?php if ($list_admission->type=="single") { ?>
                        <?php $courseids = explode(",", $list_admission->stating_course_id);
                            foreach ($list_subcourse as $row) {
                                if (in_array($row->subcourse_id, $courseids)) {
                                    echo $row->duration . " M";
                                }
                            } ?>
                        <?php } else if ($list_admission->type=="package") { ?>
                        <?php $packageids = explode(",", $list_admission->package_id);
                            foreach ($list_package as $row) {
                                if (in_array($row->package_id, $packageids)) {
                                    echo $row->duration . " M";
                                }
                            } ?>
                        <?php } else { 
                            $clgids = explode(",", $list_admission->college_courses_id);
                            foreach ($all_college_courses as $row) {
                                if (in_array($row->college_courses_id, $clgids)) {
                                    echo $row->duration . " M";
                                }
                            } 
                        } ?>
                    </span></h5>
                <h5 style="font-size: <?php echo $list_id_card->parentsno_fountsize; ?>; position:relative; left: <?php echo $list_id_card->parentsnoxpos; ?>;  top: <?php echo $list_id_card->parentsnoxpos; ?>">Parents No: <span><?php echo $list_admission->father_mobile_no; ?></span></h5>
            </div>
            <p style="font-size: <?php echo $list_id_card->website_fountsize; ?>; position:relative; left: <?php echo $list_id_card->websitesxpos; ?>;  top: <?php echo $list_id_card->websitesypos; ?>">http://www.rnwmultimedia.com</p>
            <div class="tagline" style="font-size: <?php echo $list_id_card->tagline_fountsize; ?>; position:relative; left: <?php echo $list_id_card->taglinesxpos; ?>;  top: <?php echo $list_id_card->taglinesypos; ?>">
                One Step in Changing Education Chain..
            </div>
        </div>
    </div>

</body>

</html>