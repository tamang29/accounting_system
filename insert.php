<?php

include('server_check.php');
$table_no=$_POST['table_no'];
$prt=$_POST['particular'];
$quan=$_POST['quantity'];
$rate=$_POST['rate'];
$amount=$quan*$rate;


$in="INSERT into account(sn,table_no,particulars,quantity,rate,amount) values('','$table_no','$prt','$quan','$rate','$amount')";


$ins=mysqli_query($cont,$in);

if(!$ins)
{
    echo "Error".mysqli_error($cont);

}
else
{
    header("location:test.php");
}
?>