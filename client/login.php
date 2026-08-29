<div class="container py-4">
    <h1 class="col-6 offset-sm-5 my-4">Login</h1>

    <form action="./server/requests.php" method="post">
        <div class="col-6 offset-sm-3 my-3">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="email@domain.com">
        </div>
        <div class="col-6 offset-sm-3 my-3">
            <label for="password" class="form-label fw-bold">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter user password">
        </div>
        <button type="submit" name="login" class="btn btn-primary col-6 offset-sm-3 my-3 fw-bold">Submit</button>
    </form>
</div>