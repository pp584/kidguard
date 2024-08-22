<!-- [ View File name : add_view.php ] -->
<div class="card">
	<div class="card-header bg-primarys text-dark">
		<h3 class="card-title"><i class="fa fa-user"></i> <strong>ข้อมูลปัจจัยภูมิคุ้มกัน</strong></h3>
	</div>
	<div class="card-body">
		<form class="form-horizontal" id="immuneForm" accept-charset="utf-8">
			<!-- {csrf_protection_field} -->

			<?php
			$totalQt = 0;
			foreach ($this->list_qt as $index => $value) {
			?>
				<div class="row">
					<div class="col">
						<?php if ($value['question_group_name']) { ?>
							<legend><?php echo $value['question_group_index'] . '. ' . $value['question_group_name']; ?> <span style="color:red;">*</span></legend>
						<?php } ?>
						<table class="table table-responsive" style="width: 100%; table-layout: fixed;">
							<?php foreach ($value['sub_groups'] as $index1 => $sub_value) { ?>
								<thead>
									<th style="width:5%;">ข้อ</th>
									<th style="width:100%;text-align: start;">คำถาม</th>
									<?php foreach ($sub_value['head_choice'] as $head) : ?>
										<th style="min-width:90px;text-align: center;"><?php echo $head['choice_name']; ?></th>
									<?php endforeach ?>
								</thead>
								<tbody>

									<?php if ($sub_value['question_sub_group_id'] != 'no_subgroup') { ?>
										<?php if ($sub_value['question_sub_group_name'] != 'null') { ?>
											<tr>
												<td colspan="6"><b><?php echo $sub_value['question_sub_group_name']; ?><span style="color:red;">*</span></b></td>
											</tr>
										<?php } ?>
									<?php } ?>
									<?php foreach ($sub_value['question_list'] as $index2 => $question) {
										$totalQt++; ?>
										<tr>
											<td><?php echo $question['question_index']; ?></td>
											<td><?php echo $question['question_name']; ?></td>
											<td>
												<label class="container-r">
													<input type="radio" name="quest_<?php echo  $index . '_' . $index1 . '_' . $index2 ?>" value="<?php echo $question['choices'][0]['choice_id'] ?>" id="quest-<?php echo  $index . '_' . $index1 . '_' . $index2 ?>-1" <?php if (($this->immune_info) && ($question['choices'][0]['choice_id'] === $this->immune_info['quest_' . $index . '_' . $index1 . '_' . $index2])) echo 'checked'; ?> required>
													<span class="checkmark"></span>
												</label>
											</td>
											<td>
												<label class="container-r">
													<input type="radio" name="quest_<?php echo  $index . '_' . $index1 . '_' . $index2 ?>" value="<?php echo $question['choices'][1]['choice_id'] ?>" id="quest-<?php echo  $index . '_' . $index1 . '_' . $index2 ?>-2" <?php if (($this->immune_info) && ($question['choices'][1]['choice_id'] === $this->immune_info['quest_' . $index . '_' . $index1 . '_' . $index2])) echo 'checked'; ?> required>
													<span class="checkmark"></span>
												</label>
											</td>
											<td>
												<label class="container-r">
													<input type="radio" name="quest_<?php echo  $index . '_' . $index1 . '_' . $index2 ?>" value="<?php echo $question['choices'][2]['choice_id'] ?>" id="quest-<?php echo  $index . '_' . $index1 . '_' . $index2 ?>-3" <?php if (($this->immune_info) && ($question['choices'][2]['choice_id'] === $this->immune_info['quest_' . $index . '_' . $index1 . '_' . $index2])) echo 'checked'; ?> required>
													<span class="checkmark"></span>
												</label>
											</td>
											<td>
												<label class="container-r">
													<input type="radio" name="quest_<?php echo  $index . '_' . $index1 . '_' . $index2 ?>" value="<?php echo $question['choices'][3]['choice_id'] ?>" id="quest-<?php echo  $index . '_' . $index1 . '_' . $index2 ?>-4" <?php if (($this->immune_info) && ($question['choices'][3]['choice_id'] === $this->immune_info['quest_' . $index . '_' . $index1 . '_' . $index2])) echo 'checked'; ?>>
													<span class="checkmark"></span>
												</label>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							<?php } ?>
						</table>
					</div>
				</div>
			<?php } ?>
			<div class="form-group">
				<div class="col-sm-offset-2 ">
					<input type="hidden" id="add_encrypt_id" />
					<!-- <button type="submit" id="btnConfirmSave" class="btn btn-primary btn-lg"> -->
					<input type="hidden" id="countImmune" value="<?php echo $totalQt; ?>" data-count="<?php echo $totalQt; ?>">

					<button type="button" id="btnConfirmSave" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">
						&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;
					</button>
				</div>
			</div>

		</form>
	</div>
</div>
<!-- </div> -->

<!-- Modal Confirm Save -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<h4 class="modal-title" id="addModalLabel">บันทึกข้อมูล</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<p class="alert alert-warning">ยืนยันการบันทึกข้อมูล ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> ปิด</button>
				<button type="button" class="btn btn-primary" id="btnSaveImmune"><i class="fa fa-save"></i> บันทึก&nbsp;</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Alert Save -->
<div class="modal fade" id="validateForm" tabindex="-1" role="dialog" aria-labelledby="validateFormLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h4 class="modal-title" id="validateFormLabel">ข้อมูลไม่ครบ!</h4>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<p class="alert alert-warning">กรุณาระบุข้อมูลให้ครบ เหลือ
					<b id="required-count"></b>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> ปิด</button>
			</div>
		</div>
	</div>
</div>
