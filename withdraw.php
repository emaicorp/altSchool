// <?php

// include("../dbconnection.php");
// if(isset($_POST['withdraw_fiat'])){
//     $user = $_SESSION['user'];
//     $Amount = $_POST['Amount'];
//     $Account_name = $_POST['Account_name'];
//     $Account_number = $_POST['Account_number'];
//     $Bank_name = $_POST['Bank_name'];
//     $transaction_id= rand(11111111,99999999);
//     $type = "Fiat Withdrawal";
//     $status=0;
//     $from_who = $user;
//     $to_who = "Local Bank";

//     if(!empty($Amount) && !empty($Account_name) && !empty($Account_number) && !empty($Bank_name) ){
//     $order="INSERT INTO withdraw (created_by,Transaction_id, amount, status, Type, from_who, to_who, Account_Name, Account_Number, Bank_name)
//     VALUES ('$user','$transaction_id', '$Amount', '$status', '$type', '$from_who', '$to_who' , '$Account_name' , '$Account_number', '$Bank_name')";
//     $query= $db->query($order);
//     if($query){
//       ?>

<!--// <div class="loader d-flex " id="loader" >-->
<!--//   <span class="fw-bold text-lg mx-2">Processing...</span>-->
<!--// <div class="spinner-border spinner-lg purple-text text-lg " id="spin" role="status">-->
  

<!--// </div>-->
<!--// </div>-->
// <script>
//     let counter = 0;

// let spint = setInterval(count,1000);
// function count(){
//     let spin = document.getElementById("loader")

// console.log(counter)
// if (counter === 5){
//     console.log("reached")
//     spin.style.display="none"
// location.href = "index.php"
// clearInterval(spint );

// }
// counter++


// } 

// console.log(spin)
// // 



//   </script> 

// <?php
//     }
// }else{
//     $error = "<span class='text-danger'>Fill out all Fields</span>";
// }
// }

// ?>


<?php include("../userHeader.php");?>
  <!-- <div class="loader d-none"></div> -->
<?php include("userFooter.php");?>
 

<?php include("../scripts.php");?>
</body>
</html>