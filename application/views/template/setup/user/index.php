<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

 <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>User Management</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">Setup</div>
        <div class="breadcrumb-item"><a href="<?php echo base_url() ?>users">User Management</a></div>
      </div>
    </div>
    <div class="section-body">
       <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>New User</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="myTable">
                        <thead>                                 
                          <tr>
                            <th>Username</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role ID</th>
                            <th>Client ID</th>
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
        <h5 class="modal-title">Create New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-9">
            <input type="text" id="username" class="form-control" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">password</label>
          <div class="col-sm-9">
            <input type="password" id="password" class="form-control" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Firstname</label>
          <div class="col-sm-9">
            <input type="text" id="firstname" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Lastname</label>
          <div class="col-sm-9">
            <input type="text" id="lastname" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="email" id="email" class="form-control" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Phone Number</label>
          <div class="col-sm-9">
            <input type="text" id="phone" class="form-control phone-number" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Role User</label>
          <div class="col-sm-9">
          <select class="form-control select2" id="role-user">
            <option>Select Role</option>
            <?php 
              foreach ($master_role->result() as $role) {
                echo "<option value='$role->id'>$role->role_name</option>";
              }
            ?>
          </select>
          </div>
        </div>
        <div class="form-group row" id="client-div">
          <label class="col-sm-3 col-form-label">Client Group</label>
          <div class="col-sm-9">
          <select class="form-control select2" id="client-group">
            <option>Select Client</option>
            <?php 
              foreach ($master_client->result() as $client) {
                echo "<option value='$client->id'>$client->nama_client</option>";
              }
            ?>
          </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Status</label>
          <div class="col-sm-9">
          <select class="form-control select2" id="status-user">
            <option>Select Status</option>
            <option value="1">Active</option>
            <option value="0">Disable</option>
          </select>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="simpan-user" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal-edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-9">
            <input type="text" id="username-edit" class="form-control" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Firstname</label>
          <div class="col-sm-9">
            <input type="text" id="firstname-edit" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Lastname</label>
          <div class="col-sm-9">
            <input type="text" id="lastname-edit" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="email" id="email-edit" class="form-control" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Phone Number</label>
          <div class="col-sm-9">
            <input type="text" id="phone-edit" class="form-control phone-number" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Role User</label>
          <div class="col-sm-9">
          <select class="form-control select2" id="role-user-edit">
            <option>Select Role</option>
            <?php 
              foreach ($master_role->result() as $role) {
                echo "<option value='$role->id'>$role->role_name</option>";
              }
            ?>
          </select>
          </div>
        </div>
        <div class="form-group row" id="client-div">
          <label class="col-sm-3 col-form-label">Client Group</label>
          <div class="col-sm-9">
          <select class="form-control select2" id="client-group-edit">
            <option value="0">Select Client</option>
            <?php 
              foreach ($master_client->result() as $client) {
                echo "<option value='$client->id'>$client->nama_client</option>";
              }
            ?>
          </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Status</label>
          <div class="col-sm-9">
          <select class="form-control select2" id="status-user-edit">
            <option>Select Status</option>
            <option value="1">Active</option>
            <option value="0">Disable</option>
          </select>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="update-user" class="btn btn-primary">Update</button>
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
      columnDefs: [
            {
                "targets": [1,2],
                "width": "120"
            },
            {
                "targets": 8,
                "width": "130"
            },
        ],
      "ajax": '<?php echo base_url(); ?>/users/ajax_data'
    });
    $('#myTable tbody').on( 'click', '#edit-user', function () {
        var data = table2.row( $(this).parents('tr') ).data();
        //alert( data[0] +" "+ data[ 1 ] +" "+ data[ 2 ]+" "+ data[ 3 ] +" "+ data[ 4 ] );
        var edit_username = data[0];
        var edit_firstname = data[1];
        var edit_lastname = data[2];
        var edit_email = data[3];
        var edit_phone = data[4];
        var edit_roleid = data[5];
        var edit_client = data[6];
        var edit_status = data[7];
        if(edit_status == 'Active'){
          var status = '1';
        }else{
          var status = '0';
        }
        $("#exampleModal-edit").modal('show');
        $('select#role-user-edit').val(edit_roleid).change();
        $('select#client-group-edit').val(edit_client).change();
        $('select#status-user-edit').val(status).change();
        $('#username-edit').val(edit_username);
        $('#firstname-edit').val(edit_firstname);
        $('#lastname-edit').val(edit_lastname);
        $('#email-edit').val(edit_email);
        $('#phone-edit').val(edit_phone);
    });
    $('#myTable tbody').on('click', '#delete-user', function () {
        var data = table2.row( $(this).parents('tr') ).data();
        if (confirm('Are you sure you want to delete this user?')) {
        $.ajax({
          url :"<?php echo base_url();?>users/delete_user",
          type:"POST",
          data:{
            username : data [0],
            },
          success: function(s){
            if(s > 0){
              iziToast.success({
                title: 'Delete User',
                message: 'Delete user success',
                position: 'topRight'
              });
              $('#myTable').DataTable().ajax.reload();
              //location.reload();
            }else{
              iziToast.error({
                title: 'Delete User',
                message: 'Delete user failed !',
                position: 'topRight'
              });
            }
          },
         });
       }
    });
    $("#role-user").on('change', function(){
      console.log("list item selected");
      var val = $("#role-user option:selected").text();    
      if(val == 'client'){
        $('#client-div').show();
      }
    });
    $('#simpan-user').on('click',function(){
      var client = '0';
      if($('#role-user').val() == 3){
        client = $('#client-group').val();
      }
      $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>users/new_user",
      data: { 
        username : $('#username').val(),
        password : $('#password').val(),
        firstname : $('#firstname').val(),
        lastname : $('#lastname').val(),
        email : $('#email').val(),
        phone : $('#phone').val(),
        roleuser : $('#role-user').val(),
        clientgroup : client,
        status : $('#status-user').val(),
            },
      cache: false,
      success: function(s){
        iziToast.success({
          title: 'New User',
          message: 'New User Success Created',
          position: 'topRight'
        });
        $('#username').val('');
        $('#password').val('');
        $('#firstname').val('');
        $('#lastname').val('');
        $('#email').val('');
        $('#phone').val('');
        $('#client-div').hide();
        $('#role-user').val('');
        $('#status-user').val('');
        $('#client-group').val('');
        $('#exampleModal').modal('toggle');
        $('#myTable').DataTable().ajax.reload();
      },
      error: function(s){
        iziToast.error({
          title: 'New User',
          message: 'Save New User Failed',
          position: 'topRight'
        });
      }
      });
    });

    $('#update-user').on('click',function(){
      var clientx = '0';
      if($('#role-user-edit').val() == 3){
        clientx = $('#client-group-edit').val();
      }
      $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>users/update_user",
      data: { 
        username : $('#username-edit').val(),
        firstname : $('#firstname-edit').val(),
        lastname : $('#lastname-edit').val(),
        email : $('#email-edit').val(),
        phone : $('#phone-edit').val(),
        roleuser : $('#role-user-edit').val(),
        clientgroup : clientx,
        status : $('#status-user-edit').val(),
            },
      cache: false,
      success: function(s){
        if(s > 0){
          iziToast.success({
            title: 'Update User',
            message: 'Update User Success',
            position: 'topRight'
          });
          $('#exampleModal-edit').modal('toggle');
          $('#myTable').DataTable().ajax.reload();
        }else{
          iziToast.error({
            title: 'Update User',
            message: 'Update User Failed',
            position: 'topRight'
          });
          $('#exampleModal-edit').modal('toggle');
        }
      }
      });
    });

  });
</script>