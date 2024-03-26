<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Promotions Records Report</title>    
</head>
<body>

    <div class="tab-container">
        <h1>Wonder Railway Management</h1><br><br>
        <h1>Promotions Records</h1>
        <table>
            <thead>
                <tr>
                    <th>Promotion ID</th>
                    <th>Title</th>
                    <th>Discount</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("db/dbconnection.php");

                if (isset($_POST['search_btn'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM promotion WHERE title LIKE '%$search%' ";
                } else {
                    $sql = "SELECT * FROM promotion";

                }
                  $query_run = mysqli_query($conn,$sql);

                  $P_id = 1;

                  while($row = mysqli_fetch_array($query_run))
                  {
                    $pro_id=$row['pro_id'];
                    $Title=$row['title'];
                    $Discount=$row['discount'];
                    $Description=$row['description'];
                ?>   
                <tr>
                    <td><?php echo $P_id ?></td>
                    <td><?php echo $Title ?></td>
                    <td><?php echo $Discount ?></td>
                    <td><?php echo $Description ?></td>
                </tr>

                <?php $P_id++; } ?>
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