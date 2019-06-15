
<?php
//By Ravi Tamang
        session_start();
        include('print.php');
?>



<html>
    <head>
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link href="frontend.css"  rel="stylesheet">
        <title>Accouting</title>
           </head>
    <body>
        <div name="web_container" class="web_container">
            <div name="left_flank" id="left_flank">
                <div name="image_logo" id="logo">
                    <img src="logosmall.png">
                </div>
                <div name="left_table" id="left_table">
                <div name="searchmenu" id="menu">
                    <form action="" method="post">
                   <input type="text" placeholder="Search Menu..." name="menu" id="search_menu" >
                   <button name="s_menu" value="s_menu" id="button_field"">Search</button>
                   <div style="float:left;">
</form>
                   <?php
                   include('server_check.php');
                   if(isset($_POST['s_menu']))
                   {
                       $keyword=$_POST['menu'];
                       $smenu="SELECT * from menu where items like '%$keyword%' ";
                       $smenuq=mysqli_query($cont,$smenu);
                       if(empty($_POST['menu']) || empty($smenu)){?>
                           <h2 style="color:red;"><?php echo " Sorry! your keyword ".$keyword." cannot be found! ".mysqli_error($cont);?></h2>
                           <?php
                       }
                       else{
                           while($get=mysqli_fetch_array($smenuq)){
                               echo "<h3 style='color:green;margion:0px' >Item: ".$get['items']." | Price: ".$get['price']."</h3>";
                           }
                       }
                   }
                   
                   ?>
                   </div>
                   </div>
                   
                <table style="margin-top:50px;" class="menu">
                <caption>Menu</caption>
                
                    <?php
                    include('server_check.php');
                    $inser="SELECT * from menu";
                    $ins=mysqli_query($cont,$inser);

                    while($row=mysqli_fetch_array($ins))
                    {
                        ?>
                        <tr>
                        <td><?php echo $row['items']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        </tr>
                        <?php
                    }




?>
                </table>
            </div>
            </div>
            <div name="right_flank" id="right_flank">
                <div name="search_bar" id="search_bar">
                        <button value="submit" name="select" id="button_field">Search</button>
                        <input type="text"  placeholder="Search for items...." id="search_field">
                </div>
                    <div name="menu_select" id="menu_select">
                    <ul>
                            
                                <li><a href="<?php
                            echo 'test.php?id=1';
                            ?>" value="1">Billing</a></li>
                            
                            
                                <li><a href="<?php
                            echo 'test.php?id=2';
                            ?>" value="2">Expense</a></li>
                            
                            
                                <li><a href="<?php
                            echo 'test.php?id=3';
                            ?>" value="3">Income</a></li>
                            
                            
                                <li><a href="<?php
                            echo 'test.php?id=4';
                            ?>" value="4">Add</a></li>
                        
                            
                                <li><a href="<?php
                            echo 'test.php?id=5';
                            ?>" value="5">Weekly</a></li>
                            
                            
                                <li><a href="<?php
                           echo 'test.php?id=6';
                            ?>" value="6">Create</a></li>
                            
                            
                            <li><a href="<?php
                            echo 'test.php?id=7';
                            ?>" value="7">Today's Sale</a></li>
                            
                        </ul>
                        
                        
                        
                    </div>
                    <div name="insert_data" id="insert_data">
                        <h2><?php 
                        
                        
                        echo $_SESSION['username']="Login Successful";
                        
                        
                         ?></h2>
                        <h2 style="padding-left: 200px; font-variant: small-caps;">Accounting Entries</h2>
                        
                                <form action="test.php" method="POST" autocomplete="off">
                        <table>
                            <tr>
                                <td colspan="4"></td>
                                <td>Table no.<input type="number" id="table_no" name="table_no"></td>
                            </tr>
                            <tr>
                                <th>S.N</th>
                                <th>Particulars</th>
                                <th>Quantity</th>
                                <th>Rate</th>
                                <th>Amount</th>
                            </tr>
                            
                    

                  

                    </div>
            </div>
        </div>
   
<?php
include('server_check.php');
if(isset($_GET['id']))
{
$value=$_GET['id'];


switch($value)
{
    case 1:
    include('billing.php');
    break;

    case 2:
    include('expense.php');
    break;

    case 7:
    
   include('table5.php');
    break;
    default:
    include('billing.php');


}
}
else
include('billing.php');
?>