<?php include("header.php") ?>
<div class="row">
  <div class="col-md-3">

  </div>
  <div class="col-md-6">
    <form action="" method="post">

  		<fieldset >

  		<legend><h2> Result Panel </h2></legend>
<div class="form-group">
  <label for="">Choose Your City</label>
  <select name="c" class='form-control'>

  <option value="0"> Select Your City </option>
  <?php

           $con=mysqli_connect('localhost','root','','voting') or die('failed');


    $q = "select distinct area from candidate";

    $r = mysqli_query($con,$q);

    if($r > 0)
    {
      while($row = mysqli_fetch_array($r))
      {
    echo "<option>".$row['area']."</option>";
      }
    }
    else
    {
    echo "<script>alert('Error: Record Could not be found')</script>";
    }
  ?>

  </select>

</div>
  			<input type="submit" value="SUBMIT" name="s" class='btn btn-primary'></td>

  		</fieldset>
  </form>
  <?php

    if(isset($_POST['s']))
    {

      $u = $_POST['c'];

             $con=mysqli_connect('localhost','root','','voting') or die('failed');


      $q = "select * from voting where vote=(select max(vote) from voting where area='$u')";

      $r = mysqli_query($con,$q);

      $c = mysqli_num_rows($r);
      if($c > 0)
      {
        if($row = mysqli_fetch_array($r))
        {
          $area = $u;
          $id = $row['cid'];
          $p = $row['party'];
          $v = $row['vote'];

          $qq = "select * from candidate where cid='$id'";

          $rr = mysqli_query($con,$qq);

          $c = mysqli_num_rows($rr);
          if($c > 0)
          {
            if($row = mysqli_fetch_array($rr))
            {
              $n = $row['cname'];
              $pic = $row['cpic'];
            }
          }
        }
      }
      else
      {
        echo "<script>alert('Error: Record Could not be deleted')</script>";
      }

    }
  ?>
  <?php

    if(isset($_POST['s']))
    {?>
<table class='table table-bordered' style='margin:10px;'>
  <tr>
    <td colspan="3" rowspan='4'><img src="<?php echo $pic; ?>" style='height:200px;width:200px;' class='img img-rounded'></td>
  </tr>
  <tr>
    <td>Candidate Name</td><td><?php echo $n; ?></td>
  </tr>
  <tr>
    <td>Party Name</td><td><?php echo $p; ?></td>
  </tr>
  <tr>
    <td>Number Of Votes</td><td><?php echo $v; ?></td>
  </tr>
</table>

  <?php }?>

    <?php

    if(isset($_POST['s']))
    {
      echo "<h3> Result Declared : </h3>";
      echo $n." won from ".$area;
    }

    ?>

  </div>
  <div class="col-md-3">

  </div>
</div>


		</td>
		<td style="width:140px;">&nbsp;</td>
	</tr>
	<tr>
		<td style="width:140px;">&nbsp;</td>
		<td style="width:700px;">&nbsp; </td>
		<td style="width:140px;">&nbsp;</td>
	</tr>
	</table>

    </div>

<?php include("footer.php") ?>
