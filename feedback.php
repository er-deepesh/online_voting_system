<?php include("header.php") ?>
<div class="row">
  <div class="col-md-3">

  </div>
  <div class="col-md-6">
    <fieldset>
      <legend>Feedback Form</legend>
      <form class="" action="" method="post">

      <div class="form-group">
      <label for="">Name</label>
        <input type="text" name="t1" class='form-control' required pattern='[a-zA-Z\s]+' title='You Cannot enter numbers and special charachter in name'>
      </div>
      <div class="form-group">
      <label for="">Mobile</label>
        <input type="text" name="t2" class='form-control' required  pattern=".{10,10}" maxlength="10" pattern="\d*" title='Enter only numeric data for Phone Number only 10 digits'>
      </div>
      <div class="form-group">
      <label for="">Email</label>
        <input type="email" name="t3" class='form-control' required>
      </div>
      <div class="form-group">
      <label for="">Address</label>
      <textarea name="t" class='form-control' required></textarea>
      </div>
      <div class="form-group">
      <label for="">Query/Message</label>
      <textarea name="tt" class='form-control' required></textarea>
      </div>
      <div class="form-group">
        <input class='btn btn-primary' type="submit" value="SUBMIT" name="s">
        &nbsp;<input class='btn btn-default' type="reset" value="RESET" name="r">

      </div>
      </form>
    </fieldset>
  </div>
  <div class="col-md-3">

  </div>
</div>
    </div>

<?php

	include("footer.php");

	if(isset($_POST['s']))
	{

		include("config.php");

		$a = $_POST['t1'];

		$b = $_POST['t2'];

		$c = $_POST['t3'];

		$d = $_POST['t'];

		$e = $_POST['tt'];

		$q = "insert into feedback (name,mobile,email,address,msg) VALUES ('$a','$b','$c','$d','$e')";

		$r = mysql_query($q);

		if($r > 0)
		{
			echo "<script>alert('Your feedback successfully submited')</script>";
		}
		else
		{
			echo "<script>alert('Error: Feedback could not be submited')</script>";
		}

	}

?>
