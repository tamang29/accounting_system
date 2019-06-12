<html>
    <head>
   <link rel="stylesheet" type="text/css" href="frontend.css">
        <title>Accouting</title>
           </head>
    <body>
        <div name="web_container" class="web_container">
            <div name="left_flank" id="left_flank">
                <div name="image_logo" id="logo">
                    <img src="paint.png">
                </div>
                <div name="left_table" id="left_table">
                   
                <table border="1" cellspacing="0px" cellpadding="10px" width="300">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>Amount</th>
                    </tr>
                </table>
            </div>
            </div>
            <div name="right_flank" id="right_flank">
                <div name="search_bar">
                        <button value="submit" name="select"id="button_field">Search</button>
                        <input type="text"  placeholder="Search for items...." id="search_field">
                </div>
                    <div name="menu_select" id="menu_select">
                        <ul>
                            <a href="1.html">
                                <li>Billing</li>
                            </a>
                            <a href="2.html">
                                <li>Expense</li>
                            </a>
                            <a href="3.html">
                                <li>Income</li>
                            </a>
                            <a href="test.php">
                                <li>Add</li>
                            </a>
                            <a href="5.html">
                                <li>Weekly</li>
                            </a>
                            <a href="6.html">
                                <li>Create</li>
                            </a>
                            <a href="sale.php">
                            <li>Today's Sale</li>
                            </a>
                        </ul>
                        
                        
                    </div>
                    <div name="insert_data" id="insert_data">
                        <h2 style="padding-left: 200px; font-variant: small-caps;">Today's Sale</h2>
                        
                                <form action="test.php" method="POST" autocomplete="off">
                        <table border="1" cellspacing="0px" cellpadding="10px">
                            <tr>
                                <td colspan="4"></td>
                                <td>Table no.</td>
                            </tr>
<tr>
                                <th>S.N</th>
                                <th>Particulars</th>
                                <th>Quantity</th>
                                <th>Rate</th>
                                <th>Amount</th>
                            </tr>
                           
<?php

include('server_check.php');
$selq="SELECT * from table5 order by sn asc";
$to="SELECT SUM(amount) from table5";
$tot=mysqli_query($cont,$to);
$selq_con=mysqli_query($cont,$selq);
if(!$selq_con)
{
    echo "Wrong";
}
else
{
    while($row=mysqli_fetch_array($selq_con))
    {
    ?>
        <tr>
                                    
                                    <td><?php echo $row['sn']; ?></td>
                                    <td><?php echo $row['particulars']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['rate']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                            </tr>
                            <p>hello</p>
                           
                            
                            
                            <?php
    }
    echo "<tr><td colspan='4'></td><td>Total sum($row['amount'])</td>
    </tr>";
}
?>
</table>
</body>
</html>