<?php include("header.php");

session_start();
$u = $_SESSION['voterSession'];
if(!isset($u))
{
	header("location: index.php");
}

$con=mysqli_connect('localhost','root','','voting') or die('failed');

$q = "select * from reg WHERE id='$u' and vstatus='submited'";
$r = mysqli_query($con,$q);
$c = mysqli_num_rows($r);
if($c > 0)
{
	session_destroy();
	header("location: error.php");
	echo "<script>alert('Error: You have submited your vote');</script></font>";
}

?>
<div class="container">
	<div class="row">
	<div class="col-md-3">

	</div>
	<div class="col-md-6">
		<form action="" method="post">
			<fieldset >
				<legend> <h2> Voting Panel </h2> </legend>
        			        <label for=""> Select Your Area</label>
					<select name="ch" class='form-control'>
						<option value="select"> Select Area </option>
						<?php
							$con=mysqli_connect('localhost','root','','voting') or die('failed');

							$q = "select distinct area from candidate";

							$r = mysqli_query($con,$q) or die(mysqli_error());

							$c = mysqli_num_rows($r);

							if($c>0)
							{
								while($row = mysqli_fetch_array($r))
								{
									echo "<option>".$row['area']."</option>";
								}
							}
						?>
					</select>
<br>
		<input type="submit" vaue="SUBMIT" name="submit" class='btn btn-primary'>

</form>
<br>
					<?php

			if(isset($_POST['submit']))
			{
				$c = $_POST['ch'];

				$con=mysqli_connect('localhost','root','','voting') or die('failed');

				$q = "select * from candidate where area='$c'";

				$r = mysqli_query($con,$q);

				$c = mysqli_num_rows($r);

				if($c>0)
				{
					echo "<br/><table class='table table-bordered table-responsive'>";
					echo "<tr>";
					echo "<th> Candidate Name </th><th> Party </th><th> Area </th><th> Picture </th><th> Cast Vote </th>";
					echo "</tr>";
					while($row = mysqli_fetch_array($r))
					{
						$me = $row['cid'];
						echo "<tr>";
						echo "<td>".$row['cname']."</td>";
						echo "<td>".$row['party']."</td>";
						echo "<td>".$row['area']."</td>";
						echo "<td> <img src='".$row['cpic']."' width='100px' height='100px'></td>";
						echo "<td> <a href='cast.php?id=".$row['cid']."&id1=".$row['area']."&id2=".$row['party']."'> Cast Vote </a> </td>";
						echo "</tr>";
					}
				}
				else
				{
					echo "No Data to Display";
				}
			}

			?>
		</table>
	</div>
	<div class="col-md-3">

	</div>

	</div>
</div>

    </div>

</form>

<?php include("footer.php") ?>
