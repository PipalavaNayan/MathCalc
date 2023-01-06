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
            <input type="text" class="form-control" name="mean" placeholder="Format (a,b,c,...)">
          </div>
          <button type="submit" name="submit" value="submit" class="btn btn-primary">Find Median</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
          $symbol = "";
          $count = 0;
          $sum = 0;
          $Median = 0;
          $Odd_Median = 0;
          $Even_Median = 0;
          $Observation = 0;
          $Observation1 = 0;
          $Observation2 = 0;
          $data = $_POST['mean'];
          $ans = explode(",", $data);
          $count = count($ans);

          sort($ans);
          if (!($count % 2 == 0)) {
            $Observation = ($count + 1) / 2;
            $Odd_Median = (int)$ans[$Observation - 1];
            $Median = "Median is : " . $Odd_Median;

            $symbol = '<div>M = ((n+1) /2)<sup>th</sup> Observation</div>';
          } else {
            $Observation1 = ($count / 2);
            $Observation2 = (($count / 2) + 1);
            $Even_Median = ((int)$ans[$Observation1 - 1] + (int)$ans[$Observation2 - 1]) / 2;
            $Median = "Median is : " . $Even_Median;

            $symbol = '<div>M = <u>(n / 2)<sup>th</sup> Observation&#160;&#160;+&#160;&#160;((n / 2) + 1)<sup>th</sup> Observation</u><br>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;2</div>';
          }

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
          </table>';

          echo $symbol;
          if(!($count % 2 == 0))
            echo "<br><div>M = ".$Observation."<sup>th</sup>&#160; Observation</div>";
          else {
            echo "<br><div>M = <u>".$Observation1."<sup>th</sup> Observation&#160;&#160;+&#160;&#160;".$Observation2."<sup>th</sup> Observation</u><br/>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;2</div>";
            echo "<br><div>M = <u>".(int)$ans[$Observation1 - 1]."&#160;&#160;+&#160;&#160;".(int)$ans[$Observation2 - 1]."</u><br>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;2</div>";
          }

          echo '<label class="mt-2">'.$Median.'</label>';
        } else {
          $Median = "";
        }
        ?>

      </div>
    </div>
  </div>
</body>

</html>