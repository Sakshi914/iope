<?php
$con = mysqli_connect("localhost","root","","practice");
$sql = "SELECT distinct sender FROM med";
$res = mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <br>
   <title>Safe Transfer</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <body>
   <link rel="stylesheet" href="sticker (1).css">
</head>
<body>
<div class="hero">
          <div class="group1-group1">
            <img
              src="Rectangle 2.png"
              alt="Rectangle2303"
              class="group1-rectangle2"
            />
            <img
              src="Rectangle 4.png"
              alt="Rectangle4305"
              class="group1-rectangle4"
            />
            <img
              src="Rectangle 3.png"
              alt="Rectangle3304"
              class="group1-rectangle3"
            />
            <span class="group1-text"><span>Temprature to be Maintained</span></span>
            <span class="group1-text2">
              <span>Temprature exceeded</span>
            </span>
            <span class="group1-text4"><span>Warning Temprature</span></span>
            
          </div>
        </div>
    <div class="rectangle">
</head>
</head>
<style>
    select{
        width: 500px;
        height: 50px;
        font-family: "Times New Roman", Times, serif;
        font-size: 20px;
    }
    body{
        background-image:url(skybg.png);
    }
</style>
<body>
<CENTER>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h1>SELECT  THE SENDER ID</h1>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                    <div class="input-group mb-3">
   <select name="" id="recid" onchange="selectrecid()">
   <br>
   <option value="">SELECT SENDER ID</option>
   
      <?php while($rows = mysqli_fetch_array($res)){
         ?>
         <option value="<?php echo $rows['sender']; ?> " ><?php echo $rows['sender'];?>
         </option>
         <?php
      } 
      ?>
   </select>
   </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            </CENTER>
   <table>
    <tbody id="get">

    </tbody>
   </table>
</body>
<script>
    function selectrecid(){
        
        var x = document.getElementById("recid").value;

        $.ajax({
            url:"rec_showdata.php",
            method:"POST",
            data:{
                id:x
            },
            success:function(data){
                $("#get").html(data);
            }
        })
    }
</script>
</div>
</div>
</body>
<style>
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
</style>
</html>
</html>
<?php
?>
