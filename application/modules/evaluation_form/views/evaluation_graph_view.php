<link rel="stylesheet" href="{base_url}/assets/css/result-page.css">

<div class="cs-bg-img-wrapper">
	<img src="{base_url}/assets/images/background/bg1.webp" alt="" class="cs-bg-img">

	<div class="container cs-bg-image-content">
		<div class="px-2 pt-2 d-flex justify-content-end" style="gap: 0.3rem;">
			<a href="{base_url}" class="btn btn-light cs-btn-rounded-circle" rel="noopener noreferrer">
				<i class="fas fa-home"></i>
			</a>
			<button class="btn btn-light cs-btn-rounded-circle" rel="noopener noreferrer" onclick="sharePage()">
				<i class="fas fa-share-alt"></i>
			</button>
		</div>

		<div class="p-2" style="padding-bottom: 0 !important">
			<div class="cs-title-container">
				<div class="cs-title-border justify-content-center justify-content-md-start">
					<div class="cs-title">
						<i class="fas fa-trophy text-warning mr-2 d-none d-md-block" style="font-size: 1.5rem;"></i>
						<span class="text-center" id="title"></span>
					</div>
				</div>
			</div>
		</div>

		<div class="row no-gutters p-1" style="padding-bottom: 0 !important">
			<div class="col-12 col-xl-8 p-1">
				<div class="cs-score-chart-container p-2 h-100">
					<div class="text-bold p-1" style="font-size: 1.1rem;">
						<i class="fas fa-award mx-1"></i>
						ผลการประเมิน
					</div>
					<div id="score-chart"></div>
				</div>
			</div>
			<div class="col-12 col-xl p-1">
				<div class="cs-result-container p-2 h-100">
					<div class="text-bold p-1" style="font-size: 1.1rem;">
						<i class="fas fa-award mx-1"></i>
						ผลการประเมินในแต่ละด้าน
					</div>
					<div id="result-list" class="row no-gutters p-1" data-advice-condition="false"></div>
				</div>
			</div>
		</div>

		<div id="navigate-tab-container" class="row no-gutters p-1"></div>
	</div>

	<div class="modal fade" style="justify-items: center;" id="adviceModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="adviceModalLabel">
		<div class="modal-dialog cs-modal-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="adviceModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="advice-list">
						<div class="cs-advice-item">
							<div class="cs-advice-title"></div>
							<hr class="cs-divider">
							<p class="cs-advice-content m-0"></p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal"> ปิดคำแนะนำ</button>
				</div>
			</div>
		</div>
	</div>
</div>