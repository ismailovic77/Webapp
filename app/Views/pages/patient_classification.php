<style>
	body[data-sidebar-size="small"] .has-arrow:after,
	body[data-sidebar-size="small"] .badge {
		display: block !important;
		font-size: 14px !important;
	}
</style>
<div class="page-content">
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-flex align-items-center justify-content-between">
				<h4 class="page-title mb-0 font-size-18">Classification</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item"><a href="/patients/<?= $patient['id'] ?>">Patient report</a></li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->
	<!-- <div class="row">
		<div class="col-12">
			<a href="<?= base_url("/patients/" . $patient["id"] . "/segmentation") ?>" class="btn btn-primary waves-effect waves-light float-right mb-2">Run Segmentation</a>
		</div>
	</div> -->
	<div class="row">
		<div class="col-12">
			<button data-toggle="modal" data-target="#modalRunExpert" class="btn btn-danger waves-effect waves-light mb-2">Run Expert</button>
			<a href="<?= base_url("/patients/" . $patient["id"] . "/segmentation") ?>" class="btn btn-primary waves-effect waves-light float-right mb-2">Submit</a>
		</div>
	</div>
	<!-- patient informations -->
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title mb-3">Personal Information</h5>
							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Full name</p>
								<h6 class=""><?= $patient["first_name"] ?> <?= $patient["last_name"] ?></h6>
							</div>
							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Email Address</p>
								<h6 class=""><?= $patient["email"] ?></h6>
							</div>

							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Birth date</p>
								<h6 class=""><?= $patient["birth_date"] ?></h6>
							</div>

							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Phone number</p>
								<h6 class=""><?= $patient["phone"] ?></h6>
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
								<h6 class=""><?= $patient["last_menstrual_period"] ?></h6>
							</div>
							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Gestational age</p>
								<h6 class=""><?= $patient["gestational_age"] ?></h6>
							</div>

							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Gravidity</p>
								<h6 class=""><?= $patient["gravidity"] ?></h6>
							</div>

							<div class="mt-3">
								<p class="font-size-12 text-muted mb-1">Parity</p>
								<h6 class=""><?= $patient["parity"] ?></h6>
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
										<h6 class=""><?= $patient["medical_history"] ?></h6>
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
										<h6 class=""><?= $patient["notes"] ?></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">

					<h4 class="card-title">Classification Plans</h4>

					<!-- Nav tabs -->
					<ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
						<?php if (isset($clasification->transthalamique[0])) : ?>
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#plan1" role="tab" aria-selected="false">
									<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
									<span class="d-none d-sm-block">Transthalamique</span>
								</a>
							</li>
						<?php endif; ?>
						<?php if (isset($clasification->femoral[0])) : ?>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#plan2" role="tab" aria-selected="false">
									<span class="d-block d-sm-none"><i class="far fa-user"></i></span>
									<span class="d-none d-sm-block">Fémoral</span>
								</a>
							</li>
						<?php endif; ?>
						<?php if (isset($clasification->abdominal[0])) : ?>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#plan3" role="tab" aria-selected="false">
									<span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
									<span class="d-none d-sm-block">Abdominal</span>
								</a>
							</li>
						<?php endif; ?>

						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#plan4" role="tab" aria-selected="true">
								<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
								<span class="d-none d-sm-block">Other</span>
							</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content pt-3 text-muted">
						<?php if (isset($clasification->transthalamique[0])) : ?>
							<div class="tab-pane active" id="plan1" role="tabpanel">
								<!-- <a href="<?= base_url("/patients/" . $patient["id"] . "/segmentation?plan=Transthalamique&image=" . $clasification->transthalamique[0]->img) ?>" class="btn btn-primary waves-effect waves-light btn-sm float-right">
									<i class="fa fa-search"></i> Run Segmentation
								</a> -->
								<a href="#" data-type="Transthalamique" data-link="<?= base_url("/patients/" . $patient["id"] . "/segmentation?plan=Transthalamique&image=" . $clasification->transthalamique[0]->img) ?>" class="run_segmentation btn btn-primary waves-effect waves-light btn-sm float-right">
									<i class="fa fa-search"></i> Run Segmentation
								</a>

								<h6 class="card-title"><?= $clasification->transthalamique[0]->pred_class ?></h6>

								<div class="img-hover">
									<a class="image-popup-vertical-fit">
										<img class="img-holder img-fluid m-1" alt="" src="<?= base_url('webapp_storage/'.session('id')."/".$patient["id"] ."/" . $clasification->transthalamique[0]->img); ?>" style="width: 100%;max-height: 40vh;">
									</a>
								</div>
								<div class="row mt-3 d-none mesurs justify-content-around">
									<div class="col-md-4 text-center">
										<p class="font-size-22 bg-warning">
											<!-- round($result->BIP, 2) ?> -->
											BIP: <b class="text-dark p-holder1"> </b>
										</p>
									</div>
									<div class="col-md-4 text-center">
										<p class="font-size-22 bg-warning">
											<!-- round($result->PC, 2) ?> -->
											PC: <b class="text-dark p-holder2"> </b>
										</p>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-6 text-center">
										<p>
											Accuracy :
										</p>
										<input class="knob" data-width="150" data-height="150" data-thickness=".1" data-readOnly="true" data-linecap="round" data-fgcolor="#0089ef" value="<?= round($clasification->transthalamique[0]->precision * 100, 2) ?>">

									</div>
									<div class="col-md-6 text-center">
										<p>
											Satisfaction threshold: <?= $rand = rand(0, 100) ?>
										</p>
										<?php if ($rand > 30) : ?>
											<img src="<?= base_url("assets/images/icons/good_satisfaction.svg") ?>" alt="satisfacion" height="150">
										<?php else : ?>
											<img src="<?= base_url("assets/images/icons/bad_satisfaction.svg") ?>" alt="satisfacion" height="150" data-toggle="tooltip" data-placement="top" title="EXPLINATION: Plan does not meet the criteria of a good standard plan that allows the analysis">
										<?php endif ?>

										<!-- <input class="knob" data-width="150" data-height="150" data-thickness=".1" data-readOnly="true" data-linecap="round" data-fgcolor="#0089ef" value="76"> -->
										<!-- <img src="<?= base_url("assets/images/icons/meh_satisfaction.svg") ?>" alt="satisfacion" height="150" data-toggle="tooltip" data-placement="top" title="EXPLINATION: Plan does not meet the criteria of a good standard plan that allows the analysis"> -->
									</div>
								</div>
							</div>
						<?php endif; ?>
						<?php if (isset($clasification->femoral[0])) : ?>
							<div class="tab-pane" id="plan2" role="tabpanel">
								<!-- <a href="<?= base_url("/patients/" . $patient["id"] . "/segmentation?plan=Fémoral&image=" . $clasification->femoral[0]->img) ?>" class="btn btn-primary waves-effect waves-light btn-sm float-right">
									<i class="fa fa-search"></i> Run Segmentation
								</a> -->
								<a href="#" data-type="Fémoral" data-link="<?= base_url("/patients/" . $patient["id"] . "/segmentation?plan=Fémoral&image=" . $clasification->femoral[0]->img) ?>" class="run_segmentation btn btn-primary waves-effect waves-light btn-sm float-right">
									<i class="fa fa-search"></i> Run Segmentation
								</a>

								<h6 class="card-title"><?= $clasification->femoral[0]->pred_class ?></h6>

								<div class="img-hover">
									<a class="image-popup-vertical-fit">
										<img class="img-holder img-fluid m-1" alt="" src="<?= base_url('webapp_storage/'.session('id')."/".$patient["id"] ."/" . $clasification->femoral[0]->img); ?>" style="width: 100%;max-height: 40vh;">
									</a>
								</div>

								<div class="row mt-3 d-none mesurs justify-content-around">
									<div class="col-md-4 text-center">
										<p class="font-size-22 bg-warning">
											<!-- round($result->BIP, 2) ?> cm -->
											FEM: <b class="text-dark p-holder"></b>
										</p>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-6 text-center">
										<p>
											Accuracy :
										</p>
										<input class="knob" data-width="150" data-height="150" data-thickness=".1" data-readOnly="true" data-linecap="round" data-fgcolor="#0089ef" value="<?= round($clasification->femoral[0]->precision * 100, 2) ?>">

									</div>
									<div class="col-md-6 text-center">
										<p>
											Satisfaction threshold: <?= $rand = rand(0, 100) ?>
										</p>
										<?php if ($rand > 30) : ?>
											<img src="<?= base_url("assets/images/icons/good_satisfaction.svg") ?>" alt="satisfacion" height="150">
										<?php else : ?>
											<img src="<?= base_url("assets/images/icons/bad_satisfaction.svg") ?>" alt="satisfacion" height="150" data-toggle="tooltip" data-placement="top" title="EXPLINATION: Plan does not meet the criteria of a good standard plan that allows the analysis">
										<?php endif ?>
									</div>
								</div>
							</div>
						<?php endif; ?>
						<?php if (isset($clasification->abdominal[0])) : ?>
							<div class="tab-pane" id="plan3" role="tabpanel">
								<!-- <a href="<?= base_url("/patients/" . $patient["id"] . "/segmentation?plan=Abdominal&image=" . $clasification->abdominal[0]->img) ?>" class="btn btn-primary waves-effect waves-light btn-sm float-right">
									<i class="fa fa-search"></i> Run Segmentation
								</a> -->
								<a href="#" data-type="Abdominal" data-link="<?= base_url("/patients/" . $patient["id"] . "/segmentation?plan=Abdominal&image=" . $clasification->abdominal[0]->img) ?>" class="run_segmentation btn btn-primary waves-effect waves-light btn-sm float-right">
									<i class="fa fa-search"></i> Run Segmentation
								</a>

								<h6 class="card-title"><?= $clasification->abdominal[0]->pred_class ?></h6>

								<div class="img-hover">
									<a class="image-popup-vertical-fit">
										<img class="img-holder img-fluid m-1" alt="" src="<?= base_url('webapp_storage/'.session('id')."/".$patient["id"] ."/" . $clasification->abdominal[0]->img); ?>" style="width: 100%;max-height: 40vh;">
									</a>
								</div>

								<div class="row mt-3 d-none mesurs justify-content-around">
									<div class="col-md-4 text-center">
										<p class="font-size-22 bg-warning">
											<!-- round($result->PC, 2) ?> -->
											PA: <b class="text-dark p-holder"> </b>
										</p>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-6 text-center">
										<p>
											Accuracy :
										</p>
										<input class="knob" data-width="150" data-height="150" data-thickness=".1" data-readOnly="true" data-linecap="round" data-fgcolor="#0089ef" value="<?= round($clasification->abdominal[0]->precision * 100, 2) ?>">

									</div>
									<div class="col-md-6 text-center">
										<p>
											Satisfaction threshold: <?= $rand = rand(0, 100) ?>
										</p>
										<?php if ($rand > 30) : ?>
											<img src="<?= base_url("assets/images/icons/good_satisfaction.svg") ?>" alt="satisfacion" height="150">
										<?php else : ?>
											<img src="<?= base_url("assets/images/icons/bad_satisfaction.svg") ?>" alt="satisfacion" height="150" data-toggle="tooltip" data-placement="top" title="EXPLINATION: Plan does not meet the criteria of a good standard plan that allows the analysis">
										<?php endif ?>
									</div>
								</div>

							</div>
						<?php endif; ?>
						<div class="tab-pane" id="plan4" role="tabpanel">
							<p class="mb-0">
								comming soon
							</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>

<!-- modal run expert -->

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
									<input type="text" id="first_name" name="email" class="form-control" required placeholder="Enter title">
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
							<label>image</label>
							<a class="image-popup-vertical-fit">
								<!-- <img class="img-fluid m-1" alt="" src="<?= "" // base_url("assets/images/patients/segmentations/" . $result->image); 
																			?>" style="width: 100%;height: 200px;object-fit: cover;"> -->
								<img class="img-fluid m-1" alt="" src="<?= base_url("assets/images/patients/segmentations/1YRRZMKV_0.jpg"); ?>" style="width: 100%;height: 200px;object-fit: cover;">
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

<!-- modal RCIU -->


<div id="modalRCIU_1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalRCIU" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0">Diagnostic étiologique et retentissement à l’échographique</h5>
			</div>
			<div class="modal-body">
				<div class="my-3">
					<div class="d-flex justify-content-between mb-3">
						<p class="text-dark">Abondance du liquid amniotique: oligoamnios, normale, hydramnios</p>
						<div class="d-flex">
							<p class="mx-3 text-center">
								<span class="badge badge-pill badge-soft-danger font-size-11">X</span>
							</p>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck1">
								<label class="custom-control-label" for="customCheck1"></label>
							</div>

						</div>
					</div>
					<div class="d-flex justify-content-between mb-3">
						<p class="text-dark">Doppler : Etude Doppler des artères utérines</p>
						<div class="d-flex">
							<p class="mx-3 text-center">
								<span class="badge badge-pill badge-soft-danger font-size-11">X</span>
							</p>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck2">
								<label class="custom-control-label" for="customCheck2"></label>
							</div>

						</div>
					</div>
					<div class="d-flex justify-content-between mb-3">
						<p class="text-dark">Doppler : Etude Doppler des artères ombilicales</p>
						<div class="d-flex">
							<p class="mx-3 text-center">
								<span class="badge badge-pill badge-soft-danger font-size-11">X</span>
							</p>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck3">
								<label class="custom-control-label" for="customCheck3"></label>
							</div>

						</div>
					</div>
					<div class="d-flex justify-content-between mb-3">
						<p class="text-dark">Doppler : Etude Doppler du Ductus Venosus</p>
						<div class="d-flex">
							<p class="mx-3 text-center">
								<span class="badge badge-pill badge-soft-danger font-size-11">X</span>
							</p>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck4">
								<label class="custom-control-label" for="customCheck4"></label>
							</div>

						</div>
					</div>
					<div class="d-flex justify-content-between mb-3">
						<p class="text-dark">Doppler : Etude Doppler des artères cérébrale moyennes</p>
						<div class="d-flex">
							<p class="mx-3 text-center">
								<span class="badge badge-pill badge-soft-danger font-size-11">X</span>
							</p>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck5">
								<label class="custom-control-label" for="customCheck5"></label>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer toggle1 d-none">
				<button id="btn_next_modal" type="button" class="btn btn-success waves-effect waves-light mr-1">
					Next
				</button>
				<!-- <button class="btn btn-secondary waves-effect">
					Cancel
				</button> -->
			</div>
		</div>
	</div>
</div>

<div id="modalRCIU_2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalRCIU" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0">Diagnostic étiologique clinic-biologique</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="d-flex justify-content-between mb-3 my-3">
					<p class="text-dark">Examen clinque: Recherche d’un tabagisme ou d’un ethylisme actifs</p>
					<div class="d-flex">
						<p class="mx-3 text-center">
							<span class="badge badge-pill badge-soft-danger font-size-11">X</span>
						</p>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="customCheck6">
							<label class="custom-control-label" for="customCheck6"></label>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-between mb-3">
					<p class="text-dark">Statut sérologique: Cytomégalovirus</p>
					<div class="d-flex">
						<p class="mx-3 text-center">
							<span class="badge badge-pill badge-soft-danger font-size-11">X</span>
						</p>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="customCheck7">
							<label class="custom-control-label" for="customCheck7"></label>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-between mb-3">
					<p class="text-dark">Statut sérologique: Syphilis</p>
					<div class="d-flex">
						<p class="mx-3 text-center">
							<span class="badge badge-pill badge-soft-danger font-size-11">X</span>
						</p>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="customCheck8">
							<label class="custom-control-label" for="customCheck8"></label>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-between mb-3">
					<p class="text-dark">Bilan Biologique complet: ionogramme - urée-créat, ASAT-ALAT, acide urique, NFS, TP-TCA</p>
					<div class="d-flex">
						<p class="mx-3 text-center">
							<span class="badge badge-pill badge-soft-danger font-size-11">X</span>
						</p>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="customCheck9">
							<label class="custom-control-label" for="customCheck9"></label>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-between mb-3">
					<p class="text-dark">Envisager une protéinurie de 24h </p>
					<div class="d-flex">
						<p class="mx-3 text-center">
							<span class="badge badge-pill badge-soft-danger font-size-11">X</span>
						</p>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="customCheck10">
							<label class="custom-control-label" for="customCheck10"></label>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-between mb-3">
					<p class="text-dark">Examen clinque: Recherche d’un tabagisme ou d’un ethylisme actifs</p>
					<div class="d-flex">
						<p class="mx-3 text-center">
							<span class="badge badge-pill badge-soft-danger font-size-11">X</span>
						</p>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="customCheck11">
							<label class="custom-control-label" for="customCheck11"></label>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer toggle2 d-none">
				<button type="button" class="btn btn-success waves-effect waves-light mr-1" data-dismiss="modal" aria-label="Close">
					OK
				</button>
				<!-- <button class="btn btn-secondary waves-effect">
					Cancel
				</button> -->
			</div>
		</div>
	</div>
</div>

<!-- Scripts -->

<script src="<?= base_url("assets/libs/jquery-knob/jquery.knob.min.js") ?>"></script>
<script>
	$(document).ready(function() {
		$(".knob").knob({
			'format': function(value) {
				return value + '%';
			}
		});
		var rciu_results = {
			"GA": "<?= $patient["gestational_age"] ?>",
			"LF": 0,
			"AC": 0,
			"HC": 0
		}
		$('#btn_next_modal').click(function() {
			$("#modalRCIU_1").modal('hide');
			$("#modalRCIU_2").modal('show');
		});

		function check_rciu() {
			if (rciu_results.LF && rciu_results.AC && rciu_results.HC) {
				fetch("<?= base_url("/patients/rciu_check") ?>", {
						method: "POST",
						body: JSON.stringify(rciu_results)
					})
					.then(res => res.json())
					.then(json => {
						var title = "";
						if (json.RCIU) {
							title = "RCIU Detected";
						} else if (json.risk_RCIU) {
							title = "RCIU Risk Detected";
						}
						if (json.RCIU || json.risk_RCIU) {
							Swal.fire({
								type: "info",
								title: "Gestational Age Estimation",
								text: "Based on the segmentations, the estimated GA is: 13 weeks",// + (json.predicted_GA / 7).toFixed() + " weeks",
								confirmButtonText: "OK",
							}).then((confirm) => {
								Swal.fire({
									type: "warning",
									title: title,
									text: "We are in a potential fetal growth restriction (FGR) risk case",
									confirmButtonText: "Diagnosis",
								}).then((confirm) => {
									$("#modalRCIU_1").modal('show');
								})
							})
						} else {
							Swal.fire({
								type: "info",
								title: "Gestational Age Estimation",
								text: "Based on the segmentations, the estimated GA is: 13 weeks",// + (json.predicted_GA / 7).toFixed() + " weeks",
								confirmButtonText: "OK",
							}).then((confirm) => {
								Swal.fire({
									type: "warning",
									title: title,
									text: "We are in a potential fetal growth restriction (FGR) risk case",
									confirmButtonText: "Diagnosis",
								}).then((confirm) => {
									$("#modalRCIU_1").modal('show');
								})
								// Swal.fire({
								// 	type: "success",
								// 	title: "Segmentation Done",
								// 	text: "No risk case detected",
								// 	confirmButtonText: "OK",
								// })
							})
						}
					});
			}
		}

		$('.run_segmentation').click(function() {
			var btn = $(this);
			var originalHTML = '<i class="fa fa-search"></i> Run Segmentation';
			btn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Proccessing...');
			var baseImageLink = "<?= base_url( 'webapp_storage/'.session('id')."/".$patient["id"]."/"."segmentation_output/"); ?>"
			var link = btn.data('link');
			var type = btn.data('type');
			var mesursDiv = btn.parent().find(".mesurs");
			var imageDiv = btn.parent().find("img.img-holder");
			fetch(link)
				.then(res => res.json())
				.then(json => {
					if (type == "Transthalamique") {
						rciu_results.HC = json.PC;
						mesursDiv.find('.p-holder1').text(json.BIP.toFixed(2) + " cm");
						mesursDiv.find('.p-holder2').text(json.PC.toFixed(2) + " cm");
						imageDiv.attr('src', baseImageLink + "/" + json.image);
						mesursDiv.removeClass("d-none");
						btn.html(originalHTML);
						check_rciu();
					} else if (type == "Fémoral") {
						rciu_results.LF = json.BIP;
						mesursDiv.find('.p-holder').text(json.BIP.toFixed(2) + " cm");
						imageDiv.attr('src', baseImageLink + "/" + json.image);
						mesursDiv.removeClass("d-none");
						btn.html(originalHTML);
						check_rciu();
					} else if (type == "Abdominal") {
						rciu_results.AC = json.PC;
						mesursDiv.find('.p-holder').text(json.PC.toFixed(2) + " cm");
						imageDiv.attr('src', baseImageLink + "/" + json.image);
						mesursDiv.removeClass("d-none");
						btn.html(originalHTML);
						check_rciu();
					}
				});
		});

		$('#customCheck5').click(function() {
			$(".modal-footer.toggle1").removeClass("d-none");
		});
		$('#customCheck11').click(function() {
			$(".modal-footer.toggle2").removeClass("d-none");
		});
	})
</script>