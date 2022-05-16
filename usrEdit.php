<?php
error_reporting(0);
include("connect.php");
include("menu.php");
session_start();  
$id=$_GET['id'];
$n=$_SESSION['fn'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Edit</title>
    </head>
<body>
<center>
<h1>Admin</h1><br>
    <?php  
    echo "Welcome " .$n."!<br>";
    ?><br>
     <div>
    <a href="usrList.php"  style="color: #000;"><b>Registered Users</b></a>
    <a href="catalog.php"  style="color: #000;"><b>Catalogue</b></a>
   <a href=""  style="color: #000;"><b>Status</b></a>
   </div>
   <br>
   <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">  
             <input type="hidden" name="id" value="<?php echo $id; ?>" /><br />
             
               <?php
    $query1="select uid, un, psd, fn, gen, dte, age, phno, mid from regtable where id=$id";
    $query2= mysqli_query($connection, $query1);
    
    $row = mysqli_fetch_assoc($query2);
    
    ?>
    <table>
    <tr>
    <td> <input type="text" disabled name="usrid" value="<?php echo $row['uid']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text"  name="un" value="<?php echo $row['un']; ?>"/></td>
    </tr>
    <tr>
    <td> <input type="text"  name="psd" value="<?php echo $row['psd']; ?>"/></td>
    </tr>
    <tr>
    <td> <input type="text" name="fn" value="<?php echo $row['fn']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text" name="gen" value="<?php echo $row['gen']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text" name="dob" value="<?php echo $row['dte']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text" name="age" value="<?php echo $row['age']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text" name="phno" value="<?php echo $row['phno']; ?>" /></td>
    </tr>
    <tr>
    <td> <input type="text" name="mid" value="<?php echo $row['mid']; ?>" /></td>
    </tr>
    <tr>
   
    </tr>
    </table>
    <input type="submit"  value="Update" name="update"/>
    </form>
    </center>
   
</body>
</html>

<?php
if(isset($_POST['update']))
{
    $id=$_POST['id'];
        $usrid=$_POST['uid'];
        $un=$_POST['un'];
        $psd=$_POST['psd'];
        $fn=$_POST['fn'];
        $gen=$_POST['gen'];
        $dob=$_POST['dob'];
        $age=$_POST['age'];
        $phno=$_POST['phno'];
        $mid=$_POST['mid'];
     
     
         $query3="update regtable set un='$un', psd='$psd', fn='$fn', gen='$gen', dte='$dob', age='$age',phno='$phno',mid='$mid' where id=$id";
       
       
       
   
   
    if(!mysqli_query($connection, $query3)) {
        echo "<script type='text/javascript'>alert('Update Failed');</script>";
    }else{
            echo "<script type='text/javascript'>alert('Updated Successfully');</script>";
            header("location:usrList.php");
        }      
    }
?>

