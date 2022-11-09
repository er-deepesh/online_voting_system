<?php include("header.php") ?>
<div class="row">
  <div class="col-md-3">
    <img src="images/arrow.jpg" /> <a href="reg.php"> Register here on free of cost </a>
        <br />
        <br />
    <img src="images/arrow.jpg" />
         <a href="login.php"> You may Login From here!! </a>
        <br /><br>
        <table cellpadding="0" cellspacing="0" style="width: 240px; height: 230px;margin-bottom:0px;">
            <tr>
                <td style="background-image: url('images/news1.png'); background-repeat: no-repeat; background-attachment: scroll; width: 240px; height: 30px;"></td>
            </tr>
             <tr>
                <td style="border-color: #C0C0C0; background-image: url('images/news3.png'); width: 240px; height: 180px; background-repeat: no-repeat; background-attachment: scroll; border-right-style: solid; border-left-style: solid; border-right-width: thin; border-bottom-width: thin; border-left-width: thin;">
                    <marquee direction="up">


                        <?php
           #        $con=mysqli_connect('localhost','root','','voting') or die('failed');

            $con=mysqli_connect('localhost','root','','voting') or die('failed');

            $q = "select * from newsTable";

            $r = mysqli_query($con,$q);

            $c = mysqli_num_rows($r);

            if($c>0)
            {
              while($row = mysqli_fetch_array($r))
              {
                echo "<label style='text-align:justify;'> * ".$row['news']."<br><hr><br></label>";
              }
            }
            else
            {
              echo "No Data to Display";
            }

            ?>

        </marquee>
                </td>
            </tr>
            <tr>
                <td style="background-image: url('images/news4.png'); background-repeat: no-repeat; background-attachment: scroll; width: 240px; height: 20px;"></td>
            </tr>
        </table>

  </div>
  <div class="col-md-6">
    <h1>Welcome to Online Voting website!</h1>


    <p>The project "On-Line Voting" aims at making the voting process easy in cooperative societies. Presently voting is performed using ballot paper and the counting is done manually, hence it consumes a lot of time. There can be possibility of invalid votes. All these makes election a tedious task. In our proposed system voting and counting is done with the help of computer. It saves time, avoid error in counting and there will be no invalid votes. It makes the election process easy.</p>
    <p>This project is to develop a general purpose �On-Line Voting� where any one can cast vote but only once, after their approval by admin from the comfort of home through the Internet.An Online Voting is a virtual voting system on the Internet where voter can browse	the candidate in catalog and select candidate of interest. The selected candidate may be get vote from voter. </p>

    <p><em>From Voting Team</em></p>
    <div style="border:#8fc228 solid 1px;padding:4px 6px 2px 6px">This Online Voting
        website is developed to give benefits to everyone.<br>

        <br />

  </div><br></div>
  <div class="col-md-3">
    <fieldset>
    <legend>
         Check Status
        </legend>

        <form action="" method="post">
          <div class="form-group">
            <label for="">Enter Your Voter Id :</label>
        <input type="text" width="200px" name="t1" class='form-control'>
          </div>
          <div class="form-group">
            <input type="submit" value="SUBMIT"  name="s" class='btn btn-primary'></td>

            <input type="reset" value="RESET" class='btn btn-default'>

          </div></form>

          </fieldset>
                <asp:Label ID="msg" runat="server"
                        Font-Size="Large" ForeColor="Red"></asp:Label>

    <?php

    if(isset($_POST['s']))
    {
      $u = $_POST['t1'];

             $con=mysqli_connect('localhost','root','','voting') or die('failed');


      $q = "select * from reg where id='$u' and status='allowed'";

      $r = mysqli_query($con,$q);

      $c = mysqli_num_rows($r);

      if($c > 0)
      {
        echo "<script>alert('You are allowed by admin, now you can login')</script>";
      }
      else
      {
        echo "<script>alert('You are not verfied by admin yet')</script>";
      }
    }

    ?>
    <div class="banner">
        <a href="login.php" style="color:#3366FF;">Login Here !!</a>
    </div>

</div>
</div>


<?php include("footer.php") ?>
