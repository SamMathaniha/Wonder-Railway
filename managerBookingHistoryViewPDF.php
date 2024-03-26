<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Booking History Report</title>    
</head>
<body>

    <div class="tab-container">
        <h1>Wonder Railway Management</h1><br><br>
        <h1>Booking History Records</h1>
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Departure Time</th>
                    <th>Date</th>
                    <th>Departure Station</th>
                    <th>Arrival Station</th>
                    <th>Redeem Points</th>
                    <th>Promotion</th>
                    <th>Payment</th>
                    <!-- <th>Passager id</th>
                    <th>Train id</th> -->
                    <th>Seat id</th>
                    <th>No of Seat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("db/dbconnection.php");

                if (isset($_POST['search_btn'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM ticket WHERE concat(departure_station,arrival_station,date)  LIKE '%$search%' ";
                } else {
                    $sql = "SELECT * FROM ticket";

                }
                  $query_run = mysqli_query($conn,$sql);

                  $Ticket_id = 1;

                  while($row = mysqli_fetch_array($query_run))
                  {
                    $Tik_id=$row['tik_id'];
                    $Departure_Time=$row['departure_time'];
                    $Date=$row['date'];
                    $Departure_Station=$row['departure_station'];
                    $Arrival_Station=$row['arrival_station'];
                    $Redeem_Points=$row['redeem_points'];
                    $Promotion=$row['promotion'];
                    $Payment=$row['payment'];
                    // $Pas_id=$row['pas_id'];
                    // $Trn_id=$row['trn_id'];
                    $Seat_id=$row['seat_no'];
                    $No_seat=$row['no_seat'];
                ?>   
                <tr>
                    <td><?php echo $Ticket_id ?></td>
                    <td><?php echo $Departure_Time ?></td>
                    <td><?php echo $Date ?></td>
                    <td><?php echo $Departure_Station ?></td>
                    <td><?php echo $Arrival_Station ?></td>
                    <td><?php echo $Redeem_Points ?></td>
                    <td><?php echo $Promotion ?></td>
                    <td><?php echo $Payment ?></td>
                    <!-- <td><?php echo $Pas_id ?></td>
                    <td><?php echo $Trn_id ?></td> -->
                    <td><?php echo $Seat_id ?></td>
                    <td><?php echo $No_seat ?></td>
                </tr>

                <?php $Ticket_id++; } ?>
            </tbody>
        </table>
    </div>

    <script>
        function printReport() {
            window.print();
        }

        window.onload = function() {
            printReport();
        };
    </script>
</body>
</html>