<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 433px;
    }
    </style>

</head>

<body>
    <?php   include('partials/_dbconnect.php'); ?>
    <?php   include('partials/_header.php'); ?>
 
    <!-- slider starts here -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slide-1.jpeg" hiegth="100px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/slide-2.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/slide-3.jpeg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- category container starts here -->
    <div class="container my-3" id="ques" >
        <h2 class="text-center my-3"> iDiscuss - Browse Categories</h2>
        <div class="row">
            <!-- fetch all the categories -->
            <?php 
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
              // echo $row['category_id'];
              // echo $row['category_name'];
              $id = $row['category_id'];
              $cat = $row['category_name'];
              $desc = $row['category_description'];
              // <!-- use a for loop to iterate through categories -->
             echo '<div class="col-md-4  my-2">
                  <div class="card" style="width: 18rem;">
                      <img src="https://source.unsplash.com/random/200×100/?' . $cat . ',coding" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title"> <a href="threadlist.php?catid=' . $id . '">' . $cat . '</a></h5>
                          <p class="card-text">' . substr($desc,0,90) . '...</p>
                          <a href="threadlist.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
                      </div>
                  </div>
              </div>';
            }


            ?>



        </div>
    </div>

    <?php   include('partials/_footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>