<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © DEEPECHO.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-right d-none d-sm-block">
                    Patient Report Analitics
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/metismenu/metisMenu.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/simplebar/simplebar.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/node-waves/waves.min.js'); ?>"></script>
<!-- Sweet Alerts js -->
<script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
<!-- Required datatable js -->
<script src="<?= base_url('assets/libs/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<!-- Buttons examples -->
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/jszip/jszip.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js'); ?>"></script>
<!-- Responsive examples -->
<script src="<?= base_url('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js'); ?>"></script>


<!-- axios -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
<!-- <script src="<?= base_url('assets/js/pages/dashboard.init.js'); ?>"></script> -->

<script>
    var checkAuth = "<?= base_url('admin/checkAuth') ?>"
</script>


<script src="<?= base_url('assets/js/app.js') ?>"></script>

<!-- parsley plugin -->
<script src="<?= base_url('assets/libs/parsleyjs/parsley.min.js') ?>"></script>
<!-- validation init -->
<script src="<?= base_url('assets/js/pages/form-validation.init.js') ?>"></script>

<!-- Sweet Alerts js -->
<script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>

<!-- Sweet alert init js-->
<script src="<?= base_url('assets/js/pages/sweet-alerts.init.js') ?>"></script>

<!-- Admin Js -->


<!-- Super Admin Js -->
<script>
    $(document).ready(function() {
        // add
        $('#ALL_project_form').on('submit', function(event) {
            event.preventDefault()
            $.post($(this).attr('action'), $(this).serialize(), function(data) {
                if (data === true) {
                    // reset form
                    $('#ALL_project_form')[0].reset();
                    // modal hide
                    $('#newProjectModal').modal('hide');
                    //reload datatable
                    var table = $('#data_all_projects').DataTable();
                    table.ajax.reload();
                    //sweet alert done
                    Swal.fire({
                        title: "Good job!",
                        text: "You project has been created successfully",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3b5de7"
                    });
                } else {
                    console.log('error');
                }
            }, 'json')
        })
    });

    // delete
    $(document).on('click', '.su_delete', function() {
        var project_id = $(this).attr("data-id");
        Swal.fire({
            title: "Are you sure?",
            text: "Do you really want to delete this project",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Yes, clear it!"
        }).then(function(t) {
            if (t.value) {
                $.ajax({
                    url: "<?= base_url('su_projects/delete_project') ?>",
                    method: "POST",
                    data: {
                        project_id: project_id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.status == '200') {
                            location.reload();
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
            } else {
                Swal.fire({
                    type: "error",
                    title: "Error !",
                    confirmButtonText: "Close",
                })
            }
        });
    });

    // update
    $(document).on('click', '.su_update', function() {
        var project_id = $(this).attr("data-id");
        var table = $('#data_all_projects').DataTable();
        var data = table.row($(this).parents('tr')).data();
        $('<input>', {
            type: 'hidden',
            id: 'project_id',
            name: 'project_id',
            value: project_id
        }).appendTo('#patient_form');
        $('#newProjectModal .modal-title').text('Update Project');
        $('#name').val(data[0]);
        $('#description').val(data[1]);
        $("#btn_submit").html("Save");
        $('#patient_form').attr('action', "<?= base_url('su_projects/update_project') ?>");
        $('#newProjectModal').modal('show');
    });

    // on hide modal
    $("#newProjectModal").on("hidden.bs.modal", function() {
        $('#patient_form').attr('action', "<?= base_url('su_projects/store_project') ?>");
        $('#newProjectModal .modal-title').text('New Project');
        $('#name').val("");
        $('#description').val("");
        $("#btn_submit").html("Submit");
        $('#project_id').remove();
    });
</script>
<script>
    // delete Image
    $(document).on('click', '.su_delete_img', function() {
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
                    url: "<?= base_url('su_projects/delete_image') ?>",
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
<script>
    // datatable users
    $(document).ready(function() {
        $("#data_users").DataTable({
            ajax: {
                url: "<?= base_url('users/get_data_users') ?>",
                type: 'POST'
            },
            "serverSide": false,
            dom: "<'row'<'col-md-12'B>>" +
                "<'row'<'col-md-6'l><'col-md-6 d-flex justify-content-end'f>>" +
                "<'row'<'col-md-12't>>" +
                "<'row'<'col-md-6'i><'col-md-6 d-flex justify-content-end'p>>",
            buttons: ["copy", "excel"]
        });
    })

    // update user
    $(document).on('click', '.update-user', function() {
        var user_id = $(this).attr("data-id");
        var table = $('#data_users').DataTable();
        var data = table.row($(this).parents('tr')).data();
        $('<input>', {
            type: 'hidden',
            id: 'user_id',
            name: 'user_id',
            value: user_id
        }).appendTo('#user_form');
        $('#userModal .modal-title').text('Update User');
        $('#login').val(data[0]);
        $('#email').val(data[1]);
        $('#telephone').val(data[2]);
        $("#btn_submit_form_user").html("Save");
        $('#user_form').attr('action', "<?= base_url('users/update_user') ?>");
        $('#userModal').modal('show');
    });

    // on hide modaluser
    $("#userModal").on("hidden.bs.modal", function() {
        $('#user_form').attr('action', "<?= base_url('users/store_user') ?>");
        $('#userModal .modal-title').text('New User');
        $('#login').val("");
        $('#email').val("");
        $('#telephone').val("");
        $("#btn_submit_form_user").html("Submit");
        $('#user_id').remove();
    });

    $(document).ready(function() {
        // add user
        $('#user_form').on('submit', function(event) {
            event.preventDefault()
            $.post($(this).attr('action'), $(this).serialize(), function(data) {
                if (data.response === true) {
                    // reset form
                    $('#user_form')[0].reset();
                    // modal hide
                    $('#userModal').modal('hide');
                    //reload datatable
                    var table = $('#data_users').DataTable();
                    table.ajax.reload();
                    //sweet alert done
                    Swal.fire({
                        title: "Good job!",
                        text: data.message,
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3b5de7"
                    });
                } else {
                    if (data.action == "store") {
                        var text_errors;
                        $.each(data.errors, function(key, value) {
                            text_errors = key + ' ' + value;
                        });
                        Swal.fire({
                            type: "error",
                            title: "Error !",
                            text: text_errors,
                            confirmButtonText: "Close",
                        })
                    } else {
                        Swal.fire({
                            type: "error",
                            title: "Error !",
                            text: data.errors,
                            confirmButtonText: "Close",
                        })
                    }
                }
            }, 'json')
        })
    });

    // delete user
    $(document).on('click', '.delete-user', function() {
        var user_id = $(this).attr("data-id");
        Swal.fire({
            title: "Are you sure?",
            text: "Do you really want to delete this user !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Yes, delete it!"
        }).then(function(t) {
            if (t.value) {
                $.ajax({
                    url: "<?= base_url('users/delete_user') ?>",
                    method: "POST",
                    data: {
                        user_id: user_id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.status == '200') {
                            var table = $('#data_users').DataTable();
                            table.ajax.reload();
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
            } else {
                Swal.fire({
                    type: "error",
                    title: "Error !",
                    confirmButtonText: "Close",
                })
            }
        });
    });

    // update user
    $(document).on('click', '.key-user', function() {
        var user_id = $(this).attr("data-id");
        Swal.fire({
            title: "Are you sure?",
            text: "Do you really want to generate new password !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Yes, Generate it!"
        }).then(function(t) {
            if (t.value) {
                $.ajax({
                    url: "<?= base_url('users/generate_password_user') ?>",
                    method: "POST",
                    data: {
                        user_id: user_id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.response) {
                            Swal.fire({
                                type: "success",
                                title: "Good Job !",
                                text: "Password has been changed successfully",
                                confirmButtonText: "Close",
                            })
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
            } else {
                Swal.fire({
                    type: "error",
                    title: "Error !",
                    confirmButtonText: "Close",
                })
            }
        });
    });
</script>
<script>
    // datatable ALL projects
    $(document).ready(function() {
        var table = $("#data_all_projects").DataTable({
            ajax: {
                url: "<?= base_url('su_projects/get_data_all_projects') ?>",
                type: 'POST'
            },
            "serverSide": false,
            dom: "<'row'<'col-md-12'B>>" +
                "<'row'<'col-md-6'l><'col-md-6 d-flex justify-content-end'f>>" +
                "<'row'<'col-md-12't>>" +
                "<'row'<'col-md-6'i><'col-md-6 d-flex justify-content-end'p>>",
            buttons: ["copy", "excel"]
        });
    })
</script>
</body>

</html>