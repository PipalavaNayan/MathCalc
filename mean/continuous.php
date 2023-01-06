<!DOCTYPE html>

<html style="height: 100%;">

<head>
  <link rel="stylesheet" href="../style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="height: 100%;">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand text-dark" href="../index.html">MathCalc</a>
      <button class="navbar-toggler ml-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active text-dark" aria-current="page" href="../index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="../about/about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="../contactUs/contactUs.php">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container h-100">
    <div class="row">
      <div class="card mt-5" style="padding: 15px;">
        <form method="POST" class="mb-2">
          <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="my-2">Enter data</label>
            <input type="text" class="form-control" name="mean" placeholder="Format (a-b,b-c,c-d,...)">
          </div>
          <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="my-2">Enter Frequency</label>
            <input type="text" class="form-control" name="frequency" placeholder="Format (a,b,c,...)">
          </div>
          <button type="submit" name="submit" value="submit" class="btn btn-primary">Find Mean</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
          $count = 0;
          $fre_sum = 0;
          $fimi_sum = 0;
          $fixi = 0;
          $temp = 0;
          $mi = array();
          $fimi = array();

          $data = $_POST['mean'];
          $fre = $_POST['frequency'];

          $class = explode(",", $data);
          $freq = explode(",", $fre);

          $count1 = count($class);
          $count2 = count($freq);

          if (!($count1 == $count2)) {
            $mean = "Invalid Inputs (both no. of values have to same)";
          } else {
            for ($x = 0; $x < $count1; $x++) {
              $fre_sum = (int)$fre_sum + (int)$freq[$x];
            }

            for ($x = 0; $x < $count1; $x++) {
              $arr = explode("-", $class[$x]);
              $mi[$x] = ((int)$arr[0] + (int)$arr[1]) / 2;
            }

            for ($x = 0; $x < $count1; $x++) {
              $fimi[$x] = ((int)$freq[$x] * (int)$mi[$x]);
            }

            for ($x = 0; $x < $count1; $x++) {
              $fimi_sum = $fimi_sum + (int)$fimi[$x];
            }

            $mean = "Mean is : <b>" . round($fimi_sum / $fre_sum, 4) . "</b>";
          }

          echo '<label for="exampleInputEmail1" class="my-2">Solution :</label>
          <table class="table">
          <thead>
            <tr>
              <th scope="col">Class</th>
              <th scope="col">Frequency</th>
              <th scope="col">mi</th>
              <th scope="col">fimi</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">';
          $i = 0;
          for ($i = 0; $i < $count1; $i++) {
            echo "<tr>";
            echo "<td>" . $class[$i] . "</td>";
            echo "<td>" . $freq[$i] . "</td>";
            echo "<td>" . $mi[$i] . "</td>";
            echo "<td>" . $fimi[$i] . "</td>";
            echo "</tr>";
          }
          echo '<tr>
            <td></td>
            <td>N = ';
          echo $fre_sum;
          echo '</td>
          <td></td>
          <td>';
          echo "&#931;fimi = " . $fimi_sum;
          echo '</tbody>
        </table>
        <div>x&#772 = <u>&#931fimi</u><br />&#160&#160&#160&#160&#160&#160&#160&#160N</div>
            <label class="mt-2">
              <div>x&#772 = ';
          echo $fimi_sum;
          echo '&#160;/&#160;';
          echo $fre_sum;
          echo '</div>
              <div>
                <label class="mt-2">';
          echo $mean;
          echo '</label>
              </div>
            </label>';
        } else {
          $mean = "";
        }
        ?>

      </div>
    </div>
  </div>
</body>

</html>