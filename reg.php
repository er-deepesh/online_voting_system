<?php include("header.php") ?>
<div class="row">
  <div class="col-md-3">

  </div>
  <div class="col-md-6">
    <form action="" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>Voter Registration</legend>
        <div class="form-group">
          <label for="">Voter Id</label>
    <input type="number" name="t1" class='form-control' required>
        </div>
        <div class="form-group">
          <label for="">Password</label>
    <input type="password" name="t2" class='form-control' required >
        </div>
        <div class="form-group">
          <label for="">Voter Name</label>
        <input type="text" name="t3" class='form-control' required pattern='[a-zA-Z\s]+' title='You Cannot enter numbers and special charachter in name'>
        </div>
        <div class="form-group">
          <label for="">Gender</label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male&nbsp;&nbsp;<input type="radio" name="r" value="male">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female&nbsp;&nbsp;<input type="radio" name="r" value="female">
</div>
<div class="form-group">
  <label for="">Email</label>
<input type="email" name="t4" class='form-control' required >
</div>
<div class="form-group">
  <label for="">Mobile</label>
<input type="text" name="t5" class='form-control' required pattern=".{10,10}" maxlength="10" pattern="\d*" title='Enter only numeric data for Phone Number only 10 digits'>
</div>
<div class="form-group">
  <label for="">Address</label><textarea name="t" class='form-control' required></textarea>
</div>
<div class="form-group">
  <label for="">State</label>
<input type="text" name="t6" class='form-control' required pattern='[a-zA-Z\s]+' title='You Cannot enter numbers and special charachter in State Name'>
</div>
<div class="form-group">
  <label for="">Country</label>
<input type="text" name="t7" class='form-control' required pattern='[a-zA-Z\s]+' title='You Cannot enter numbers and special charachter in country name'>
</div>
<div class="form-group">
  <label for="">Scanned Voter id</label>
<input type="file" name="t9" class='form-control' required>
</div>

<div class="form-group">
  <input type="submit" name="s" value="SUBMIT FORM" class='btn btn-primary'>

</div>
      </fieldset>
</form>
  </div>
  <div class="col-md-3">

  </div>


</div>



<?php

	include("footer.php");

	if(isset($_POST['s']))
	{

		$con=mysqli_connect('localhost','root','','voting') or die('failed');


		$a = $_POST['t1'];

		$b = $_POST['t2'];

		$c = $_POST['t3'];

		$d = $_POST['r'];

		$e = $_POST['t4'];

		$f = $_POST['t5'];

		$g = $_POST['t'];

		$h = $_POST['t6'];

		$i = $_POST['t7'];

		$s1 = $_FILES['t9']['name'];
		$s2 = $_FILES['t9']['tmp_name'];

		move_uploaded_file($s2,"admin/upload/".$s1);

		$pic = "upload/".$s1;

		$str = "Not Set";

		$q = "insert into reg (id,pass,name,gender,email,mobile,address,state,country,pic,status,vstatus) VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$pic','$str','$str')";

		$r = mysqli_query($con,$q) or die(mysqli_error());

		if($r > 0)
		{
			echo "<script>alert('Your registration successfully submited')</script>";
		}
		else
		{
			echo "<script>alert('Error: Registration could not be submited')</script>";
		}

	}
?>
