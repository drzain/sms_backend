<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<input type="text" id="username" value="<?php echo $this->session->userdata('nama'); ?>" hidden>
 <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
            <h1>Home</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-envelope"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total SMS</h4>
                  </div>
                  <div class="card-body" id="totaldata">
                    0
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="far fa-check-square"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Success</h4>
                  </div>
                  <div class="card-body" id="suksessms">
                    0
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-hourglass-half"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pending</h4>
                  </div>
                  <div class="card-body" id="pendingsms">
                    0
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-minus-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Failed</h4>
                  </div>
                  <div class="card-body" id="failedsms">
                    0
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
<script src="http://147.139.138.123:7777/socket.io/socket.io.js"></script>
<script>
var socket = io.connect('147.139.138.123:7777');  
var obj = {
    event : "json",
    action : "sent",
    user : $('#username').val()
  };
var json = JSON.stringify(obj);  
console.log(json);

setInterval(function() {
    socket.emit('alldata', json);
    socket.emit('sent', json);
    socket.emit('pending', json);
    socket.emit('failed', json);
  },1000);  

socket.on('connect', function (socket) {
    console.log('Connected!');
    $("#connect").html('CONNECT');
    $("#connect").addClass('text-green');
  });

  socket.on('alldata', function (msg) {
    console.log(msg);
    var data = JSON.parse(msg);
    var alldata = data[0]['alldata'];
    //console.log(unsent);
    $('#totaldata').html(alldata);
  });

  socket.on('sent', function (msg1) {
    console.log(msg1);
    var data1 = JSON.parse(msg1);
    var sent = data1[0]['sent'];
    //console.log(unsent);
    $('#suksessms').html(sent);
  });

  socket.on('pending', function (msg2) {
    console.log(msg2);
    var data2 = JSON.parse(msg2);
    var pending = data2[0]['pending'];
    //console.log(unsent);
    $('#pendingsms').html(pending);
  });

  socket.on('failed', function (msg3) {
    console.log(msg3);
    var data2 = JSON.parse(msg3);
    var failed = data2[0]['failed'];
    //console.log(unsent);
    $('#failedsms').html(failed);
  });

  socket.on('sent_status', function (msg5) {
    console.log(msg5);
    var data2 = JSON.parse(msg5);
    var sent_status = data2[0]['sent_status'];
    if(sent_status == 'stop'){
      $('#send-wa').show();
      $('#stop-wa').hide();
      $("#connect-api").html('STOP');
      $("#connect-api").removeClass('text-green');
      $("#connect-api").addClass('text-red');
    }else if(sent_status == 'start'){
      $('#send-wa').hide();
      $('#stop-wa').show();
      $("#connect-api").html('RUNNING');
      $("#connect-api").addClass('text-green');
    }
    //console.log(sent_status);
    //$('#pending').html(pending);
  });

  socket.on("disconnect", function(){
    console.log("client disconnected from server");
    $("#connect").html('DISCONNECT');
    $("#connect").removeClass('text-green');
    $("#connect").addClass('text-red');
    $('#unsent').html('0');
    $('#sent').html('0');
    $('#inbox').html('0');
    $('#success').html('0');
    $('#pending').html('0');
  });
</script>