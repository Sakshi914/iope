
<?php
$k = $_POST['id'];
$k = trim($k);
$con = mysqli_connect("localhost","root","","practice");
$sql1 = "SELECT * FROM med join entry on entry.name = med.name where entry.rid='{$k}' and entry.sender=".$_COOKIE["loggedInUser"];
$res1 = mysqli_query($con,$sql1);
?>
<?php
while($rows = mysqli_fetch_array($res1)){
    if(mysqli_num_rows($res1) > 0)
    {
        foreach($res1 as $rows)
        {
            foreach($res1 as $row){
            ?>
                <div class="out">
                                                    <div>Name :  <?= $row['name']; ?></div>
                                                    <div>ID : <?= $rows['medid']; ?></div>
                                                    <?php if(30 > $row['wtemp'] ) : ?>
                                                        <div class="card_red" function="data()">
                                                    <?php elseif(20 > $row['temp']) : ?>
                                                        <div class="card_orange" function="data()">
                                                    <?php else : ?>
                                                        <div class="card_green" function="data()">
                                                    <?php endif; ?>
                                                
                                                    </div>
                                                    </div>
            <?php
            }
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