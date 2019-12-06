<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
 
foreach ($total_upload->result() as $data) {
  $totalupload = $data->total;
}
?>

 <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Send SMS</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">SMS</div>
        <div class="breadcrumb-item"><a href="<?php echo base_url() ?>users">Send SMS</a></div>
      </div>
    </div>
    <div class="section-body">
        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <label>Single SMS</label>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" id="phone" class="form-control" maxlength="16" onkeypress='validate(event)'>
                </div>
                <div class="form-group">
                  <label>Message</label>
                  <textarea id="message" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label>SMS Type</label>
                  <select id="tipesms" class="form-control">
                    <option value="0">Select Type</option>
                    <option value="1">Long Number</option>
                    <option value="2">Masking</option>
                  </select>
                </div>
                <div id="senderid" class="form-group">
                  <label>Sender SMS</label>
                  <select name="sender" id="sender" class="form-control">
                    <option value="0">Select Senderid</option>
                    <?php 
                      foreach ($master_sender->result() as $role) {
                        echo "<option value='$role->sender_id'>$role->sender_id</option>";
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>SMS Send Type</label>
                  <select id="sendtipe" class="form-control">
                    <option value="0">Select Send Type</option>
                    <option value="1">OTP</option>
                    <option value="2">Blast</option>
                  </select>
                </div>
                <div id="respon" class="form-group">
                  <label>Respon SMS</label>
                  <textarea class="form-control" id="responarea" disabled></textarea>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" id="kirim">Send</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <label>Upload SMS</label>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url() ?>sms/uploadFile" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>File</label>
                  <input type="file" class="form-control" id="userfile" name="userfile" disabled>
                </div>
                <div class="form-group">
                  <label>SMS Type</label>
                  <select name="tipesmsupload" id="tipesmsupload" class="form-control" disabled>
                    <option value="">Select Type</option>
                    <option value="1">Long Number</option>
                    <option value="2">Masking</option>
                  </select>
                </div>
                <div id="senderidupload" class="form-group">
                  <label>Sender SMS</label>
                  <select name="senderupload" id="senderupload" class="form-control" disabled>
                    <option value="">Select Senderid</option>
                    <?php 
                      foreach ($master_sender->result() as $role) {
                        echo "<option value='$role->sender_id'>$role->sender_id</option>";
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>SMS Send Type</label>
                  <select name="sendtipeupload" id="sistemsmsupload" class="form-control" disabled>
                    <option value="">Select Send Type</option>
                    <option value="1">OTP</option>
                    <option value="2">Blast</option>
                  </select>
                </div>
                <div class="alert alert-info">
                  <?php echo "Total upload ".$totalupload." data!" ?>
                </div>
                <div class="form-group">
                  <label><a href="">Download</a> template for upload sms</label>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" id="kirimupload" disabled>Send</button>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
    </div>
  </section> 
</div>

<?php 
$this->load->view('dist/_partials/js'); 
//$this->load->view('dist/_partials/footer');
?>
<script>

  function validate(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
    // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }

  $(document).ready( function () {
    
    $('#senderid').hide();
    $('#senderidupload').hide();
    $('#respon').hide();

    $("#tipesmsupload").on('change', function(){
      console.log("list item selected");
      var val = $("#tipesmsupload option:selected").text();    
      if(val == 'Masking'){
        $('#senderidupload').show();
      }else{
        $('#senderidupload').hide();
      }
    });

    $("#tipesms").on('change', function(){
      console.log("list item selected");
      var val = $("#tipesms option:selected").text();    
      if(val == 'Masking'){
        $('#senderid').show();
      }else{
        $('#senderid').hide();
      }
    });

    $('#kirim').on('click',function(){
      $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>sendsms",
      data: { 
        phone : $('#phone').val(),
        message : $('#message').val(),
        tipesms : $("#tipesms option:selected").val(),
        sendtipe : $("#sendtipe option:selected").val(),
        senderid : $("#sender option:selected").val()
      },
      cache: false,
      success: function(s){
        iziToast.success({
          title: 'Send SMS',
          message: 'Send SMS success',
          position: 'topRight'
        });
        $('#phone').val('');
        $('#message').val('');
        $('#tipesms option[value="0"]').prop('selected', true);
        $('#sendtipe option[value="0"]').prop('selected', true);
        $('#sender option[value="0"]').prop('selected', true);
        $('#senderid').hide();
        $('#responarea').text(s);
        $('#respon').show();
      },
      error: function(s){
        iziToast.error({
          title: 'Send SMS',
          message: 'Send SMS Failed',
          position: 'topRight'
        });
      }
      });
    });

  });
</script>