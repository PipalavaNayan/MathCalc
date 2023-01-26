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
            <div class="card" style="padding: 15px; margin-bottom: 70px;">
                <form method="POST" class="mb-2">
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="my-2">Enter data</label>
                        <input type="text" class="form-control" name="mean" placeholder="Format (a-b,b-c,c-d,...)">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="my-2">Enter Frequency</label>
                        <input type="text" class="form-control" name="frequency" placeholder="Format (a,b,c,...)">
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Find Mode</button>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                   
                    $Mode = 0;
                    $l = 0;
                    $fm = 0;
                    $f1 = 0;
                    $f2 = 0;
                    $max = 0;
                    $index = 0; 
                    $in = 0;
                    $h = 0;
                    $a_index = 0;
                    $a = 0;
                    $fre_sum = 0;
                    $fidi_sum = 0;
                    $c = 0;
                    $f = 0;
                    $abc = array();
                    $MI = array();
                    $DI = array();
                    $Cumi_Fre = array();
                    $FIDI = array();

                    $data = $_POST['mean'];
                    $freq = $_POST['frequency'];


                    $class = explode(",", $data);
                    $freq = explode(",", $freq);

                    $count1 = count($class);
                    $count2 = count($freq);

                    if (!($count1 == $count2)) {
                        $mean = "Invalid Inputs (both no. of values have to same)";
                    } else {
                        for($x=0; $x < $count2;$x++){
                            if((int)$freq[$x] > $max)
                            {
                                $max = (int)$freq[$x];
                                $index = $x; 
                            }
                        }

                        $abc = explode("-", $class[$index]);
                        $l = $abc[0];
                        $h = $abc[1] - $abc[0];

                        $last_ele = $count2 - 1;

                        if($index != 0 && $index != $last_ele) {
                            $fm = $max;
                            $f1 = $freq[$index-1];
                            $f2 = $freq[$index+1];
                           
                            $Mode = ($l+(($fm-$f1)/((2*$fm)-$f1-$f2))*$h);

                            echo '<label for="exampleInputEmail1" class="my-2">Solution :</label>
                                  <table class="table table-bordered">
                                  <tbody>
                                  <tr>
                                      <th scope="row">X</th>';
                          
                                  $i = 0;
                                  for ($i = 0; $i < $count1; $i++) {
                                      echo "<td>" . $class[$i] . "</td>";
                                  }
                              
                            echo '</tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                        <th scope="row">F</th>';
                                  
                                for ($i = 0; $i < $count2; $i++) {
                                    echo "<td>" . $freq[$i] . "</td>";
                                }
                              
                            echo '</tr>
                                  </tbody>
                                  </table>
                                  <div>Z = L + ((f<sub>m</sub> - f<sub>1</sub>) / (2 * f<sub>m</sub> - f<sub>1</sub> - f<sub>2</sub>)) * h;
                                  <br><br><label>Z = '.$l.' + ('.$fm.' - '.$f1.') / (2 * '.$fm.' - '.$f1.' - '.$f2.') * '.$h.'</label></div>';
                            echo '<div style="margin-top: 13px;">
                                    <label class="mt-2">';
                            echo "Mode is : " . $Mode;
                            echo '</label>
                                  </div>
                                  </label>';
                        } else {
                            for ($x = 0; $x < $count1; $x++) {
                                $fre_sum = (int)$fre_sum + (int)$freq[$x];
                            }


                            for ($y = 0; $y < $count2; $y++) {

                                if ($y == 0) {
                                    $Cumi_Fre[$y] = (int)$freq[$y];
                                } else {
                                    $Cumi_Fre[$y] = $Cumi_Fre[$y - 1] + (int)$freq[$y];
                                }
                            }


                            if(($count2 % 2) != 0) {
                                $a_index = $count2 / 2;
                                $a_index = ((int)$a_index);
                            } else {
                                $a_index = $count2 / 2;
                            }

                            for ($i = 0; $i < $count2; $i++) {
                                $mi = explode("-", $class[$i]);
                                $MI[$i] = ($mi[0] + $mi[1]) / 2;

                                if($i == $a_index) {
                                    $a = $MI[$i];
                                }
                            }


                            for ($i = 0; $i < $count2; $i++) {
                                $DI[$i] = ($MI[$i] - $a) / $h;
                            }


                            for ($i = 0; $i < $count2; $i++) {
                                $FIDI[$i] = $freq[$i] * $DI[$i];
                            }


                            for ($x = 0; $x < $count1; $x++) {
                                $fidi_sum = (int)$fidi_sum + (int)$FIDI[$x];
                            }


                            for ($x = 0; $x < $count1; $x++) {
                            
                                if (($fre_sum / 2) < $Cumi_Fre[$x]) {
                                    $abc = explode("-", $class[$x]);
                                    $l = $abc[0];
                                    $c = $Cumi_Fre[$x-1];
                                    $f = $FIDI[$x];
                                    $in = $x;
                                    break;
                                }
                            }

                            echo '<label for="exampleInputEmail1" class="my-2">Solution :</label>
                                  <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Class</th>
                                      <th scope="col">Frequency</th>
                                      <th scope="col">mi</th>
                                      <th scope="col">di</th>
                                      <th scope="col">fidi</th>
                                      <th scope="col">Cum_Fre</th>
                                    </tr>
                                  </thead>
                                  <tbody class="table-group-divider">';
                                  $i = 0;
                                  for ($i = 0; $i < $count1; $i++) {
                                    echo "<tr>";
                                    echo "<td>" . $class[$i] . "</td>";
                                    echo "<td>" . $freq[$i] . "</td>";
                                    echo "<td>" . $MI[$i] . "</td>";
                                    echo "<td>" . $DI[$i] . "</td>";
                                    echo "<td>" . $FIDI[$i] . "</td>";
                                    echo "<td>" . $Cumi_Fre[$i] . "</td>";
                                    echo "</tr>";
                                  }
                                  echo '<tr>
                                    <td></td>
                                    <td>N = ';
                                  echo $fre_sum;
                                  echo '</td>

                                  <td></td>
                                  <td></td>
                                  <td>';
                                  echo "&#931;fidi = " . $fidi_sum;
                                  echo '</td></tbody>
                                </table>
                                <div>x&#772 = a + <u>&#931fidi</u> * h<br />&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160N</div>
                                    <label class="mt-2">
                                    <div>x&#772 = '.$a.' + <u>'.$fidi_sum.'</u> * '.$h.'<br />&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160;'.$fre_sum.'</div>';
                                  
                                  echo '<div>x&#772 = '. ($a + (($fidi_sum / $fre_sum) * $h)) .'</div><hr>';
                                  echo '<div>N / 2 = '. ($fre_sum / 2) .'</div><hr>
                                        <div>CLASS = '. $class[$in] .'</div><br>
                                        <div>M = L + ( ( (n / 2) - c) * h) / f
                                        <br><br><label>M = '.$l.' + ( ( ('.$fre_sum.' / 2) - '.$c.') * '.$h.') / '.$f.'</label></div>
                                        <br><div>M = '. $l + ((($fre_sum / 2) - $c) / $f) * $h .'</div><hr>
                                        <div>Z = 3M - 2x&#772;
                                        <br><br><label>Z = '. ((3 * ($l + ((($fre_sum / 2) - $c) / $f) * $h)) - (2 * ($a + (($fidi_sum / $fre_sum) * $h)))) .'</label></div>';
                        }
                        }
                    } else {
                        $Mode = "";
                    }
                    ?>
            </div>
        </div>
    </div>
</body>

</html>