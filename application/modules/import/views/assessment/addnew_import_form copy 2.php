<!-- [ View File name : addnew_import_form.php ] -->
<style>
    div.scroll {
        margin: 4px, 4px;
        padding: 4px;
        width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
    }
</style>

<div class="card">
    <div class="card-header bg-info">
        <h3 class="card-title">
            <i class="fa fa-plus-square"></i> นำเข้าข้อมูล Excel
            <strong>นำเข้าไฟล์ข้อมูล (Import)</strong>
        </h3>
    </div>
    <div class="card-body">


        <form class="form-horizontal" action="<?php echo base_url(); ?>import/Assessment/importFile" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <input type="hidden" name="start_row" value="2" />
                <label class="col-sm-2 col-form-label">Download template:</label>
                <div class="col-sm-2">
                    <a href="{base_url}/assets/uploads/excel_template/template_import.xlsx" class="btn btn-success btn-sm" data-toggle="tooltip" title="ส่งออกข้อมูล">
                        <i class="fas fa-file-excel"></i></span> Download
                    </a>
                </div>

                <label class="col-sm- col-form-label">ข้อมูลปี :</label>
                <div class="col-sm-2">
                    <select id="import_year" name="import_year" value="">
                        <option value="">- เลือกข้อมูลปี -</option>
                        <?php
                        $year = date('Y') + 543;

                        for ($i = $year - 5; $i <= $year; $i++) {
                        ?>
                            <option value="<?= $year ?>"><?= $i ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>

            </div>
            <div class="form-group row">
                <div class="col-12 upload-box">
                    <span> เลือกไฟล์ Excel </span>
                    <input type="file" name="uploadFile" value="" />
                    <input type="submit" name="submit" value="Upload" class="btn btn-warning btn-sm" />
                </div>
            </div>


        </form>

    </div> <!--panel-body-->
</div> <!--panel-->