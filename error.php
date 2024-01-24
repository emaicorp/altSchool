<?php
session_start();
include("../dbconnection.php");
$user= @$_SESSION['user'];
$select = "SELECT * FROM users WHERE username = '$user' ";
$result = $db->query($select);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $fiat = $row['fiat'];
    $crypto = $row['crypto'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zxchange | Dashboard</title>
    <link rel="stylesheet" href="user.css">
    <?php include("../styles.php");?>
    <style>

    </style>
    <!-- <link rel="stylesheet" href="../style.css"> -->
</head>
<body class="body" >
<?php include("../userHeader.php");?>
<div id="empty"></div>
<div class="container text-center sign-div">
 <?php include("userinfo.php")?>
    <div class="row gap-3 mt-5 wallet-info-div d-flex">
        <div class="col-md col-sm-4 wallet-info purple purple-shadow text-center">
            <h3 class="mt-3"><i class="fa-solid fa-wallet fa-bounce"></i></h3>
            <h4>FIAT BALANCE</h4>
            <h4>NGN : <?php  if($fiat !== ""){
            echo $fiat;
            }else{
                echo "0.00";
            }
            ?></h4>
    </div>
    <!--  -->
    <!--  -->
        <div class="col-md col-sm-4 wallet-info purple purple-shadow" >

<h3 class="mt-3"><i class="fa-solid fa-coins fa-bounce"></i></h3>
<h4>CRYPTO BALANCE</h4>
            <h4>USD : <?php 
            if($crypto !== ""){
            echo $crypto;
            }else{
                echo "0.00";
            }
            ?></h4>

        </div>
            <!--  -->
    <!--  -->
        <div class="col-md col-sm-4 wallet-info purple purple-shadow">
<h3 class="mt-3"><i class="fa-solid fa-file-invoice-dollar fa-bounce"></i></h3>
  <a href="fund.php" class=" " id="stats-link"><h4 id="stats-link-txt">FUND WALLET</h4></a>
            
        </div>
        <!--  -->
        <!--  -->
        <div class="col-md col-sm-4 wallet-info purple purple-shadow">

        <h3 class="mt-3"><i class="fa-solid fa-money-bill-transfer fa-bounce"></i></h3>
        <a href="withdraw.php" class="  text-center    " id="stats-link"><h4 id="stats-link-txt">WITHDRAW</h4></a>

        </div>


    </div>
</div>

<div class="container mt-5" style="width:60%;hieght:20%;text-align:center">
<h2 class="page-header">Analystic Report</h2>
<canvas  id="chartjs_bar"></canvas> 
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>


</div>
<div class="container mt-5">
    <h2 class="text-center">Transactions</h2>
<table class="w-100 mb-5   p-4 mt-5 table-border purple-border"style=""cellspacing="2">
                <thead class="purple bg-none p-4 " >
                    <th>#</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Transaction Id</th>
                    <th>From</th>
                    <th>To</th>

                </thead>
                <tbody>
                 <?php   
                    echo $user;


$sql = "SELECT transaction.*, withdraw.*
        FROM transaction
        INNER JOIN withdraw ON transaction.created_by = withdraw.created_by
        WHERE transaction.created_by =  $user";
        
// $stmt = $db->prepare($sql);
// $stmt->bind_param("i", $user);
// $stmt->execute();
// $result = $stmt->get_result();
if ($result->num_rows > 0) {
    // Output data of each row
                    $id = 0;

    while ($row = $result->fetch_assoc()) {
                            $id ++;


              ?>
        
            
     
                <tr class="purple-border">
                <td><?= $id;?></td>
                <td><?= $row['Type'];?></td>
                <td><?= $row['date'];?></td>
                <td><?= $row['Transaction_id'];?></td>
                <!--<td><?= $row['created_by'];?></td>-->
                <!--<td><?= $row['to_who'];?></td>-->
                </tr>
                <style>
table{
    padding:10px;
}
                    </style>
                <?php
        }
        }else{
                ?>
             
                    <td colspan="7">
                    <h3 class="text-center ">No Transactions Found</h3>
                    </td>
            
                <?php
               }
            
               ?>
          </tbody>
            </table>
</div>

<?php include("userFooter.php");?>
 

<?php include("../scripts.php");?>
</body>
</html>