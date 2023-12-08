<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ajax Project</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="js/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
  <div class="row">
    <div class="col">
      <div class="card mt-5">
        <div class="card-title">
          <button type="button" class="btn btn-primary mx-5 my-2" data-bs-toggle="modal" data-bs-target="#Registration">Add new User</button>
        </div>
        <div class="card-body">
          <div id="table"></div>
        </div>
      </div>
    </div>
  </div>
  <!--Registration Modal -->
  <div class="modal" id="Registration">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Registration Header</h3>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">User name</label>
              <input type="text" class="form-control" id="username">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
