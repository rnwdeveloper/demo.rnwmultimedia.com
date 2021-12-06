<?php

    include('config.php');

    if(isset($_REQUEST['grid'])){

        $grid = $_REQUEST['grid'];

        $sq = "SELECT * FROM gim_students WHERE grid=$grid";
        $mq = "SELECT * FROM gim_marks WHERE grid=$grid";

        $res = mysqli_query($conn, $sq);
        $res2 = mysqli_query($conn, $mq);

        $row = mysqli_fetch_array($res);
        $row2 = mysqli_fetch_array($res2);

    }

?>

<table class="table table-hover">
  <tbody>
    <tr>
      <th scope="col">GRID</th>
      <th scope="row"><?php echo $row['grid'] ?></th>
    </tr>
    <tr>
      <th scope="col">Name</th>
      <td><?php echo $row['fname'] . " " . $row['lname'] ?></td>
      </tr>
    <tr>
      <th scope="col">Batch Time</th>
      <td><?php echo $row['batch_time'] ?></td>
      </tr>
    <tr>
      <th scope="col">Branch</th>
      <td><?php echo $row['branch'] ?></td>
      </tr>
    <tr>
      <th scope="col">Photoshop Web</th>
      <td><?php echo @$row2['psd'] ?></td>
      </tr>
    <tr>
      <th scope="col">Photoshop Graphics</th>
      <td><?php echo @$row2['psd_g'] ?></td>
      </tr>
    <tr>
      <th scope="col">Animate</th>
      <td><?php echo @$row2['animate'] ?></td>
      </tr>
    <tr>
      <th scope="col">C Language</th>
      <td><?php echo @$row2['c_lang'] ?></td>
      </tr>
    <tr>
      <th scope="col">Drawing</th>
      <td><?php echo @$row2['drawing'] ?></td>
      </tr>
    <tr>
      <th scope="col">Logic</th>
      <td><?php echo @$row2['logic'] ?></td>
    </tr>
  </tbody>
</table>
