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
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Find Median</button>
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
                    $h = 0;
                    $abc = array();

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
                       // echo "index is ".$index;
                        $abc = explode("-", $class[$index]);

                        $l = $abc[0];
                        $h = $abc[1]-$abc[0];
                        $fm = $max;
                        $f1 = $freq[$index-1];
                        $f2 = $freq[$index+1];
                       
                        $Mode = ($l+(($fm-$f1)/((2*$fm)-$f1-$f2))*$h);
                        // echo "l is ".$l;
                        // echo "fm is ".$fm;
                        // echo "f1 is".$f1;
                        // echo "f2 is ".$f2;
                        // echo "h is ".$h;

                        
                } }
                ?>

                <label for="exampleInputEmail1" class="my-2">Output :</label>
                <label><?php echo "Mode is : ". $Mode; ?></label>

            </div>
        </div>
    </div>
</body>

</html>