<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Schedule Management Report</title>    
</head>
<body>

    <div class="tab-container">
        <h1>Wonder Railway Management</h1><br><br>
        <h1>Schedule Management</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Departure Station</th>
                    <th>Arrival Station</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Date</th>
                    <th>Train Status</th>
                    <th>Class id</th>
                    <th>Train id</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("db/dbconnection.php");

                if (isset($_POST['search_btn'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM schedule WHERE concat(departure_station,arrival_station,train_status,departure_time,arrival_time,date) LIKE '%$search%' ";
                } else {
                    $sql = "SELECT * FROM schedule";

                }
                  $query_run = mysqli_query($conn,$sql);

                  $SCHE_id = 1;

                  while($row = mysqli_fetch_array($query_run))
                  {
                    $sche_id = $row['sche_id'];
                    $Departure_Station = $row['departure_station'];
                    $Arrival_Station = $row['arrival_station'];
                    $Departure_Time = $row['departure_time'];
                    $Arrival_Time = $row['arrival_time'];
                    $Date = $row['date'];
                    $Train_Status = $row['train_status'];
                    $Cls_id = $row['class'];
                    $Cost = $row['cost'];
                    $Train_id = $row['trn_id'];
                ?>   
                <tr>
                    <td><?php echo $SCHE_id ?></td>
                    <td><?php echo $Departure_Station ?></td>
                    <td><?php echo $Arrival_Station ?></td>
                    <td><?php echo $Departure_Time?></td>
                    <td><?php echo $Arrival_Time ?></td>
                    <td><?php echo $Date?></td>
                    <td><?php echo $Train_Status ?></td>
                    <td><?php echo $Cls_id ?></td>
                    <td><?php echo $Train_id ?></td>
                    <td><?php echo $Cost ?></td>
                </tr>

                <?php $SCHE_id++; } ?>
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