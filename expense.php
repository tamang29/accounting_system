<?php
include('server_check.php');



$sel="SELECT * from expenset order by sn asc";
$selq=mysqli_query($cont,$sel);
$a="SELECT SUM(amount) from expenset";
$res=mysqli_query($cont,$a);
$rcol=mysqli_fetch_array($res);


if(!$selq)
{
echo "Error";
}
else{


while($row=mysqli_fetch_array($selq))
{

?>
<tr>
    <td><?php echo $row['sn']; ?></td>
    <td><?php echo $row['particulars']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td><?php echo $row['rate']; ?></td>
    <td><?php echo $row['amount']; ?></td>
</tr>
<?php
}
?>
<tr>
<td colspan='4'></td>
<td>Total <?php echo $rcol['SUM(amount)'];?></td>
</tr>
<?php
}






?>
