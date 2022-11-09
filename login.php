<!DOCTYPE html>
        <html lang="en">
          <head><title></title>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap-theme.min.css">
<link rel="stylesheet" href="font-awesome.min.css">
<link rel="stylesheet" href="hover-min.css">
  <script src="jquery.js"></script>
  <script src="bootstrap.min.js"></script>
            <style>
.navbar {
  background: lightblue;
}
            </style>
            <title>Online Voting</title>
            </head>
            <body>
              <div class="container">
								<h1>Online Voting </h1>
								<div class="row">
									<div class="col-md-3"><h3>
                    <a href="index.php" style='text-decoration:none'>Back To Home</a>
                  </h3></div>

									<div class="col-md-6">
										<fieldset>
							<legend> Login Panel </legend>
				<form name="f" method="post" action="">
					<div class="form-group">
<label for="">Select UserType</label>
<select  name="ch" class='form-control'>
<option value="0">Choose Login Type</option>
<option value="1"> Voter </option>
<option value="2"> Administrator </option>
</select>
											</div>
											<div class="form-group">
												<label for="">UserName</label>
												<input type="text"  name="t1"class='form-control'>

											</div>
											<div class="form-group">
												<label for="">Password</label>
												<input type="password"  name="t2" class='form-control'>

											</div>
											<div class="form-group">
												<input type="submit" name="submit" value="SUBMIT" class='btn btn-primary btn-block' />

											</div>
</form>
									</div>

									<div class="col-md-3">

									</div>

								</div>
</div></body></html>

<?php

			if(isset($_POST['submit']))
			{
				session_start();

				$u = $_POST['t1'];
				$p = $_POST['t2'];
				$c = $_POST['ch'];

				#include("config.php");
				 $con=mysqli_connect('localhost','root','','voting') or die('failed');

				if($c == 0)
				{
					echo "<script>alert('Error: Plz select Your login type');</script></font>";
				}
				else if($c == 1)
				{
					$q = "select * from reg WHERE id='$u' and pass='$p'";
					$r = mysqli_query($con,$q);
					$c = mysqli_num_rows($r);
					if($c > 0)
					{
						if($row = mysqli_fetch_array($r))
						{
							if($row['status'] == 'allowed')
							{
								$_SESSION['voterSession'] = $u;
								header("Location: vote.php");
							}
							else
							{
								echo "<script>alert('Error: You are not allowed by admin yet');</script></font>";
							}
						}
					}
					else
					{
						echo "<script>alert('Error: Username OR Password not matched');</script></font>";
					}
				}
				else
				{
					$q = "select * from admin WHERE uname='$u' and pass='$p'";
					$r = mysqli_query($con,$q);
					$c = mysqli_num_rows($r);
					if($c > 0)
					{
						$_SESSION['adminSession'] = $u;
						header("Location: admin/adminHome.php");
					}
					else
					{
						echo "<script>alert('Error: Username OR Password not matched');</script></font>";
					}
				}
			}


?>
