<div class="page-content">
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-flex align-items-center justify-content-between">
				<h4 class="page-title mb-0 font-size-18">Segmentation</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item"><a href="/patients/<?= $patient['id'] ?>">Patient report</a></li>
						<li class="breadcrumb-item"><a href="/patients/<?= $patient['id'] ?>/classification">Classification</a></li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->
	<div class="row">
		<div class="col-12">
			<button data-toggle="modal" data-target="#modalRunExpert" class="btn btn-danger waves-effect waves-light mb-2">Run Expert</button>
			<a href="<?= base_url("/patients/" . $patient["id"] . "/segmentation") ?>" class="btn btn-primary waves-effect waves-light float-right mb-2">Submit</a>
		</div>
	</div>
	<div class="row">
		<!-- patient informations -->
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title mb-3">Personal Information</h5>
							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Full name</p>
								<h6><?= $patient["first_name"] ?> <?= $patient["last_name"] ?></h6>
							</div>
							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Email Address</p>
								<h6><?= $patient["email"] ?></h6>
							</div>

							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Birth date</p>
								<h6><?= $patient["birth_date"] ?></h6>
							</div>

							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Phone number</p>
								<h6><?= $patient["phone"] ?></h6>
							</div>

						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title mb-3">Medical Information</h5>
							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Last menstrual period</p>
								<h6><?= $patient["last_menstrual_period"] ?></h6>
							</div>
							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Gestational age</p>
								<h6><?= $patient["gestational_age"] ?></h6>
							</div>

							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Gravidity</p>
								<h6><?= $patient["gravidity"] ?></h6>
							</div>

							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Parity</p>
								<h6><?= $patient["parity"] ?></h6>
							</div>

						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<h5 class="font-size-12 text-muted mb-1">Medical history</h5>
									<div class="mt-3">
										<h6><?= $patient["medical_history"] ?></h6>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<h5 class="font-size-12 text-muted mb-1">Notes</h5>
									<div class="mt-3">
										<h6><?= $patient["notes"] ?></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- measurments -->
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">

					<h4 class="card-title">SEGMENTATION: <?= $the_plan ?></h4>

					<a class="image-popup-vertical-fit">
						<img class="img-fluid m-1" alt="" src="<?= base_url("assets/images/patients/segmentations/" . $result->image); ?>" style="width: 100%;height: 300px;object-fit: cover;">
					</a>
					<h4 class="card-title mt-3">Measurments</h4>
					<div class="row mt-3">
						<?php if ($the_plan == "Transthalamique") : ?>

							<div class="col-md-4 text-center">
								<p class="font-size-22 bg-warning">
									BIP: <b class="text-dark"> <?= round($result->BIP, 2) ?> cm </b>
								</p>
							</div>
							<div class="col-md-4 text-center">
								<p class="font-size-22 bg-warning">
									PC: <b class="text-dark"> <?= round($result->PC, 2) ?>cm </b>
								</p>
							</div>

						<?php endif ?>

						<?php if ($the_plan == "Abdominal") : ?>

							<div class="col-md-4 text-center">
								<p class="font-size-22 bg-warning">
									PA: <b class="text-dark"> <?= round($result->PC, 2) ?> cm </b>
								</p>
							</div>

						<?php endif ?>

						<?php if ($the_plan == "Fémoral") : ?>

							<div class="col-md-4 text-center">
								<p class="font-size-22 bg-warning">
									FEM: <b class="text-dark"> <?= round($result->BIP, 2) ?> cm </b>
								</p>
							</div>

						<?php endif ?>
					</div>
					<h4 class="card-title mt-3">Sucmary</h4>
					<h6><?= $patient["notes"] ?></h6>

				</div>
			</div>
		</div>
	</div>

</div>

<div id="modalRunExpert" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalRunExpert" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0">Run Expert</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="expert_mail_form" method="POST" action="<?= base_url('patients/run_expert') ?>" class="custom-validation" novalidate>
					<div class="row border-bottom my-3">
						<div class="col-md-6">
							<div class="border-bottom mb-3">
								<label>Transmitter</label>
							</div>
							<div class="form-group">
								<label>Noun</label>
								<div>
									<input type="text" id="first_name" name="first_name" class="form-control" required placeholder="Enter title">
								</div>
							</div>
							<div class="form-group">
								<label>Email</label>
								<div>
									<input type="text" id="first_name" name="first_name" class="form-control" required placeholder="Enter title">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="border-bottom mb-3">
								<label>Recipient</label>
							</div>
							<div class="form-group">
								<label>Noun</label>
								<div>
									<input type="text" id="last_menstrual_period" name="last_menstrual_period" class="form-control" placeholder="Enter title">
								</div>
							</div>
							<div class="form-group">
								<label>Email</label>
								<div>
									<input type="text" id="gestational_age" name="gestational_age" class="form-control" placeholder="Enter title">
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-between">
						<p class="d-inline-block">Patient id: <?= $patient["id"] ?></p>
						<p class="d-inline-block">Date/Hour</p>
					</div>
					<div class="row">
						<div class="col-md-6 pr-3">
							<label>imageaa</label>
							<a class="image-popup-vertical-fit">
								<img class="img-fluid m-1" alt="" src="<?= base_url("assets/images/patients/segmentations/" . $result->image); ?>" style="width: 100%;height: 200px;object-fit: cover;">
							</a>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Notes</label>
								<div>
									<textarea class="form-control" id="notes" name="notes" rows="9"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group mb-0 mt-3">
						<div class="text-right">
							<button id="btn_submit" type="submit" class="btn btn-primary waves-effect waves-light mr-1">
								Submit
							</button>
							<button type="reset" class="btn btn-secondary waves-effect">
								Cancel
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url("assets/libs/jquery-knob/jquery.knob.min.js") ?>"></script>
<script>
	$(function() {
		$(".knob").knob()
	});
</script>