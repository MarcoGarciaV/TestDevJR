<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>TESTDEVJR - TASKS</title>
</head>
<body>


    <div class="container mt-5">
    <div class="alert alert-success d-none" role="alert" >
        Task created successfully!
        <div id="jsonSuccess">
        </div>
    </div>
         <!-- BEGIN RETURN BUTTON-->
    <div class="row" >
        <div class="col-md-12 mb-3">
            <a href="index.php" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Return</a>
        </div>
    </div>
    <!-- end RETURN BUTTON-->

    <div class="row text-center my-2"  ><h1>TASKS</h1></div>

      <!-- BEGIN FORM-->
    <div class="row">
    <form id="formTask" method="post" >
    <div class="row">
    <h2 class="my-4">Create Task</h2>
  <div class="col-md-6 mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="ej. Register">
  </div>
  <div class="col-md-12 mb-3">
    <input type="checkbox" class="form-check-input"  name="checkout" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Completed</label>
  </div>
  <div class="col-md-12 mb-3">
  <button type="submit" class="btn btn-primary">Save</button>
  </div>

  </div>
</form>
    </div>
    <!-- END FORM-->

    <!-- BEGIN SHOW TASKS-->
    <h2 class="my-4">Tasks</h2>
    <div class="row"  id="divTableComments">
    </div>
    <!-- END SHOW TASKS-->

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="ajax/task.js"></script>
</body>
</html>