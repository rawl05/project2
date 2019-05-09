<?php
if(!isset($_SESSION))
{
    session_start();
} ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/task.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Tasks</title>
  </head>
  <body>
        <!--Navigation bar-->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="task.php">Welcome <?php echo $_SESSION['fname']?></a>
                    <button type="button" name="button" onclick="add()" class="btn btn-primary">Add Task</button>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <?php
                        if(isset($_SESSION['email'])){
                          echo '<li><a href="includes/logout_inc.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
                        }
                        else{
                            header['location:login.php'];
                            echo '<li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </nav>
    <div class="container">
      <h2>Tasks:</h2>
      <table id="table_id" class="display">
      <thead>
          <tr>
              <th>Task</th>
              <th>Assignment Date:</th>
              <th>Completion Date:</th>
              <th>Modify/Complete/Delete</th>
          </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Confirm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id= "modal-body">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
 </body>
  <script>

    $(document).ready( function () {
      var table = $('#table_id').DataTable({
          "searching": false,
          "paging": false,
          "info":false,
          "processing": true,
          "serverSide": true,
          "ajax": {
              url: "includes/get_data.php",
              dataType: 'JSON'
          },
          "columns": [
            {data: 'task_name'},
              {data: 'task_date'},
              {data: 'task_cdate'},
              {data: ''},

          ],
          "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button id='modify-btn' class='btn btn-primary'>Modify!</button><button id='complete-btn' class='btn btn-success'>Complete!</button><button id='delete-btn' class='btn btn-danger'>Delete</button>",
        } ]
      });
      $('#table_id tbody').on( 'click', '#delete-btn', function () {
          var data = table.row( $(this).parents('tr') ).data();
          console.log(data);
          var myHeading = "<form method='post'><input type='text' id='taskid' class='form-control' value="+data['task_id']+" disabled><label>Task:</label><input type='text' id='taskname' class='form-control' value="+data['task_name']+" disabled><br><button type='submit' class='btn btn-danger' onclick='deletetask()' >Delete</button></form>";
          $("#modal-body").html(myHeading);
          $('#exampleModalCenter').modal('show');
      } );
      $('#table_id tbody').on( 'click', '#modify-btn', function () {
          var data = table.row( $(this).parents('tr') ).data();
          console.log(data);
          var myHeading = "<form method='post'><input type='text' id='taskid' class='form-control' value="+data['task_id']+" disabled><label>Task:</label><input type='text' id='taskname' class='form-control' value="+data['task_name']+"><label>Date:</label><input type='text' id='taskdate' class='form-control' value="+data['task_date']+"><button type='submit' onclick='modify()' class='btn btn-primary'>Modify</button></form>";
          $("#modal-body").html(myHeading);
          $('#exampleModalCenter').modal('show');
      } );
      $('#table_id tbody').on( 'click', '#complete-btn', function () {
          var data = table.row( $(this).parents('tr') ).data();
          console.log(data);
          var myHeading = "<form method='post'><input type='text' id='taskid' class='form-control' value="+data['task_id']+" disabled><label>Task:</label><input type='text' id='taskname' class='form-control' value="+data['task_name']+" disabled><label>Date:</label><input type='date' id='taskdate' class='form-control' value='<?php echo date("Y-m-d");?>' disabled><br><button type='submit' onclick='completetask()' class='btn btn-success'>Complete</button></form>";
          $("#modal-body").html(myHeading);
          $('#exampleModalCenter').modal('show');
      } );

    } );

    function add(){
      var myHeading = "<form method='post'><label>Task:</label><input type='text' id='taskname' class='form-control'><label>Date:</label><input type='date' id='taskdate' class='form-control' value='<?php echo date("Y-m-d");?>' disabled><button type='submit' onclick='addtask()' class='btn btn-primary' >Add Task</button></form>";
      $("#modal-body").html(myHeading);
      $('#exampleModalCenter').modal('show');
    }
    function modify(){
      $.ajax({
       url: 'includes/modifytask_inc.php',
       type: 'POST',
       dataType: "json",
       data: {
           taskid: $('#taskid').val(),
           taskname: $('#taskname').val(),
           taskdate: $('#taskdate').val(),
           taskcdate: $('#taskcdate').val(),
       }
   }).done(function(data){
           alert(JSON.stringify(data));
   });

    }

    function deletetask(){
      $.ajax({
       url: 'includes/deletetask_inc.php',
       type: 'POST',
       dataType: "json",
       data: {
           taskid: $('#taskid').val(),
       }
   }).done(function(data){
           alert(JSON.stringify(data));
   });

    }

    function completetask(){
      $.ajax({
       url: 'includes/completetask_inc.php',
       type: 'POST',
       dataType: "json",
       data: {
           taskid: $('#taskid').val(),
       }
   }).done(function(data){
           alert(JSON.stringify(data));
   });

    }

    function addtask(){
      $.ajax({
       url: 'includes/addtask_inc.php',
       type: 'POST',
       dataType: "json",
       data: {
           taskname: $('#taskname').val(),
       }
   }).done(function(data){
           alert(JSON.stringify(data));
   });

    }


  </script>
</html>
