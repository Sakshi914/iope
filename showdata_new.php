
<?php
$k = $_POST['id'];
$k = trim($k);
$con = mysqli_connect("localhost","root","","practice");

$sql1 = "SELECT * FROM med join entry on entry.name = med.name where entry.rid=1 and entry.sender=".$_COOKIE["loggedInUser"];
$sql = "SELECT * FROM med where rid='{$k}'";
$res = mysqli_query($con,$sql);
while($rows = mysqli_fetch_array($res)){
    if(mysqli_num_rows($res) > 0)
    {
        foreach($res as $row)
        {
            ?>
                <div class="out">
                                                    <div>Name :  <?= $row['name']; ?></div>
                                                    <div>ID : <?= $row['medid']; ?></div>
                                                    <?php if(25 > $row['wtemp'] ) : ?>
                                                        <div class="card_orange" function="data()">
                                                    <?php elseif( 30 > $row['temp']) : ?>
                                                        <div class="card_red" function="data()">
                                                    <?php else : ?>
                                                        <div class="card_green" function="data()">
                                                    <?php endif; ?>
                                                
                                                    </div>
                                                    </div>
                                                    </div>
                </div>
          
            <?php
        }
    }else{
        echo "<center><h2>Data Not Found<h2><center>";
    }}
?>

<Style>
    .card_green{
        border: none;
        color: black;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        background-color: #4CAF50;
        margin-right: 10px;
       
        margin-bottom: 10px;
    }
    .card_red{
        border: none;
        color: black;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        background-color: #FF0000;
        margin-right: 10px;
       
        margin-bottom: 10px;
    }
    .card_orange{
        border: none;
        color: black;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        background-color: #FFA500;
        margin-right: 10px;
       
        margin-bottom: 10px;
    }
    .out{
        border: 2px;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        background-color: black;
        margin-right: 10px;
       
        margin-bottom: 10px;
        }
</Style>