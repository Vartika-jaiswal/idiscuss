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
        min-height: 80vh;
    }
    </style>


      </head>

<body>
    <?php   include('partials/_dbconnect.php'); ?>
    <?php   include('partials/_header.php'); ?>

    <div class="container my-3" id="ques">
      <h1 class="text-center my-3">Contact Us</h1>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" disabled>
            <label for="floatingInputDisabled">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextareaDisabled"
                disabled></textarea>
            <label for="floatingTextareaDisabled">Comments</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2Disabled"
                style="height: 100px" disabled>Disabled textarea with some text inside</textarea>
            <label for="floatingTextarea2Disabled">Comments</label>
        </div>
        <div class="form-floating">
            <select class="form-select" id="floatingSelectDisabled" aria-label="Floating label disabled select example"
                disabled>
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <label for="floatingSelectDisabled">Works with selects</label>
            <button class="btn btn-success mt-3">Submit</button:btn>
        </div>
    </div>

    <?php   include('partials/_footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>