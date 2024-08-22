<div class="card">
	<div class="card-header bg-success">
		<h3 class="card-title">
			<i class="fa fa-chart-bar me-2"></i>
			<span id="table-title">ปรับปรุงค่า Norm</span>
		</h3>
	</div>
	<div class="card-body">
		<form id="updateNormForm" method="post" action="{formEndpoint}">
			<?php $barIndex = 0; ?>
			<?php foreach ($graphList as $graph) :  ?>
				<div class="mb-2">
					<span class="h6 font-weight-bold">
						<i class="fas fa-chart-bar mr-1"></i>
						<?= $graph['graph_name'] ?>
					</span>
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover text-nowrap mt-2">
							<thead>
								<tr style="background-color: #e0e0e0">
									<th class="align-middle">
										<i class="fas fa-tag text-secondary mr-1"></i>
										รายการ
									</th>
									<th class="align-middle text-center" width="200px">
										<i class="fas fa-smoking-ban text-success mr-1"></i>
										PR50 กลุ่มไม่เคยลอง
									</th>
									<th class="align-middle text-center" width="200px">
										<i class="fas fa-pills text-danger mr-1"></i>
										PR50 กลุ่มเคยลอง
									</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($graph['bars'] as $bar) : ?>
									<tr>
										<td class="align-middle">
											<?= $bar['graph_bar_name'] ?>
											<input type="hidden" name="graph_bars[<?= $barIndex ?>][graph_bar_id]" value="<?= $bar['graph_bar_id'] ?>">
										</td>
										<td class="text-center">
											<div class="input-group">
												<input type="number" class="form-control" value="<?= $bar['norm_none_drug'] ?>" disabled>
												<input type="number" class="form-control" name="graph_bars[<?= $barIndex ?>][norm_none_drug]" value="<?= $bar['norm_none_drug'] ?>" min="0.00" max="4.00" step="0.01" required>
											</div>
										</td>
										<td class="text-center">
											<div class="input-group">
												<input type="number" class="form-control" value="<?= $bar['norm_drug'] ?>" disabled>
												<input type="number" class="form-control" name="graph_bars[<?= $barIndex ?>][norm_drug]" value="<?= $bar['norm_drug'] ?>" min="0.00" max="4.00" step="0.01" required>
											</div>
										</td>
									</tr>
									<?php $barIndex++; ?>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php endforeach ?>

			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmSaveModal">บันทึกข้อมูล</button>
			<button type="reset" class="btn btn-default">รีเซ็ตค่า</button>
		</form>
	</div>
</div>

<!-- Confirm save modal -->
<div class="modal fade" id="confirmSaveModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title">บันทึกข้อมูล</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				ยืนยันการแก้ไขข้อมูล ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				<button type="button" class="btn btn-primary" onclick="submitForm()">บันทึก</button>
			</div>
		</div>
	</div>
</div>

<script>
	function submitForm() {
		const formElement = document.getElementById('updateNormForm');
		const formData = new FormData(formElement);

		$.ajax({
			method: formElement.method,
			url: formElement.action,
			data: formData,
			contentType: false,
			processData: false,
			success: function(results) {
				$('#confirmSaveModal').modal('hide');

				const alertType = results.status ? 'success' : 'warning';
				notify('แจ้งเตือน', results.message, alertType, 'center');

				setTimeout(() => {
					window.location.reload();
				}, 2000);
			},
			error: function(jqXHR, exception) {
				ajaxErrorMessage(jqXHR, exception);
			}
		});
	}
</script>