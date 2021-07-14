<div class="page-content">
	<link href="<?= base_url('assets/libs/dropzone/min/dropzone.min.css') ?>" rel="stylesheet" type="text/css" />
	<style>
		.floating-btn {
			position: absolute;
			top: 10px;
			right: 20px;
			display: none;
		}

		.img-hover:hover>button {
			display: inline-block;
		}

		/* .dropzone {
			background: #273344;
		}

		.dropzone .dz-preview.dz-image-preview {
			background: #273344;
		} */
	</style>
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-flex align-items-center justify-content-between">
				<h4 class="page-title mb-0 font-size-18">Patient report</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->

	<div class="row">
		<div class="col-12">
			<a id="run_classification" href="<?= base_url("/patients/" . $patient["id"] . "/classification") ?>" class="btn btn-primary waves-effect waves-light float-right mb-2">Run Classification</a>
			<button type="button" data-toggle="modal" data-target="#newImageModal" class="btn btn-primary waves-effect waves-light mb-2">Add images</button>
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
			<?php if (Count($images) >  0) : ?>
				<div class="card">
					<div class="card-body">
						<h5 class="card-title mb-3">Images</h5>
						<div class="row">
							<?php foreach ($images as $image) : ?>
								<div class="col-md-6 my-2">
									<div class="img-hover">
										<button type="button" data-id="<?= $image->id ?>" class="delete_img floating-btn btn btn-danger waves-effect waves-light btn-sm">
											<i class="fa fa-trash"></i>
										</button>
										<a class="image-popup-vertical-fit">
											<img class="img-fluid m-1" alt="" src="<?= base_url($image->path); ?>" style="width: 100%;height: 300px;object-fit: cover;">
										</a>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			<?php endif ?>
		</div>
	</div>

</div>


<div id="newImageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="newImageModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0">New Image</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Select files to upload</h4>
						<p class="card-title-desc">Maximum file size allowed for upload: ∞</p>
						<div>
							<form method="POST" action="<?= base_url('patients/add_image/' . $patient["id"]) ?>" class="dropzone" id="fileupload" accept-charset="utf-8" enctype="multipart/form-data">
								<div class="fallback">
									<input name="file[]" type="file" multiple="multiple">
								</div>
								<div class="dz-message needsclick">
									<div class="mb-3">
										<i class="display-4 text-muted mdi mdi-upload-network-outline"></i>
									</div>

									<h4>Drop files here or click to upload.</h4>
								</div>

							</form>
							<div class="text-center mt-4">
								<button id="fileupload-btn" class="btn btn-primary waves-effect waves-light">Upload images</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Plugins js -->
<script src="<?= base_url('assets/libs/dropzone/min/dropzone.min.js') ?>"></script>

<!-- upload images -->
<script>
	Dropzone.options.fileupload = {
		autoProcessQueue: false,
		acceptedFiles: 'image/*',
		maxFilesize: 1024, // MB
		uploadMultiple: true,
		parallelUploads: 20,
		// preventDuplicates: true,
		init: function() {
			this.on("completemultiple", function(file) {
				var filesCount = this.getQueuedFiles().length;
				if (filesCount != 0) {
					this.processQueue();
				} else {
					Swal
						.fire({
							type: "success",
							title: "All files have been uploaded successfully!"
						}).then(() => location.reload());
				}
			});
			var submitButton = document.querySelector("#fileupload-btn");
			submitButton.addEventListener("click", () => {
				this.processQueue();
				return false;
			});

		}
	};

	Dropzone.prototype.isFileExist = function(file) {
		var i;
		if (this.files.length > 0) {
			for (i = 0; i < this.files.length; i++) {
				if (this.files[i].name === file.name &&
					this.files[i].size === file.size &&
					this.files[i].lastModifiedDate.toString() === file.lastModifiedDate.toString()) {
					return true;
				}
			}
		}
		return false;
	};

	Dropzone.prototype.addFile = function(file) {
		file.upload = {
			progress: 0,
			total: file.size,
			bytesSent: 0
		};
		if (this.options.preventDuplicates && this.isFileExist(file)) {
			Swal.fire({
				title: "Duplicate Files",
				text: "Duplicate Files Cannot Be Uploaded!",
				type: "error",
				showCancelButton: !0,
				confirmButtonColor: "#3b5de7",
				cancelButtonColor: "#f46a6a"
			});
			return;
		}
		this.files.push(file);
		file.status = Dropzone.ADDED;
		this.emit("addedfile", file);
		this._enqueueThumbnail(file);
		return this.accept(file, (function(_this) {
			return function(error) {
				if (error) {
					file.accepted = false;
					_this._errorProcessing([file], error);
				} else {
					file.accepted = true;
					if (_this.options.autoQueue) {
						_this.enqueueFile(file);
					}
				}
				return _this._updateMaxFilesReachedClass();
			};
		})(this));
	};
</script>

<!-- // delete Image -->
<script>
	$(document).on('click', '.delete_img', function() {
		var image_id = $(this).attr("data-id");
		Swal.fire({
			title: "Are you sure?",
			text: "Do you really want to delete this image",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#34c38f",
			cancelButtonColor: "#f46a6a",
			confirmButtonText: "Yes, clear it!"
		}).then((t) => {
			if (t.value) {
				$.ajax({
					url: "<?= base_url('patients/delete_image') ?>",
					method: "POST",
					data: {
						image_id: image_id
					},
					dataType: "json",
					success: (data) => {
						if (data.status == '200') {
							$(this).parent().parent().remove();
						}
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
</script>

<!-- run classification process btn -->
<script>
	$('#run_classification').click(function() {
		$(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Proccessing...');
	});
</script>
