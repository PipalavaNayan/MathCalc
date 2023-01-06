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
    <div class="row mt-5">
      <div class="card" style="padding: 15px;">
        <form method="POST" class="mb-2">
          <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="my-2">Enter data</label>
            <input type="text" class="form-control" name="mean" placeholder="Format (a,b,c,...)">
          </div>
          <button type="submit" name="submit" value="submit" class="btn btn-primary">Find Mean</button>
        </form>

        <?php
        $sum = 0;
        $count = 0;
        if (isset($_POST['submit'])) {

          $data = $_POST['mean'];
          $ans = explode(",", $data);
          $count = count($ans);

          for ($x = 0; $x < $count; $x++) {
            $sum = $sum + (int)$ans[$x];
          }

          $mean = "Mean is : <b>" . round(($sum / $count), 4) . "</b>";

          echo '<label for="exampleInputEmail1" class="my-2">Solution :</label>
          <table class="table table-bordered">
          <tbody>
            <tr>
              <th scope="row">X</th>';

              $i = 0;
              for ($i = 0; $i < $count; $i++) {
                echo "<td>" . $ans[$i] . "</td>";
              }

            echo '</tr>
          </tbody>
          </table>
            <div>x&#772 = <u>&#931xi</u><br />&#160&#160&#160&#160&#160&#160&#160&#160n</div>
            <label class="mt-2">
              <div>x&#772 = ';
              echo $sum;
                echo '&#160;/&#160;';
              echo $count;
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