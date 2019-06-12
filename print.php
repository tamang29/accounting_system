<?php
include('server_check.php');
                    class Print_table
                    {
                        function print_table5()
                        {
                    
                        if(isset($_GET['id']))
                            {
                            
                        $sel="SELECT * from table5 order by sn asc";
                        $selq=mysqli_query($cont,$sel);
                        $a="SELECT SUM(amount) from account";
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

}
}
else 
{
//echo "Something is wrong";
}
                        }



                        function billing()
                        {
                            
                            if(isset($_POST['submit']))
                            {
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
                        //echo "Insertion successful";
                        //header("location:test.php");
                        }
                    }
                    else{
                        //echo "error";
                    }
                     
                    
                            
                            
                            
                            
                            if(isset($_POST['submit'])){
                            
                            $sel="SELECT * from account order by sn asc";
                            $selq=mysqli_query($cont,$sel);
                            $a="SELECT SUM(amount) from account";
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
    
}
}
else 
//echo "Something is wrong";
?>

                            
                            <tr>
                                <td colspan="3"></td>
                                <td>Total</td>
                                <td>
                                    <?php 
                                    if(isset($_POST['submit']))
                                    echo $rcol['SUM(amount)'];
                                    ?>
                                </td>
</tr>
                            <tr>
                                <td></td>
                                <td style="width: 300px;"><textarea name="particular"></textarea></td>
                                <td><input   type="number" name="quantity" id="quantity"></td>
                                <td><input   type="number" name="rate" id="rate"></td>
                                <td><input  type="number" name="amount" id="amount" readonly></td>
                            </tr>
                            
                            <tr>
                                <td colspan="3"></td>
                                <td>Total</td>
                                <td>
                                    <input   type="number" name="total" id="total" readonly>
                                </td>
</tr>
                       
            
         





</table>
<input type="submit" name="submit" value="add"> 
<br>
<input type="submit" name="print" value="print">
<?php
include('server_check.php');
    if(isset($_POST['print']))
    {
        $select="SELECT * from account order by sn asc";
        $sel_con=mysqli_query($cont,$select);
        
        if(!$sel_con)
        {
            echo "Error";
        }
        else
        {
           while($row1=mysqli_fetch_array($sel_con))
           {
               $table1=$row1['table_no'];
               $ser=$row1['sn'];
               $par=$row1['particulars'];
               $quantity=$row1['quantity'];
               $r=$row1['rate'];
               $am=$row1['amount'];

               $insert_d="INSERT into table5(table_no,sn,particulars,quantity,rate,amount) values('$table1','$ser','$par','$quantity','$r','$am')";
               $insert_again=mysqli_query($cont,$insert_d);
               if(!$insert_again)
               {
                   //echo "Error";
               }
               else
               {
                   
               }
           }
            
            }
            

        }

    





                        }
                    }

                        

                ?>