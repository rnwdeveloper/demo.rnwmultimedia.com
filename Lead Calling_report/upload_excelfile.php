<?php
if(isset($_POST["submit"]))
{

               $servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";

$conn = mysqli_connect($servername, $username, $password,$db) or die(mysqli_error($conn));


          if(!$conn){
          die('Could not Connect My Sql:' .mysqli_error());
		  }

          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {
         echo  $fname = $filesop[0];
         echo  $lname = $filesop[1];

          $sql = "insert into Bulk_lead_data(fname,lname) values ('$fname','$lname')";
          $stmt = mysqli_prepare($conn,$sql) or die(mysqli_error($conn));
          mysqli_stmt_execute($stmt);

         $c = $c + 1;
           }

            if($sql){
               echo "sucess";
             } 
		 else
		 {
            echo "Sorry! Unable to impo.";
          }

}
?>
<!DOCTYPE html>
<html>
<body>
<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-default" name="submit" value="submit">Upload</button>
</form>
</body>
</html>