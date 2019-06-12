<?php
                            if(isset($_POST['submit']))
                            {
                            include('server_check.php');
                            $table_no=$_POST['table_no'];
                            $prt=$_POST['particular'];
                            $quan=$_POST['quantity'];
                            $rate=$_POST['rate'];
                            $amount=$quan*$rate;
                            $create_table="CREATE table account(
                                sn serial,
                                table_no int,
                                particulars varchar(100),
                                quantity int,
                                rate int,
                                amount int
                            )";
                            $create_table1=mysqli_query($cont,$create_table);
                    
                            
                            
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
                     
                    
                            ?>
                            
                            <?php
                             include('server_check.php');
                             if(isset($_POST['submit'])){
                            
                             $sel="SELECT * from account order by sn asc";
                             $selq=mysqli_query($cont,$sel);
                            
                             
        

                             if(!$selq)
                             {
                         echo "Error";
                            }
                             else{
                            
                            
                             while($row=mysqli_fetch_array($selq))
                            {
                                
                                 ?>
                                
                            <tr>
                            <td><?php echo $row['sn'];?></td>
                            
                            <td><?php echo $row['particulars'];?></td>
                            <td><?php echo $row['quantity'];?></td>
                            <td><?php echo $row['rate'];?></td>
                            <td><?php echo $row['amount'];?></td>
                            



    
<?php
 }
    
 }
 }
 else 
 //echo "Something is wrong";

                            ?>
                              
                            <tr>
                                <td></td>
                                <td style="width: 300px;"><textarea name="particular" placeholder="dish name..items"></textarea></td>
                                <td><input   type="number" name="quantity" id="quantity" placeholder="No."></td>
                                <td><input   type="number" name="rate" id="rate" placeholder="price"></td>
                                <td><input  type="number" name="amount" id="amount" readonly></td>
                            </tr>
                            
                            <tr class="bott-border">
                                <td colspan="3"></td>
                                <td>Total</td>
                                <td>
                                    <p>
                                                          <?php
                                                          if(isset($_POST['submit'])){
                                                            $a="SELECT SUM(amount) from account";
                            $res=mysqli_query($cont,$a);
                              echo mysqli_fetch_array($res)["SUM(amount)"].mysqli_error($cont);
                                                          }
                              ?>
                                    </p>
                                </td>
</tr>

                       
            
         





</table>
<input type="submit" name="submit" value="add" style="float:right;"> 
</form>
<form action="test.php" method="post" >
<div style="float:right;">
<input type="submit" name="print" value="print" >
</div>
</form>
</body>
</html>
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
               $table1=$row1['sn'];
               $ser=$row1['table_no'];
               $par=$row1['particulars'];
               $quantity=$row1['quantity'];
               $r=$row1['rate'];
               $am=$row1['amount'];

               $insert_d="INSERT into table5(table_no,sn,particulars,quantity,rate,amount) values('$table1','$ser','$par','$quantity','$r','$am')";
               $insert_again=mysqli_query($cont,$insert_d);
               $moved="INSERT into moved values('$table1','$ser','$par','$quantity','$r','$am')";
        $moved_again=mysqli_query($cont,$moved);
               if(!$moved_again)
               {
                   //echo "Error";
               }
               else
               {
                   
               }
           }
            
            }
            ?>
<?php
        
            $drop_table="DROP table account";
            $drop_table1=mysqli_query($cont,$drop_table);
           
        

        
    }
            

        

    



?>
<!--  -->