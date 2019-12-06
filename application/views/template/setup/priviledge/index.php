<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

 <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Role Management</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">Setup</div>
        <div class="breadcrumb-item"><a href="<?php echo base_url() ?>priviledge">Role Management</a></div>
      </div>
    </div>
    <div class="section-body">
       <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header"> 
                    <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>New Role</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="myTable" width="100%">
                        <thead>                                 
                          <tr>
                            <th>Role Name</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
  </section> 
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Role Name</label>
          <div class="col-sm-9">
            <input type="text" id="rolename" class="form-control" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Status</label>
          <div class="col-sm-9">
          <select class="form-control select2" id="status-role">
            <option>Select Status</option>
            <option value="1">Active</option>
            <option value="0">Disable</option>
          </select>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="simpan-role" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal-edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Role Name</label>
          <div class="col-sm-9">
            <input type="text" id="rolename-edit" class="form-control" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Status</label>
          <div class="col-sm-9">
          <select class="form-control select2" id="status-role-edit">
            <option>Select Status</option>
            <option value="1">Active</option>
            <option value="0">Disable</option>
          </select>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="update-role" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>

<?php 
$this->load->view('dist/_partials/js'); 
//$this->load->view('dist/_partials/footer');
?>
<script>
  $(document).ready( function () {
    var table2 = $('#myTable').DataTable({
      deferRender: true,
      bSort: true,
      bDestroy: true,
      bPaginate: true,
      scrollX: true,
      columnDefs: [
            {
                "targets": 2,
                "width": "200"
            },
        ],
      "ajax": '<?php echo base_url(); ?>/priviledge/ajax_data'
    });
    $('#myTable tbody').on( 'click', '#edit-role', function () {
        var data = table2.row( $(this).parents('tr') ).data();
        //alert( data[0] +" "+ data[ 1 ] +" "+ data[ 2 ]+" "+ data[ 3 ] +" "+ data[ 4 ] );
        var edit_rolename = data[0];
        var edit_status = data[1];
        if(edit_status == 'Active'){
          var status = '1';
        }else{
          var status = '0';
        }
        $("#exampleModal-edit").modal('show');
        $('select#status-role-edit').val(status).change();
        $('#rolename-edit').val(edit_rolename);
    });
    $('#myTable tbody').on('click', '#delete-role', function () {
        var data = table2.row( $(this).parents('tr') ).data();
        if (confirm('Are you sure you want to delete this role?')) {
        $.ajax({
          url :"<?php echo base_url();?>priviledge/delete_role",
          type:"POST",
          data:{
            rolename : data [0],
            },
          success: function(s){
            if(s > 0){
              iziToast.success({
                title: 'Delete Role',
                message: 'Delete role success',
                position: 'topRight'
              });
              $('#myTable').DataTable().ajax.reload();
              //location.reload();
            }else{
              iziToast.error({
                title: 'Delete Role',
                message: 'Delete role failed !',
                position: 'topRight'
              });
            }
          },
         });
       }
    });

    $('#simpan-role').on('click',function(){
      var client = '0';
      if($('#role-user').val() == 3){
        client = $('#client-group').val();
      }
      $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>priviledge/new_role",
      data: { 
        rolename : $('#rolename').val(),
        status : $('#status-role').val(),
            },
      cache: false,
      success: function(s){
        iziToast.success({
          title: 'New Role',
          message: 'New Role Success Created',
          position: 'topRight'
        });
        $('#exampleModal').modal('toggle');
        $('#myTable').DataTable().ajax.reload();
      },
      error: function(s){
        iziToast.error({
          title: 'New Role',
          message: 'Save New Role Failed',
          position: 'topRight'
        });
      }
      });
    });

    $('#update-role').on('click',function(){
      $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>priviledge/update_role",
      data: { 
        rolename : $('#rolename-edit').val(),
        status : $('#status-role-edit').val(),
            },
      cache: false,
      success: function(s){
        if(s > 0){
          iziToast.success({
            title: 'Update Role',
            message: 'Update Role Success',
            position: 'topRight'
          });
          $('#exampleModal-edit').modal('toggle');
          $('#myTable').DataTable().ajax.reload();
        }else{
          iziToast.error({
            title: 'Update Role',
            message: 'Update Role Failed',
            position: 'topRight'
          });
          $('#exampleModal-edit').modal('toggle');
        }
      }
      });
    });

  });
</script>