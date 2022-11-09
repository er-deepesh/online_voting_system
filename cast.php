<?php

session_start();

$u = $_SESSION['voterSession'];

$can = $_GET['id'];

$area = $_GET['id1'];

$party = $_GET['id2'];

       $con=mysqli_connect('localhost','root','','voting') or die('failed');


$q = "select * from voting where cid='$can' and area='$area'";

$r = mysqli_query($con,$q);

$c = mysqli_num_rows($r);

if($c > 0)
{
	if($row = mysqli_fetch_array($r))
	{
		$v = $row['vote'];
	}
	$v += 1;

	$qq = "update voting set vote='$v' where cid='$can'";

	$rr = mysqli_query($con,$qq);

	if($rr > 0)
	{
		$qq1 = "update voting set vote='$v' where cid='$can'";

		$rr1 = mysqli_query($con,$qq1);

		if($rr > 0)
		{
			$qq1 = "update reg set vstatus='submited' where id='$u'";
			$rr1 = mysqli_query($con,$qq1);
			session_destroy();
			echo "<script>alert('Your vote has been successfully cast');window.location='index.php';</script>";
		}
	}
}
else
{
	$v = 1;

	$qq = "insert into voting (cid,vote,party,area) values ('$can','$v','$party','$area')";

	$rr = mysqli_query($con,$qq);

	if($rr > 0)
	{
		$qq1 = "update reg set vstatus='submited' where id='$u'";
		$rr1 = mysqli_query($con,$qq1);
		session_destroy();
		echo "<script>alert('Your vote has been successfully cast');window.location='index.php';</script>";
	}
}
?>
