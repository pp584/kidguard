<!-- [ View File name : add_view.php ] -->
<div class="card">
	<div class="card-header bg-primarys text-dark">
		<h3 class="card-title"><i class="fa fa-user"></i> <strong>ข้อมูลพื้นฐาน</strong></h3>
	</div>
	<div class="card-body">
		<form class="form-horizontal" id="formEvaluationBasic" action="" accept-charset="utf-8">
			{csrf_protection_field}

			<!-- <input type="radio" name="gender" value="ชาย" checked>
			<div class="form-check">
				<input class="form-check-input" value="ชาย" type="radio" name="gender" id="gender-1" checked>
				<label class="form-check-label" for="gender-2">
					ชาย
				</label>
			</div> -->

			<div class="row">
				<div class="col">
					<div class="form-group">
						<h5 class="col" for="province_id">จังหวัดที่ท่านอาศัยอยู่ปัจจุบัน <span class="text-danger">*</span> :</h5>
						<small class="text-danger d-none" id="province_validate">กรุณาระบุจังหวัด</small>
						<select name="province" class="form-control" id="province_id">
							<option value="" <?php if ($this->user_info['province'] == "") echo 'selected'; ?>></option>
							<?php
							foreach ($this->province as $pv) {
							?>
								<option value="<?php echo $pv['nameTH']; ?>" <?php if ($this->user_info['province'] ==  $pv['nameTH']) echo 'selected'; ?>><?php echo $pv['nameTH']; ?></option>
							<?php }; ?>
						</select>
					</div>
				</div>
				<script>
					var userDistrict = <?php echo json_encode($this->user_info['district']); ?>;
				</script>
				<div class="col-md-6">
					<div class="form-group">
						<h5 class="col" for="district_id">อำเภอ <span class="text-danger">*</span> :</h5>
						<small class="text-danger d-none" id="district_validate">กรุณาระบุอำเภอ</small>
						<select name="district" class="form-control" id="district_id" data-district="<?php if ($this->user_info['district'] != '') echo $this->user_info['district']; ?>" value="<?php if ($this->user_info['district'] != '') echo $this->user_info['district']; ?>">
							<?php if (!empty($amphure)) : ?>
								<?php foreach ($amphure as $amp) : ?>
									<option value="<?php echo $amp['nameTH']; ?>" <?php if ($this->user_info['district'] == $amp['nameTH']) echo 'selected'; ?>>
										<?php echo $amp['nameTH']; ?>
									</option>
								<?php endforeach; ?>
							<?php else : ?>
								<option value="">- ไม่พบอำเภอ -</option>
							<?php endif; ?>
						</select>
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<h5 class="col" for="age">อายุ <span class="text-danger">*</span> :</h5>
					<!-- <input class="form-control" type="number" name="age" value="<?php echo $this->user_info['age'] ?>"> -->
					<small class="text-danger d-none" id="age_validate">กรุณาระบุอายุ</small>
					<select class="form-control" name="age" id="age_id" value="<?php echo $this->user_info['age'] ?>">
						<option value=""></option>
						<?php foreach ([10, 11, 12, 13, 14, 15, 16, 17, 18] as $ageAvg) : ?>
							<option value="<?php echo $ageAvg; ?>" <?php if ($this->user_info['age'] == $ageAvg) echo 'selected'; ?>><?php echo $ageAvg; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-md-6">
					<div class="form-group" style="margin-bottom:3rem">
						<h5 class="col">เพศ <span class="text-danger">*</span> :</h5>
						<small class="text-danger d-none" id="gender_validate">กรุณาระบุเพศ</small>
						<div class="row">
							<div class="col">
								<label class="container-r w-full">
									<span class="container-r-span" for="gender-1">ชาย</span>
									<input type="radio" name="gender" value="ชาย" id="gender-1" <?php if ($this->user_info['gender'] == "ชาย") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col">
								<label class="container-r w-full">
									<span class="container-r-span">หญิง</span>
									<input type="radio" name="gender" value="หญิง" id="gender-2" <?php if ($this->user_info['gender'] == "หญิง") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<br>
							<br>
							<div class="col-12">
								<label class="container-r w-full">
									<span class="container-r-span">LGBTQ+ (ผู้มีความหลากหลายทางเพศ)</span>
									<input type="radio" name="gender" value="LGBTQ+ (ผู้มีความหลากหลายทางเพศ)" id="gender-3" <?php if ($this->user_info['gender'] == "LGBTQ+ (ผู้มีความหลากหลายทางเพศ)") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col mb-3">
					<h5 class="col" for="education_status">สถานภาพทางการศึกษา <span class="text-danger">*</span> :</h5>
					<small class="text-danger d-none" id="education_status_validate">กรุณาระบุสถานภาพทางการศึกษา</small>
					<div class="row container_qt_choice">
						<div class="col-md-6 col-sm-12 h-40">
							<label class="container-r w-full">
								<span class="container-r-span">มัธยมศึกษาปีที่ 1</span>
								<input type="radio" name="education_status" value="มัธยมศึกษาปีที่ 1" id="education_status-1" <?php if ($this->user_info['education_status'] == "มัธยมศึกษาปีที่ 1") echo 'checked'; ?>>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="col-md-6 col-sm-12 h-40">
							<label class="container-r w-full">
								<span class="container-r-span">มัธยมศึกษาปีที่ 2</span>
								<input type="radio" name="education_status" value="มัธยมศึกษาปีที่ 2" id="education_status-2" <?php if ($this->user_info['education_status'] == "มัธยมศึกษาปีที่ 2") echo 'checked'; ?>>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="col-md-6 col-sm-12 h-40">
							<label class="container-r w-full">
								<span class="container-r-span">มัธยมศึกษาปีที่ 3</span>
								<input type="radio" name="education_status" value="มัธยมศึกษาปีที่ 3" id="education_status-3" <?php if ($this->user_info['education_status'] == "มัธยมศึกษาปีที่ 3") echo 'checked'; ?>>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="col-md-6 col-sm-12 h-40">
							<label class="container-r w-full">
								<span class="container-r-span">ไม่ได้ศึกษา</span>
								<input type="radio" name="education_status" value="ไม่ได้ศึกษา" id="education_status-4" <?php if ($this->user_info['education_status'] == "ไม่ได้ศึกษา") echo 'checked'; ?>>
								<span class="checkmark"></span>
							</label>
						</div>
					</div>
				</div>

				<div class="col-12 mb-3">
					<h5 class="col" for="num_siblings">จำนวนพี่น้อง <span class="text-danger">*</span> :</h5>
					<small class="text-danger d-none" id="num_siblings_validate">กรุณาระบุจำนวนพี่น้อง</small>
					<div class="row container_qt_choice">
						<div class="col-md-6 col-sm-12 h-40">
							<label class="container-r w-full">
								<span class="container-r-span">เป็นลูกคนเดียว</span>
								<input type="radio" name="num_siblings" value="เป็นลูกคนเดียว" id="num_siblings-1" <?php if ($this->user_info['num_siblings'] == "เป็นลูกคนเดียว") echo 'checked'; ?>>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="col-md-6 col-sm-12 h-40">
							<label class="container-r w-full">
								<span class="container-r-span">พี่น้อง 1 คน (ไม่รวมตนเอง)</span>
								<input type="radio" name="num_siblings" value="พี่น้อง 1 คน (ไม่รวมตนเอง)" id="num_siblings-2" <?php if ($this->user_info['num_siblings'] == "พี่น้อง 1 คน (ไม่รวมตนเอง)") echo 'checked'; ?>>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="col-md-6 col-sm-12 h-40">
							<label class="container-r w-full">
								<span class="container-r-span">พี่น้อง 2 คน (ไม่รวมตนเอง)</span>
								<input type="radio" name="num_siblings" value="พี่น้อง 2 คน (ไม่รวมตนเอง)" id="num_siblings-3" <?php if ($this->user_info['num_siblings'] == "พี่น้อง 2 คน (ไม่รวมตนเอง)") echo 'checked'; ?>>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="col-md-6 col-sm-12 h-40">
							<label class="container-r w-full">
								<span class="container-r-span">พี่น้อง 3 คน (ไม่รวมตนเอง)</span>
								<input type="radio" name="num_siblings" value="พี่น้อง 3 คน (ไม่รวมตนเอง)" id="num_siblings-4" <?php if ($this->user_info['num_siblings'] == "พี่น้อง 3 คน (ไม่รวมตนเอง)") echo 'checked'; ?>>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="col-md-6 col-sm-12 h-40">
							<label class="container-r w-full">
								<span class="container-r-span">อื่น ๆ (ระบุ)</span>
								<input type="radio" value="other" id="other_num_siblings_input_val" name="num_siblings" <?php
																														if (
																															$this->user_info['num_siblings'] !== "พี่น้อง 3 คน (ไม่รวมตนเอง)" &&
																															$this->user_info['num_siblings'] !== "พี่น้อง 2 คน (ไม่รวมตนเอง)" &&
																															$this->user_info['num_siblings'] !== "พี่น้อง 1 คน (ไม่รวมตนเอง)" &&
																															$this->user_info['num_siblings'] !== "เป็นลูกคนเดียว"
																														) echo 'checked';
																														?>>
								<span class="checkmark"></span>
							</label>
							<input type="text" id="other_num_siblings_input" style="margin-top:35px;margin-left: 50px;    max-width: 250px;
" value="<?php if (
				$this->user_info['num_siblings'] !== "พี่น้อง 3 คน (ไม่รวมตนเอง)" &&
				$this->user_info['num_siblings'] !== "พี่น้อง 2 คน (ไม่รวมตนเอง)" &&
				$this->user_info['num_siblings'] !== "พี่น้อง 1 คน (ไม่รวมตนเอง)" &&
				$this->user_info['num_siblings'] !== "เป็นลูกคนเดียว"
			) echo $this->user_info['num_siblings']; ?>" id="other_num_siblings_input" class="form-control" style="display: block;">
						</div>
					</div>
				</div>

				<!-- สถานภาพทางครอบครัว -->
				<section class="w-full" style="margin-top:30px">
					<div class="col-12 mb-3">
						<h5 class="col" for="family_status">สถานภาพทางครอบครัว <span class="text-danger">*</span> :</h5>
						<small class="text-danger d-none" id="family_status_validate">กรุณาระบุสถานภาพทางครอบครัว</small>
						<div class="row container_qt_choice">
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">บิดามารดาอยู่ด้วยกัน</span>
									<input type="radio" name="family_status" value="บิดามารดาอยู่ด้วยกัน" id="family_status-1" <?php if ($this->user_info['family_status'] == "บิดามารดาอยู่ด้วยกัน") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">บิดามารดาแยกกันอยู่</span>
									<input type="radio" name="family_status" value="บิดามารดาแยกกันอยู่" id="family_status-2" <?php if ($this->user_info['family_status'] == "บิดามารดาแยกกันอยู่") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">บิดาเสียชีวิตแล้ว</span>
									<input type="radio" name="family_status" value="บิดาเสียชีวิตแล้ว" id="family_status-2" <?php if ($this->user_info['family_status'] == "บิดาเสียชีวิตแล้ว") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">มารดาเสียชีวิตแล้ว</span>
									<input type="radio" name="family_status" value="มารดาเสียชีวิตแล้ว" id="family_status-3" <?php if ($this->user_info['family_status'] == "มารดาเสียชีวิตแล้ว") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">บิดาและมารดาเสียชีวิตแล้ว</span>
									<input type="radio" name="family_status" value="บิดาและมารดาเสียชีวิตแล้ว" id="family_status-4" <?php if ($this->user_info['family_status'] == "บิดาและมารดาเสียชีวิตแล้ว") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">อื่น ๆ (ระบุ)</span>
									<input type="radio" <?php if (
															$this->user_info['family_status'] !== "บิดามารดาอยู่ด้วยกัน" &&
															$this->user_info['family_status'] !== "บิดามารดาแยกกันอยู่" &&
															$this->user_info['family_status'] !== "บิดาเสียชีวิตแล้ว" &&
															$this->user_info['family_status'] !== "มารดาเสียชีวิตแล้ว" &&
															$this->user_info['family_status'] !== "บิดาและมารดาเสียชีวิตแล้ว"
														) echo 'checked' ?> value="other" id="othamily_status_input_val" name="family_status">
									<span class="checkmark"></span>
								</label>
								<input type="text" value="<?php if (
																$this->user_info['family_status'] !== "บิดามารดาอยู่ด้วยกัน" &&
																$this->user_info['family_status'] !== "บิดามารดาแยกกันอยู่" &&
																$this->user_info['family_status'] !== "บิดาเสียชีวิตแล้ว" &&
																$this->user_info['family_status'] !== "มารดาเสียชีวิตแล้ว" &&
																$this->user_info['family_status'] !== "บิดาและมารดาเสียชีวิตแล้ว"
															) echo $this->user_info['family_status']; ?>" style="margin-top:35px;margin-left: 50px;    max-width: 250px;" id="other_family_status_input" class="form-control" style="display: block;">
							</div>
						</div>
					</div>
				</section>

				<!-- อาชีพของบิดา -->
				<section class="w-full" style="margin-top:30px">
					<div class="col-12 mb-3">
						<h5 class="col" for="father_occupation">อาชีพของบิดา <span class="text-danger">*</span> :</h5>
						<small class="text-danger d-none" id="father_occupation_validate">กรุณาระบุอาชีพของบิดา</small>
						<div class="row container_qt_choice">
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">เกษตร (ทำไร่,ทำนา,ทำสวน,ประมง,ปศุสัตว์)</span>
									<input type="radio" name="father_occupation" value="เกษตร (ทำไร่,ทำนา,ทำสวน,ประมง,ปศุสัตว์)" id="father_occupation-1" <?php if ($this->user_info['father_occupation'] == "เกษตร (ทำไร่,ทำนา,ทำสวน,ประมง,ปศุสัตว์)") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">รับราชการ / พนักงานราชการ</span>
									<input type="radio" name="father_occupation" value="รับราชการ / พนักงานราชการ" id="father_occupation-2" <?php if ($this->user_info['father_occupation'] == "รับราชการ / พนักงานราชการ") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">พนักงานเอกชน</span>
									<input type="radio" name="father_occupation" value="พนักงานเอกชน" id="father_occupation-3" <?php if ($this->user_info['father_occupation'] == "พนักงานเอกชน") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">รัฐวิสาหกิจ</span>
									<input type="radio" name="father_occupation" value="รัฐวิสาหกิจ" id="father_occupation-4" <?php if ($this->user_info['father_occupation'] == "รัฐวิสาหกิจ") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">รับจ้างทั่วไป</span>
									<input type="radio" name="father_occupation" value="รับจ้างทั่วไป" id="father_occupation-5" <?php if ($this->user_info['father_occupation'] == "รับจ้างทั่วไป") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">ธุรกิจส่วนตัว/อิสระ</span>
									<input type="radio" name="father_occupation" value="ธุรกิจส่วนตัว/อิสระ" id="father_occupation-6" <?php if ($this->user_info['father_occupation'] == "ธุรกิจส่วนตัว/อิสระ") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<!-- <label class="container-r w-full">
									<span class="container-r-span">อื่นๆ</span>
									<input type="radio" name="father_occupation" value="1" id="father_occupation-7">
									<span class="checkmark"></span>
								</label> -->
								<label class="container-r w-full">
									<span class="container-r-span">อื่น ๆ (ระบุ)</span>
									<input type="radio" <?php if (
															$this->user_info['father_occupation'] !== "เกษตร (ทำไร่,ทำนา,ทำสวน,ประมง,ปศุสัตว์)" &&
															$this->user_info['father_occupation'] !== "รับราชการ / พนักงานราชการ" &&
															$this->user_info['father_occupation'] !== "พนักงานเอกชน" &&
															$this->user_info['father_occupation'] !== "รัฐวิสาหกิจ" &&
															$this->user_info['father_occupation'] !== "รับจ้างทั่วไป" &&
															$this->user_info['father_occupation'] !== "ธุรกิจส่วนตัว/อิสระ"
														) echo 'checked'; ?> value="other" id="other_father_occupation_input_val" name="father_occupation">
									<span class="checkmark"></span>
								</label>
								<input type="text" value="<?php if (
																$this->user_info['father_occupation'] !== "เกษตร (ทำไร่,ทำนา,ทำสวน,ประมง,ปศุสัตว์)" &&
																$this->user_info['father_occupation'] !== "รับราชการ / พนักงานราชการ" &&
																$this->user_info['father_occupation'] !== "พนักงานเอกชน" &&
																$this->user_info['father_occupation'] !== "รัฐวิสาหกิจ" &&
																$this->user_info['father_occupation'] !== "รับจ้างทั่วไป" &&
																$this->user_info['father_occupation'] !== "ธุรกิจส่วนตัว/อิสระ"
															) echo $this->user_info['father_occupation']; ?>" style="margin-top:35px;margin-left: 50px;    max-width: 250px;" id="other_father_occupation_input" class="form-control" style="display: block;">
							</div>
						</div>
					</div>
				</section>

				<!-- อาชีพของมารดา -->
				<section class="w-full" style="margin-top:30px">
					<div class="col-12 mb-3">
						<h5 class="col" for="mother_occupation">อาชีพของมารดา <span class="text-danger">*</span> :</h5>
						<small class="text-danger d-none" id="mother_occupation_validate">กรุณาระบุอาชีพของมารดา</small>
						<div class="row container_qt_choice">
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">เกษตร (ทำไร่,ทำนา,ทำสวน,ประมง,ปศุสัตว์)</span>
									<input type="radio" name="mother_occupation" value="เกษตร (ทำไร่,ทำนา,ทำสวน,ประมง,ปศุสัตว์)" id="mother_occupation-1" <?php if ($this->user_info['mother_occupation'] == "เกษตร (ทำไร่,ทำนา,ทำสวน,ประมง,ปศุสัตว์)") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">รับราชการ / พนักงานราชการ</span>
									<input type="radio" name="mother_occupation" value="รับราชการ / พนักงานราชการ" id="mother_occupation-2" <?php if ($this->user_info['mother_occupation'] == "รับราชการ / พนักงานราชการ") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">พนักงานเอกชน</span>
									<input type="radio" name="mother_occupation" value="พนักงานเอกชน" id="mother_occupation-3" <?php if ($this->user_info['mother_occupation'] == "พนักงานเอกชน") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">รัฐวิสาหกิจ</span>
									<input type="radio" name="mother_occupation" value="รัฐวิสาหกิจ" id="mother_occupation-4" <?php if ($this->user_info['mother_occupation'] == "รัฐวิสาหกิจ") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">รับจ้างทั่วไป</span>
									<input type="radio" name="mother_occupation" value="รับจ้างทั่วไป" id="mother_occupation-5" <?php if ($this->user_info['mother_occupation'] == "รับจ้างทั่วไป") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">ธุรกิจส่วนตัว/อิสระ</span>
									<input type="radio" name="mother_occupation" value="ธุรกิจส่วนตัว/อิสระ" id="mother_occupation-6" <?php if ($this->user_info['mother_occupation'] == "ธุรกิจส่วนตัว/อิสระ") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<!-- <label class="container-r w-full">
									<span class="container-r-span">อื่นๆ</span>
									<input type="radio" name="mother_occupation" value="1" id="mother_occupation-7">
									<span class="checkmark"></span>
								</label> -->
								<label class="container-r w-full">
									<span class="container-r-span">อื่น ๆ (ระบุ)</span>
									<input type="radio" <?php if (
															$this->user_info['mother_occupation'] !== "เกษตร (ทำไร่,ทำนา,ทำสวน,ประมง,ปศุสัตว์)" &&
															$this->user_info['mother_occupation'] !== "รับราชการ / พนักงานราชการ" &&
															$this->user_info['mother_occupation'] !== "พนักงานเอกชน" &&
															$this->user_info['mother_occupation'] !== "รัฐวิสาหกิจ" &&
															$this->user_info['mother_occupation'] !== "รับจ้างทั่วไป" &&
															$this->user_info['mother_occupation'] !== "ธุรกิจส่วนตัว/อิสระ"
														) echo 'checked'; ?> value="other" id="other_mother_occupation_input_val" name="mother_occupation">
									<span class="checkmark"></span>
								</label>
								<input type="text" value="<?php if (
																$this->user_info['mother_occupation'] !== "เกษตร (ทำไร่,ทำนา,ทำสวน,ประมง,ปศุสัตว์)" &&
																$this->user_info['mother_occupation'] !== "รับราชการ / พนักงานราชการ" &&
																$this->user_info['mother_occupation'] !== "พนักงานเอกชน" &&
																$this->user_info['mother_occupation'] !== "รัฐวิสาหกิจ" &&
																$this->user_info['mother_occupation'] !== "รับจ้างทั่วไป" &&
																$this->user_info['mother_occupation'] !== "ธุรกิจส่วนตัว/อิสระ"
															) echo $this->user_info['mother_occupation']; ?>" style="margin-top:35px;margin-left: 50px;    max-width: 250px;" id="other_mother_occupation_input" class="form-control" style="display: block;">
							</div>
						</div>
					</div>
				</section>

				<!-- รายได้ของครอบครัว (เฉลี่ยต่อเดือน) -->
				<section class="w-full" style="margin-top:30px">
					<div class="col-12 mb-3">
						<h5 class="col" for="family_income">รายได้ของครอบครัว (เฉลี่ยต่อเดือน) <span class="text-danger">*</span> :</h5>
						<small class="text-danger d-none" id="family_income_validate">กรุณาระบุรายได้ของครอบครัว</small>
						<div class="row container_qt_choice">
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">ต่ำกว่า 15,000 บาท</span>
									<input type="radio" name="family_income" value="ต่ำกว่า 15,000 บาท" id="family_income-1" <?php if ($this->user_info['family_income'] == "ต่ำกว่า 15,000 บาท") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">15,000 – 30,000 บาท</span>
									<input type="radio" name="family_income" value="15,000 – 30,000 บาท" id="family_income-2" <?php if ($this->user_info['family_income'] == "15,000 – 30,000 บาท") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">30,001 – 40,000 บาท</span>
									<input type="radio" name="family_income" value="30,001 – 40,000 บาท" id="family_income-3" <?php if ($this->user_info['family_income'] == "30,001 – 40,000 บาท") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">40,001 – 50,000 บาท</span>
									<input type="radio" name="family_income" value="40,001 – 50,000 บาท" id="family_income-4" <?php if ($this->user_info['family_income'] == "40,001 – 50,000 บาท") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full">
									<span class="container-r-span">มากกว่า 50,000 บาท</span>
									<input type="radio" name="family_income" value="มากกว่า 50,000 บาท" id="family_income-5" <?php if ($this->user_info['family_income'] == "มากกว่า 50,000 บาท") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
					</div>
				</section>

				<!-- เมื่อมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ) -->
				<section class="w-full">
					<div class="col-12 mb-3">
						<h5 class="col" for="consult_people">เมื่อมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ) <span class="text-danger">*</span> :</h5>
						<small class="text-danger d-none" id="consult_people_validate">กรุณาระบุเมื่อมีปัญหาท่านปรึกษาใครบ้าง</small>
						<div class="row container_qt_choice">
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">บิดา</span>
									<input type="checkbox" value="บิดา" name="consult_people[]" <?php if (isset($this->user_info['consult_people'])) {
																									if (in_array("บิดา", $this->user_info['consult_people'])) echo 'checked';
																								} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">มารดา</span>
									<input type="checkbox" value="มารดา" name="consult_people[]" <?php if (isset($this->user_info['consult_people'])) {
																										if (in_array("มารดา", $this->user_info['consult_people'])) echo 'checked';
																									} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">ญาติ</span>
									<input type="checkbox" value="ญาติ" name="consult_people[]" <?php if (isset($this->user_info['consult_people'])) {
																									if (in_array("ญาติ", $this->user_info['consult_people'])) echo 'checked';
																								} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">เพื่อน</span>
									<input type="checkbox" value="เพื่อน" name="consult_people[]" <?php if (isset($this->user_info['consult_people'])) {
																										if (in_array("เพื่อน", $this->user_info['consult_people'])) echo 'checked';
																									} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">ครู</span>
									<input type="checkbox" value="ครู" name="consult_people[]" <?php if (isset($this->user_info['consult_people'])) {
																									if (in_array("ครู", $this->user_info['consult_people'])) echo 'checked';
																								} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">คนรัก</span>
									<input type="checkbox" value="คนรัก" name="consult_people[]" <?php if (isset($this->user_info['consult_people'])) {
																										if (in_array("คนรัก", $this->user_info['consult_people'])) echo 'checked';
																									} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<!-- <label class="container-cb w-full">
									<span class="container-cb-span">อื่น ๆ (ระบุ)</span>
									<input type="checkbox" value="" id="other_consult_people_input_val" name="consult_people[]" <?php if (in_array($this->user_info['other_consult_people'], $this->user_info['consult_people'])) echo 'checked'; ?> onchange="toggleTextInput(this, 'other_drug_input')">
									<span class="checkmark-cb"></span>
								</label>
								<input type="text" id="other_consult_people_input" value="<?php echo $this->user_info['other_consult_people']; ?>" name="other_consult_people" class="form-control" style="display: none;"> -->
								<label class="container-cb w-full">
									<span class="container-cb-span">อื่น ๆ (ระบุ)</span>
									<input type="checkbox" value="" id="other_consult_people_input_val" name="consult_people[]" <?php if (in_array($this->user_info['other_consult_people'], $this->user_info['consult_people'])) echo 'checked'; ?> onchange="toggleTextInput(this, 'other_consult_people_input')">
									<span class="checkmark-cb"></span>
								</label>
								<input type="text" id="other_consult_people_input" name="other_consult_people" value="<?php echo $this->user_info['other_consult_people']; ?>" class="form-control" style="display: none;    margin-left: 50px;
    max-width: 200px;">
							</div>
						</div>

					</div>
				</section>

				<!-- ท่านเคยใช้สารเสพติดหรือไม่  -->
				<section class="w-full" id="section_drug_history">
					<div class="col-12 mb-3">
						<h5 class="col" for="drug_history">ท่านเคยใช้สารเสพติดหรือไม่ <span class="text-danger">*</span> :</h5>
						<small class="text-danger d-none" id="drug_history_validate">กรุณาระบุท่านเคยใช้สารเสพติดหรือไม่</small>
						<div class="row container_qt_choice">
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full" id="drug_history_f">
									<span class="container-r-span">เคย</span>
									<input type="radio" name="drug_history" value="เคย" id="drug_history-1" <?php if ($this->user_info['drug_history'] == "เคย") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-md-6 col-sm-12 h-40">
								<label class="container-r w-full" id="drug_history_s">
									<span class="container-r-span">ไม่เคย</span>
									<input type="radio" name="drug_history" value="ไม่เคย" id="drug_history-2" <?php if ($this->user_info['drug_history'] == "ไม่เคย") echo 'checked'; ?>>
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
					</div>
				</section>

				<!-- หากเคยท่านใช้สารเสพติดชนิดใดบ้าง (ตอบได้มากกว่า 1 ข้อ) -->
				<section class="w-full" id="type_of_drugs_select" style="<?php if (isset($this->user_info['drug_history']) || $this->user_info['drug_history'] == "เคย") echo 'display:none'; ?>">
					<div class="col-12 mb-3">
						<h5 class="col" for="province_id">หากเคยท่านใช้สารเสพติดชนิดใดบ้าง (ตอบได้มากกว่า 1 ข้อ) :</h5>
						<div class="row container_qt_choice">
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">ยาบ้า</span>
									<input type="checkbox" value="ยาบ้า" name="type_of_drugs[]" <?php if (isset($this->user_info['type_of_drugs'])) {
																									if (in_array("ยาบ้า", $this->user_info['type_of_drugs'])) echo 'checked';
																								} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">ยาอี</span>
									<input type="checkbox" value="ยาอี" name="type_of_drugs[]" <?php if (isset($this->user_info['type_of_drugs'])) {
																									if (in_array("ยาอี", $this->user_info['type_of_drugs'])) echo 'checked';
																								} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">ยาเค</span>
									<input type="checkbox" value="ยาเค" name="type_of_drugs[]" <?php if (isset($this->user_info['type_of_drugs'])) {
																									if (in_array("ยาเค", $this->user_info['type_of_drugs'])) echo 'checked';
																								} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">ฝิ่น</span>
									<input type="checkbox" value="ฝิ่น" name="type_of_drugs[]" <?php if (isset($this->user_info['type_of_drugs'])) {
																									if (in_array("ฝิ่น", $this->user_info['type_of_drugs'])) echo 'checked';
																								} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">เฮโรอีน</span>
									<input type="checkbox" value="เฮโรอีน" name="type_of_drugs[]" <?php if (isset($this->user_info['type_of_drugs'])) {
																										if (in_array("เฮโรอีน", $this->user_info['type_of_drugs'])) echo 'checked';
																									} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<!-- <div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">เฮโรอีน</span>
									<input type="checkbox" value="เฮโรอีน" name="type_of_drugs[]">
									<span class="checkmark-cb"></span>
								</label>
							</div> -->
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">ใบกระท่อม</span>
									<input type="checkbox" value="ใบกระท่อม" name="type_of_drugs[]" <?php if (isset($this->user_info['type_of_drugs'])) {
																										if (in_array("ใบกระท่อม", $this->user_info['type_of_drugs'])) echo 'checked';
																									} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">ทินเนอร์/กาว</span>
									<input type="checkbox" value="ทินเนอร์/กาว" name="type_of_drugs[]" <?php if (isset($this->user_info['type_of_drugs'])) {
																											if (in_array("ทินเนอร์/กาว", $this->user_info['type_of_drugs'])) echo 'checked';
																										} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">ยาไอซ์</span>
									<input type="checkbox" value="ยาไอซ์" name="type_of_drugs[]" <?php if (isset($this->user_info['type_of_drugs'])) {
																										if (in_array("ยาไอซ์", $this->user_info['type_of_drugs'])) echo 'checked';
																									} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">บุหรี่</span>
									<input type="checkbox" value="บุหรี่" name="type_of_drugs[]" <?php if (isset($this->user_info['type_of_drugs'])) {
																										if (in_array("บุหรี่", $this->user_info['type_of_drugs'])) echo 'checked';
																									} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">สุรา</span>
									<input type="checkbox" value="สุรา" name="type_of_drugs[]" <?php if (isset($this->user_info['type_of_drugs'])) {
																									if (in_array("สุรา", $this->user_info['type_of_drugs'])) echo 'checked';
																								} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">บุหรี่ไฟฟ้า</span>
									<input type="checkbox" value="บุหรี่ไฟฟ้า" name="type_of_drugs[]" <?php if (isset($this->user_info['type_of_drugs'])) {
																											if (in_array("บุหรี่ไฟฟ้า", $this->user_info['type_of_drugs'])) echo 'checked';
																										} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">ป๊อปเปอร์</span>
									<input type="checkbox" value="ป๊อปเปอร์" name="type_of_drugs[]" <?php if (isset($this->user_info['type_of_drugs'])) {
																										if (in_array("ป๊อปเปอร์", $this->user_info['type_of_drugs'])) echo 'checked';
																									} ?>>
									<span class="checkmark-cb"></span>
								</label>
							</div>
							<div class="col-md-12 col-sm-12 h-40">
								<label class="container-cb w-full">
									<span class="container-cb-span">อื่น ๆ (ระบุ)</span>
									<input type="checkbox" value="" id="other_drug_input_val" name="type_of_drugs[]" <?php if (isset($this->user_info['type_of_drugs'])) {
																															if (in_array($this->user_info['other_drugs'], $this->user_info['type_of_drugs'])) echo 'checked';
																														} ?> onchange="toggleTextInput(this, 'other_drug_input')">
									<span class="checkmark-cb"></span>
								</label>
								<input type="text" id="other_drug_input" value="<?php echo $this->user_info['other_drugs']; ?>" name="other_drugs" class="form-control" style="display: none;max-width: 200px;margin-top: 40px;margin-left: 50px;">
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="form-group mt-3">
				<div class="col-sm-offset-2 ">
					<input type="hidden" id="add_encrypt_id" />
					<button type="button" id="btnConfirmSave" class="btn btn-primary btn-lg">
						&nbsp;&nbsp;<i class="fa fa-save"></i> บันทึก &nbsp;&nbsp;
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
</div>

<!-- Modal Confirm Save -->
<div class="modal fade" id="addModal2" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
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
				<button type="button" class="btn btn-primary" id="btnSave" data-dismiss="modal"><i class="fa fa-save"></i> บันทึก&nbsp;</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('#btnConfirmSave').click(function() {
		$("#addModal2").modal('show');
	})
</script>