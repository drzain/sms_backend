<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

 <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Priviledge Role</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">Setup</div>
        <div class="breadcrumb-item active">Role Management</div>
        <div class="breadcrumb-item"><a href="<?php echo base_url() ?>priviledge/detail/<?php echo $this->uri->segment(3); ?>">Priviledge Role</a></div>
      </div>
    </div>
    <div class="section-body">
       <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <!-- <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>New Role</button> -->
                    <h4>Set Priviledge</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <input type="hidden" id="id" value="<?php echo $this->uri->segment(3);?>">
                      <table class="table table-striped" id="myTable" width="100%">
                        <thead>                                 
                          <tr>
                            <th>Menu Parent Caption </th>
                            <th>Menu Child Caption</th>
                            <th>Set Priviledge</th>
                          </tr>
                        </thead>
                        <tbody>  
                        <?php
                        $id = 0;
                        foreach ($getpriviledge->result() as $res) {
                        if ($res->parentid != $id){
                        if ($id != 0){  
                        echo '<td colspan="3" class="bg-light-blue color-palette" ></td>';
                        }
                        echo'
                        <tr>
                        <td><b>'.$res->parent.'</b></td>
                        <td>'.$res->child.'</td>
                        <td>'.$res->cek.'</td>
                        </tr>
                        ';
                        }
                        else{
                        echo'
                        <tr>
                        <td></td>
                        <td>'.$res->child.'</td>
                        <td>'.$res->cek.'</td>
                        </tr>
                        ';  
                        }
                        $id = $res->parentid;
                        }
                        ?>                               
                        </tbody>
                      </table>
                      <div align="right">
                        <button  class ="btn btn-primary " id="savepriviledge">Save Priviledge</button>
                        <a  class="btn btn-warning " href="<?php echo base_url(); ?>priviledge">Cancel</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
  </section> 
</div>

<?php 
$this->load->view('dist/_partials/js'); 
//$this->load->view('dist/_partials/footer');
?>
<script>
  $('#savepriviledge').click(function() {
     var val = [];
     var x = 0;
          $('#menu:checked').each(function(i){
            val[i] = $(this).val();
            x++;
          });
    $.ajax({
        url :"<?php echo site_url();?>priviledge/savepriviledge",
        type:"POST",
        data:{
              menu :val,
              id:$('#id').val()          
            },
        success: function(html){
               iziToast.success({
                title: 'Set Priviledge',
                message: 'Set Priviledge Success',
                position: 'topRight'
                });
                window.location.href = "<?php echo base_url(); ?>priviledge";               
        },
        error:function error(){
              iziToast.error({
              title: 'Set Priviledge',
              message: 'Set Priviledge Failed',
              position: 'topRight'
              });
        } 
    });
  });
</script>