<div class="container py-4 d-flex justify-content-center align-items-center flex-column">
    <h1 class="col-md-6 offset-md-4 my-4 fs-1 fw-bold">Login</h1>

    <form action="./server/requests.php" method="post" class="container">
        <div class="col-md-6 offset-md-3 my-3">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="email@domain.com">
        </div>
        <div class="col-md-6 offset-md-3 my-3">
            <label for="password" class="form-label fw-bold">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter user password">
        </div>
        <button type="submit" name="login" class="btn btn-primary col-md-6 offset-md-3 my-3 fw-bold">Submit</button>
    </form>
</div>