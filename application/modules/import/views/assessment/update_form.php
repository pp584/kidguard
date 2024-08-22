<div class="card">
    <div class="card-header bg-info">
        <h3 class="card-title">
            <i class="fa fa-edit"></i>
            <strong>อัปเดตฐานข้อมูล</strong>
        </h3>
    </div>

    <div class="card-body">
        <form class="form-horizontal" id="formAddupdate_report" accept-charset="utf-8" />
        {csrf_protection_field}
        <div class="form-group row">
            <label class="btn col-form-label">ข้อมูลปี :</label>
            <div class="col-sm-2">
                <select id="import_year" name="import_year" class="form-control" value="{data_year}">
                    <option value="">- เลือกข้อมูลปี -</option>
                    <?php
                    $year = date('Y') + 543;
                    for ($i = $year - 5; $i <= $year; $i++) {
                        echo "<option value=\"$i\">$i</option>";
                    }
                    ?>
                </select>
            </div>
            <input type="button" id="btnSaveupdate_report" name="btnSaveupdate_report" value="Update" class="btn btn-success" />
        </div>


        <!-- [ View File name : list_view.php ] -->
        <div class="row dataTables_wrapper">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                    แสดงรายการที่ <span class="badge badge-default"></span> ถึง <b></b> จากทั้งหมด <span class="badge badge-info"></span> รายการ
                </div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                    <!--{pagination_link}-->
                </div>
            </div>
        </div>

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover">
                <thead class="info">
                    <tr bgcolor="#dddddd">
                        <th>Data year</th>
                        <th>Create datetime</th>
                        <th>Section</th>
                        <th>Group</th>
                        <th>self management score</th>
                        <th>Psychological capital score</th>
                        <th>Self esteem score</th>
                        <th>Identity power score</th>
                        <th>compliance score</th>
                        <th>domestic violence score</th>
                        <th>exemplary score</th>
                        <th>media exposure score</th>
                        <th>attitude score</th>
                        <th>source purchase_score</th>
                        <th>family power score</th>
                        <th>school power score</th>
                        <th>friend power score</th>
                        <th>community power score</th>

                    </tr>
                </thead>
                <tbody>

                    <tr parser-repeat="[data_list]" id="row_{record_number}">
                        <td>{data_year}</td>
                        <td>{create_datetime}</td>
                        <td>{preview_section}</td>
                        <td>{preview_group_type_id}</td>
                        <td>{preview_self_management_score}</td>
                        <td>{preview_psychological_capital_score}</td>
                        <td>{preview_self_esteem_score}</td>
                        <td>{preview_identity_power_score}</td>
                        <td>{preview_compliance_score}</td>
                        <td>{preview_domestic_violence_score}</td>
                        <td>{preview_exemplary_score}</td>
                        <td>{preview_media_exposure_score}</td>
                        <td>{preview_attitude_score}</td>
                        <td>{preview_source_purchase_score}</td>
                        <td>{preview_family_power_score}</td>
                        <td>{preview_school_power_score}</td>
                        <td>{preview_friend_power_score}</td>
                        <td>{preview_community_power_score}</td>

                    </tr>

                </tbody>
            </table>
        </div>

        <div class="row dataTables_wrapper">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                    แสดงรายการที่ <b></b> ถึง <b></b> จากทั้งหมด <span class="badge badge-info"></span> รายการ
                </div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                    <!--{pagination_link}-->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="confirmDelModal" tabindex="-1" role="dialog" aria-labelledby="confirmDelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="confirmDelModalLabel">ยืนยันการลบข้อมูล</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">*** ท่านต้องการลบข้อมูลแถวที่ <span id="xrow"></span> ??? ***</h4>
                    <div id="div_del_detail"></div>
                    <form id="formDelete">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <label class="col-sm-3 text-right badge badge-warning" for="edit_remark">ระบุเหตุผล :</label>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="delete_remark">
                            </div>
                        </div>
                        <input type="hidden" name="encrypt_log_id" />

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                    <button type="button" class="btn btn-danger" id="btn_confirm_delete"><i class="fas fa-trash-alt"></i> Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalPreview" tabindex="-1" role="dialog" aria-labelledby="modalPreviewLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="modalPreviewLabel">แสดงข้อมูล</h4>
                </div>
                <div class="modal-body">
                    <div id="divPreview"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    var param_search_field = '{search_field}';
    var param_current_page = '{current_page_offset}';
    var param_current_path = '{current_path_uri}';
</script>


<script>
    $(document).ready(function() {

        $('#btnSaveupdate_report').click(function() {
            // $('#addModal').modal('hide');
            update_report();
        }); //click



        function update_report() {
            var frm_action = site_url('import/Update/update_report_data');
            var obj = $('#btnConfirmSave');
            if (loading_on(obj) == true) {
                var frm_data = $('#formAddupdate_report').serializeObject();
                frm_data[csrf_token_name] = $.cookie(csrf_cookie_name);

                $.ajax({
                    method: 'POST',
                    url: frm_action,
                    dataType: 'json',
                    data: frm_data,
                    success: function(results) {

                        if (results.is_successful) {
                            alert_type = 'success';
                        } else {
                            alert_type = 'danger';
                        }
                        notify('เพิ่มข้อมูล', results.message, alert_type, 'center');
                        loading_on_remove(obj);

                        if (results.is_successful) {
                            sleep(1000);
                            window.location = site_url('import/update/update_view');
                        }
                    },
                    error: function(jqXHR, exception) {
                        ajaxErrorMessage(jqXHR, exception);
                        loading_on_remove(obj);
                    }
                });
            }

        }
    });
</script>