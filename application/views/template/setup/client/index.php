<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

 <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Client Management</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">Setup</div>
        <div class="breadcrumb-item"><a href="<?php echo base_url() ?>users">Client Management</a></div>
      </div>
    </div>
    <div class="section-body">
       <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>New Client</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="myTable" width="100%">
                        <thead>                                 
                          <tr>
                            <th>Nama Client</th>
                            <th>Username</th>
                            <th>Sender ID</th>
                            <th>Created Date</th>
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
        <h5 class="modal-title">Create New Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Nama Client</label>
          <div class="col-sm-9">
            <input type="text" id="namaclient" class="form-control" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-9">
            <select class="form-control select2" id="username">
              <option value="0">Select Username</option>
              <?php 
                foreach ($master_username->result() as $role) {
                  echo "<option value='$role->username'>$role->username</option>";
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Sender ID</label>
          <div class="col-sm-9">
            <input type="text" id="senderid" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Status</label>
          <div class="col-sm-9">
          <select class="form-control select2" id="status-client">
            <option value="0">Select Status</option>
            <option value="Y">Active</option>
            <option value="N">Disable</option>
          </select>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="simpan-client" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal-edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Nama Client</label>
          <div class="col-sm-9">
            <input type="text" id="edit-namaclient" class="form-control" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-9">
            <select class="form-control select2" id="edit-username" disabled>
              <option value="0">Select Username</option>
              <?php 
                foreach ($master_username->result() as $role) {
                  echo "<option value='$role->username'>$role->username</option>";
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Sender ID</label>
          <div class="col-sm-9">
            <input type="text" id="edit-senderid" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Status</label>
          <div class="col-sm-9">
          <select class="form-control select2" id="edit-status-client">
            <option value="0">Select Status</option>
            <option value="Y">Active</option>
            <option value="N">Disable</option>
          </select>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="update-client" class="btn btn-primary">Update</button>
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
    $('#client-div').hide();
    var table2 = $('#myTable').DataTable({
      deferRender: true,
      bSort: true,
      bDestroy: true,
      bPaginate: true,
      scrollX: true,
      /*columnDefs: [
            {
                "targets": [1,2],
                "width": "120"
            },
            {
                "targets": 8,
                "width": "130"
            },
        ],*/
      "ajax": '<?php echo base_url(); ?>client/ajax_data'
    });
    $('#myTable tbody').on( 'click', '#edit-client', function () {
        var data = table2.row( $(this).parents('tr') ).data();
        //alert( data[0] +" "+ data[ 1 ] +" "+ data[ 2 ]+" "+ data[ 3 ] +" "+ data[ 4 ] );
        var edit_nama = data[0];
        var edit_username = data[1];
        var edit_sender = data[2];
        var edit_status = data[4];
        if(edit_status == 'Active'){
          var status = 'Y';
        }else{
          var status = 'N';
        }
        $("#exampleModal-edit").modal('show');
        $('select#edit-status-client').val(status).change();
        $('select#edit-username').val(edit_username).change();
        $('#edit-namaclient').val(edit_nama);
        $('#edit-senderid').val(edit_sender);
    });
    $('#myTable tbody').on('click', '#delete-client', function () {
        var data = table2.row( $(this).parents('tr') ).data();
        if (confirm('Are you sure you want to delete this client?')) {
        $.ajax({
          url :"<?php echo base_url();?>client/delete_user",
          type:"POST",
          data:{
            client : data [0],
            sender : data [2]
            },
          success: function(s){
            if(s > 0){
              iziToast.success({
                title: 'Delete Client',
                message: 'Delete client success',
                position: 'topRight'
              });
              $('#myTable').DataTable().ajax.reload();
              //location.reload();
            }else{
              iziToast.error({
                title: 'Delete Client',
                message: 'Delete client failed !',
                position: 'topRight'
              });
            }
          },
         });
       }
    });
    $('#simpan-client').on('click',function(){
      $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>client/new_user",
      data: { 
        client : $('#namaclient').val(),
        username : $('#username').val(),
        sender : $('#senderid').val(),
        status : $('#status-client').val(),
            },
      cache: false,
      success: function(s){
        iziToast.success({
          title: 'New Client',
          message: 'New Client Success Created',
          position: 'topRight'
        });
        $('#exampleModal').modal('toggle');
        $('#myTable').DataTable().ajax.reload();
      },
      error: function(s){
        iziToast.error({
          title: 'New Client',
          message: 'Save New Client Failed',
          position: 'topRight'
        });
      }
      });
    });

    $('#update-client').on('click',function(){
      $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>client/update_user",
      data: { 
        client : $('#edit-namaclient').val(),
        username : $('#edit-username').val(),
        sender : $('#edit-senderid').val(),
        status : $('#edit-status-client').val(),
            },
      cache: false,
      success: function(s){
        if(s > 0){
          iziToast.success({
            title: 'Update Client',
            message: 'Update Client Success',
            position: 'topRight'
          });
          $('#exampleModal-edit').modal('toggle');
          $('#myTable').DataTable().ajax.reload();
        }else{
          iziToast.error({
            title: 'Update Client',
            message: 'Update Client Failed',
            position: 'topRight'
          });
          $('#exampleModal-edit').modal('toggle');
        }
      }
      });
    });

  });
</script>