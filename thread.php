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
 
    <?php 
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id='$id'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
        $posted_by = $row2['user_email'];
    }
    
    ?>
    <?php 
    $showAlert = false;
    $method=$_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
        //    insert comment into db
        $comment= $_POST['comment']; // $_POST[''] :- it is a global post method which takes the name of the form eg: name="title"
        $comment= str_replace("<", "&lt;", $comment);
        $comment= str_replace(">", "&gt;", $comment);
        $sno = $_POST["sno"];
        $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`)
         VALUES ( '$comment', '$id', ' $sno ', current_timestamp())";
        $result = mysqli_query($conn,$sql);
        $showAlert = true;
        if($showAlert){
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your Comment has been added.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        }
        }
    
    ?>

    <!-- category container starts here -->
    <div class="container my-3">
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold"><?php  echo $title; ?></h1>
                <p class="col-md-8 fs-4"><?php echo $desc;?></p>
                <hr class="my-4">
                <p>Participate in online forums as you would in constructive, face-to-face discussions.
                    Postings should continue a conversation and provide avenues for additional continuous dialogue.Do
                    not post “I agree,” or similar, statements. Stay on the topic of the thread – do not stray.</p>

                <p>Posted by: <em> <?php echo $posted_by; ?> </em></p>
            </div>
        </div>
    </div>

    
    <?php
   if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
   echo ' <div class="container">
   <h1 class="py-2">Post a Comment</h1>
   <form action="' . $_SERVER["REQUEST_URI"] . '?>" method="post">

   <div class="form-group mb-3">

       <label for="Textarea" class="py-2">Type Your Comment</label>
       <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment"></textarea>
       <input type="hidden" name="sno" value="'. $_SESSION["sno"] .'">
   </div>
   <button type="submit" class="btn btn-success">Post Comment</button>
</form>
</div>';
   }
      else{
       echo '
         <div class="container">
         <h1 class="py-2">Post a Comment</h1>
         <p class="col-md-8 fs-4">You are not logged in. Please login to be able to post comments.</p>
         </div>';
      }
    ?>

    <div class="container mb-5" id="ques">
        <h1 class="py-2">Discussions</h1>
        <?php 
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE thread_id='$id'";
            $result = mysqli_query($conn,$sql);
            $noResult=true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult=false;
                $id = $row['comment_id'];
                $content = $row['comment_content'];
                $comment_time = $row['comment_time'];
                $thread_user_id = $row['comment_by'];
                $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
                $result2 = mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_assoc($result2);
               
            
          
        echo '<div class="d-flex align-items-center my-3">
            <div class="flex-shrink-0">
                <img src="img/userdefault.png" width="54px" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
            <p class="font-weight-bold my-0"><b>Asked by: '. $row2['user_email'] .' at ' . $comment_time . '</b></p>
                '. $content .'
            </div>
        </div>';
       }     
       
       if($noResult){
        echo ' <div class="h-100 p-5 bg-body-tertiary border rounded-3">
           <h2>No Comments Found</h2>
           <p>Be the first one to Comment.</p>
         </div>';
         
         }
    ?>
    </div>



    <?php   include('partials/_footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>