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
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="my-2">Enter Frequency</label>
                        <input type="text" class="form-control" name="frequency" placeholder="Format (a,b,c,...)">
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Find Median</button>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $count = 0;
                    $fre_sum = 0;
                    $fixi = 0;
                    $index = 0;
                    $i = 0;
                    $j = 0;
                    $a = 0;  
                    $ass_arry = array();
                    $cpy_arry = array();
                    $fre_arry = array();
                    $data = $_POST['mean'];
                    $fre = $_POST['frequency'];

                    $ans1 = explode(",", $data);
                    $ans2 = explode(",", $fre);
                    $Cumi_Fre = array();
                    $cpy_arry=$ans1;
                    $count1 = count($ans1);
                    $count2 = count($ans2);
                    $Median = 0;
                    
                    if(!($count1 == $count2)) {
                        $mean = "Invalid Inputs (both no. of values have to same)";
                    } else {

                        for ($i = 0; $i < $count2; ++$i) 
                        {
                            //echo $ans1[$i];

                            $ass_arry[$i]=$i;
                            for ($j = $i + 1; $j < $count2; ++$j)
                            {
                 
                                if ($ans1[$i] > $ans1[$j]) 
                                {
                 
                                    $a =  $ans1[$i];
                                    
                                    $ans1[$i] = $ans1[$j];

                                    $ans1[$j] = $a;
                 
                                }
                 
                            }
                 
                        }
                        for($i=0;$i<$count2;$i++)
                        {
                            for($j=0;$j<$count2;$j++)
                            {
                                if($ans1[$i]==$cpy_arry[$j])
                                {
                                    $fre_arry[$i]=$ans2[$j];
                                    // echo "-".$fre_arry[$i];
                                }
                            }
                        }

                        // var_dump($ans1);
                        // var_dump($fre_arry);

                        //It is use for calculate the sum of frequency
                        for ($x = 0; $x < $count1; $x++) {
                            $fre_sum = (int)$fre_sum + (int)$ans2[$x];
                        }

                        for ($y = 0; $y < $count2; $y++) {
                            if($y == 0)
                            {
                                $Cumi_Fre[$y] = (int)$fre_arry[$y];
                            }
                            else{
                                $Cumi_Fre[$y]= $Cumi_Fre[$y-1] + (int)$fre_arry[$y];  
                            }  
                        }
                        $Median = (($fre_sum+1)/2);

                        for ($x = 0; $x < $count1; $x++) {
                           if($Median < $Cumi_Fre[$x]) {
                                $index = $ans1[$x];
                                break;
                           }
                        }

                        
                    }
                } else {
                    $index = "";
                }
                ?>

                <label for="exampleInputEmail1" class="my-2">Output :</label>
                <label><?php echo "Median is : " .$index; ?></label>

            </div>
        </div>
    </div>
</body>

</html>