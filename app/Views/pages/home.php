<div class="page-content">
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-flex align-items-center justify-content-between">
				<h4 class="page-title mb-0 font-size-18">Admin Dashboard</h4>
			</div>
		</div>
	</div>

	<?php if (session('success')) : ?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success" role="alert">
					<?= session('success') ?>
				</div>
			</div>
		</div>
	<?php endif ?>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title mb-4">Workspaces</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<div class="media">
						<div class="avatar-lg font-size-20 mr-3">
							<span class="avatar-title bg-soft-primary text-primary rounded">
								<!-- <i class="mdi mdi-tag-plus-outline"></i> -->
								<img src="<?= base_url("assets/images/icons/data-public.svg") ?>" alt="data image" height="60">
							</span>
						</div>
						<div class="media-body">
							<div class="font-size-16 mt-2">Public</div>
						</div>
					</div>
					<h4 class="mt-4">1500</h4>
					<div class="row">
						<div class="col-7">
							<p class="mb-0"><span class="text-success mr-2"> 0.80% <i class="mdi mdi-arrow-up"></i> </span></p>
						</div>
						<div class="col-5 align-self-center">
							<div class="progress progress-sm">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<div class="media">
						<div class="avatar-lg font-size-20 mr-3">
							<span class="avatar-title bg-soft-primary text-primary rounded">
								<img src="<?= base_url("assets/images/icons/data-secured.svg") ?>" alt="data image" height="60">

								<!-- <i class="mdi mdi-tag-plus-outline"></i> -->
							</span>
						</div>
						<div class="media-body">
							<div class="font-size-16 mt-2">Private</div>
						</div>
					</div>
					<h4 class="mt-4">70</h4>
					<div class="row">
						<div class="col-7">
							<p class="mb-0"><span class="text-success mr-2"> 0.28% <i class="mdi mdi-arrow-up"></i> </span></p>
						</div>
						<div class="col-5 align-self-center">
							<div class="progress progress-sm">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div>
						<button type="button" data-toggle="modal" data-target="#newProjectModal" class="btn btn-primary waves-effect waves-light float-right mb-2">Add Patient</button>
					</div>
					<h4 class="card-title mb-4">List of Patients</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<table id="data_patients" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th data-priority="1">First name</th>
								<th data-priority="1">Last name</th>
								<th data-priority="1">Birth date</th>
								<th data-priority="1">Email</th>
								<th data-priority="1">Phone</th>
								<th data-priority="2">Last menstrual period</th>
								<th data-priority="2">Gestational age</th>
								<th data-priority="2">Gravidity</th>
								<th data-priority="2">Parity</th>
								<th data-priority="2">Medical history</th>
								<th data-priority="2">Notes</th>
								<th data-priority="0">Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>

<div id="newProjectModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="newProjectModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0">New Patient</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="patient_form" method="POST" action="<?= base_url('patients/store_patient') ?>" class="custom-validation" novalidate>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>First name</label>
								<div>
									<input type="text" id="first_name" name="first_name" class="form-control" required placeholder="Enter title">
								</div>
							</div>
							<div class="form-group">
								<label>Last name</label>
								<div>
									<input type="text" id="last_name" name="last_name" class="form-control" required placeholder="Enter title">
								</div>
							</div>
							<div class="form-group">
								<label>Birth date</label>
								<div>
									<input type="text" id="birth_date" name="birth_date" class="form-control" placeholder="Enter title">
								</div>
							</div>
							<div class="form-group">
								<label>Email</label>
								<div>
									<input type="text" id="email" name="email" class="form-control" placeholder="Enter title">
								</div>
							</div>
							<div class="form-group">
								<label>Phone</label>
								<div>
									<input type="text" id="phone" name="phone" class="form-control" placeholder="Enter title">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Last menstrual period</label>
								<div>
									<input type="text" id="last_menstrual_period" name="last_menstrual_period" class="form-control" placeholder="Enter title">
								</div>
							</div>
							<div class="form-group">
								<label>Gestational age</label>
								<div>
									<input type="text" id="gestational_age" name="gestational_age" class="form-control" placeholder="Enter title">
								</div>
							</div>
							<div class="form-group">
								<label>Gravidity</label>
								<div>
									<input type="text" id="gravidity" name="gravidity" class="form-control" placeholder="Enter title">
								</div>
							</div>
							<div class="form-group">
								<label>Parity</label>
								<div>
									<input type="text" id="parity" name="parity" class="form-control" placeholder="Enter title">
								</div>
							</div>
							<div class="form-group">
								<label>Medical history</label>
								<div>
									<input type="text" id="medical_history" name="medical_history" class="form-control" placeholder="Enter title">
								</div>
							</div>
							<div class="form-group">
								<label>Notes</label>
								<div>
									<textarea class="form-control" id="notes" name="notes" rows="5"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group mb-0">
						<div>
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

<script>
	// datatable projects
	$(document).ready(function() {
		var Dt_patients = $("#data_patients").DataTable({
			ajax: {
				url: "<?= base_url('patients/get_data_patients') ?>",
				type: 'POST'
			},
			"serverSide": false,
			dom: "<'row'<'col-md-12'B>>" +
				"<'row'<'col-md-6'l><'col-md-6 d-flex justify-content-end'f>>" +
				"<'row'<'col-md-12't>>" +
				"<'row'<'col-md-6'i><'col-md-6 d-flex justify-content-end'p>>",
			buttons: ["copy", "excel"],
			columnDefs: [{
				targets: [5, 6, 7, 8, 9, 10],
				visible: false
			}]
		});

		// add
		$('#patient_form').on('submit', function(event) {
			event.preventDefault()
			$.post($(this).attr('action'), $(this).serialize(), function(data) {
				if (data === true) {
					$("#patient_form").trigger("reset")
					$('#newProjectModal').modal('hide');
					Dt_patients.ajax.reload();
					Swal.fire({
						title: "Good job!",
						text: "Submited successfully",
						type: "success",
						showCancelButton: false,
						confirmButtonColor: "#3b5de7"
					});
				} else {
					console.log('error');
				}
			}, 'json')
		})

		// delete
		$(document).on('click', '.delete', function() {
			var patient_id = $(this).attr("data-id");
			Swal.fire({
				title: "Are you sure?",
				text: "Do you really want to delete this patient",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#34c38f",
				cancelButtonColor: "#f46a6a",
				confirmButtonText: "Yes, delete!"
			}).then(function(t) {
				if (t.value) {
					$.ajax({
						url: "<?= base_url('patients/delete_patient') ?>",
						method: "POST",
						data: {
							patient_id
						},
						dataType: "json",
						success: function(data) {
							if (data.status == '200') Dt_patients.ajax.reload();
						},
						error: function(xhr, status, error) {
							var err = eval("(" + xhr.responseText + ")");
							Swal.fire({
								type: "error",
								title: "Error !",
								text: err.Message,
								confirmButtonText: "Close",
							})
						}
					});
				}
			});
		});

		// update
		$(document).on('click', '.update', function() {
			var patient_id = $(this).attr("data-id");
			var table = $('#data_patients').DataTable();
			var data = table.row($(this).parents('tr')).data();
			$('<input>', {
				type: 'hidden',
				id: 'patient_id',
				name: 'patient_id',
				value: patient_id
			}).appendTo('#patient_form');
			$('#newProjectModal .modal-title').text('Update Patient');
			$('#first_name').val(data[0]);
			$('#last_name').val(data[1]);
			$('#birth_date').val(data[2]);
			$('#email').val(data[3]);
			$('#phone').val(data[4]);
			$('#last_menstrual_period').val(data[5]);
			$('#gestational_age').val(data[6]);
			$('#gravidity').val(data[7]);
			$('#parity').val(data[8]);
			$('#medical_history').val(data[9]);
			$('#notes').val(data[10]);
			$('#patient_form').attr('action', "<?= base_url('patients/update_patient') ?>");
			$('#newProjectModal').modal('show');
		});

		// on hide modal
		$("#newProjectModal").on("hidden.bs.modal", function() {
			$('#patient_form').attr('action', "<?= base_url('patients/store_patient') ?>");
			$('#newProjectModal .modal-title').text('New Project');
			$("#patient_form").trigger("reset")
			$('#patient_id').remove();
		});

	})
</script>