<!DOCTYPE html>
<html>
<?php
$server="fdb32.awardspace.net";
$userid ="3992918_pratik";
$Password = "Xcen@123";
$myDB = "3992918_pratik";
$con = mysqli_connect($server,$userid,$Password,$myDB);
if (mysqli_connect_errno()) {
# code...
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Update Attendance</title>
<style>
body {
	background-color: #dddddd;
	}

#img {
	width: 200px;
	height: 120px;
}
#button1 { 
		position: relative;
		margin-top: 10px;
    background-color: #3498DB;   
    width: 200px;     
    padding: 15px;      
    border: none;   
    cursor: pointer;
    color: white;
    font-size: 16px;
        }   

.text{
  background-color: #56AAfd;
  margin-top: 10px;
  width: 140px;     
  padding: 15px;      
  border: none;   
  cursor: pointer;
  font-size: 16px;
  color: white;
}
/* Links inside the dropdown */
.show {display:block;}
}
#button1 { 
    position: relative;
    margin-top: 10px;
    background-color: #3498DB;   
    width: 200px;     
    padding: 15px;      
    border: none;   
    cursor: pointer;
    color: white;
    font-size: 16px;

        }   
  
#button1:hover {   
        opacity: 0.7;   
    } 
.name_list
{
  align-items: center;
  align-self: center;
  width: 400px;
  margin-top: 10px;
}
</style>
<script>
	/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it

</script>
</head>
<body>
<script src="demo.js"></script>
  <script>
    var uid = sessionStorage.getItem("uid");
    if(uid==null)
    {
      location.replace('Login1.html')
      alert("Please login first!")
    }
  </script>
	<center><div><a><img id="img" src="logo.png"></a></div>
	<h1>Update Attendance</h1>
  
   <?php
$q = "show tables";
$result = mysqli_query($con, $q);
$fields = array();
while($row = mysqli_fetch_array($result)) {
    $fields[] = $row[0];
}
?>
<div class="container">
<div class="col-md-4">
  <div style="font-weight: bold;">NAME</div>
   <?php foreach($fields as $field): ?>
        <label>
            <?php echo "$field "; ?>
        </label><br/>
    <?php endforeach; ?>
</div>
<form id="generate-form" method="POST" action="">
<div class="col-md-4">
  <div style="font-weight: bold;">WORK</div>
    <?php foreach($fields as $field): ?>
        <label>
            <input type="text" name="work[]"/>
        </label><br/>
    <?php endforeach; ?>
</div>

<div class="col-md-4">
  <div style="font-weight: bold;">AMOUNT</div>
    <?php foreach($fields as $field): ?>
        <label>
            <input type="text" name="amount[]"/>
        </label><br/>
    <?php endforeach; ?>
</div>
<center><input id="button1" type="submit" name="submit" /></center>
</form>
</div>

<?php
    if(isset($_POST["submit"]))
    {
      $i = 0;
      foreach($fields as $field):
        $data1 = mysqli_real_escape_string($con, $_POST["work"][$i]);
        $data2 = mysqli_real_escape_string($con, $_POST["amount"][$i]);
        $sql = "INSERT INTO $field(dates, work, month, week, amount)values(curdate(), '$data1', MONTH(curdate()), WEEK(curdate()), '$data2')";
        $query_run1 = mysqli_query($con,$sql);
        $i++;
      endforeach;
       if($query_run1)
      {
        echo '<script type="text/javascript"> alert("Attendance Updated Successfully")</script>';
        }
      else
      {
        echo '<script type="text/javascript"> alert("Could not update Attendance")</script>';
      }
    }
   
     ?>
 
</body>
</html>