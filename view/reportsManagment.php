<?php 
  $roles = getRoles(); 
  $noOfUsers = getNoOfUsersByRole();
  $bodyTypes = getBodyTypes();
  $noOfBodyTypes = getNoOfBodyTypes();
  $dates = getBookingInitDay();
  $noOfBookings = getNoOfBookings();
?>

<h1>Reports</h1>
<div class = "container-fluid">
  <div class = "row">
    <div class = "col-6">
      <div id = "users_by_role" style="width:600px;height:400px;"></div>
    </div>
    <div class = "col-6">
      <div id = "no_of_body_types" style="width:600px;height:400px;"></div>
    </div>
  </div>
  <div class = "row justify-content-center">
    <div class = "col line-graph-container">
      <div id = "no_of_bookings" class = "line-graph" style="width:600px;height:400px;"></div>
    </div>
  </div>
</div>

<script src="../js/plotly-latest.min.js"></script>
 <script>
    let roles = [
      <?php
        foreach($roles as $role) {
          echo "'$role',";
        };
      ?>
    ];

    let noOfUsers = [
      <?php
        foreach($noOfUsers as $noOfUser) {
          echo "'$noOfUser',";
        };
      ?>
    ];

    let bodyTypes = [
      <?php 
      foreach ($bodyTypes as $bodyType){
        echo "'$bodyType',";
      }
      ?>
    ];

    let noOfBodyTypes = [
      <?php 
        foreach ($noOfBodyTypes as $noOfBodyType){
          echo "'$noOfBodyType',";
        }
        ?>
    ];

    let dates = [
      <?php
      foreach ($dates as $date){
        echo "'$date',";
      }
      ?>
    ];

    let noOfBookings = [
      <?php 
      foreach ($noOfBookings as $noOfBooking){
        echo "'$noOfBooking',";
      }
      ?>
    ];

    var trace1 = {
      type: 'bar',
      x: roles,
      y: noOfUsers,
      marker: {
          color: 'blue',
          line: {
              width: 2.4
          }
      }
    };

    var dataBar = [ trace1 ];

    var layoutBar = { 
      title: 'Users by role',
      font: {size: 18}
    };

    var trace2 = [{
      values: noOfBodyTypes,
      labels: bodyTypes,
      type: 'pie'
    }];


    var layoutPie = { 
      title: 'Cars by body types',
    };

    var trace3 = {
      x: dates,
      y: noOfBookings,
      mode: 'makers'
    };

    var dataLine = [ trace3 ];

    var layoutLine = {
      title:'Number of cars rented by day'
    };

    var config = {responsive: true}

    Plotly.newPlot('users_by_role', dataBar, layoutBar, config );
    Plotly.newPlot('no_of_body_types', trace2, layoutPie, config );
    Plotly.newPlot('no_of_bookings', dataLine, layoutLine, config );
 </script> 

 


