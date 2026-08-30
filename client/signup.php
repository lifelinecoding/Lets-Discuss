<div class="container py-4 d-flex justify-content-center align-items-center flex-column">
    <h1 class="col-md-6 offset-md-4 my-4 fw-bold fs-1">Signup</h1>

    <form action="./server/requests.php" method="post" class="container">
        <div class="col-md-6 offset-md-3 my-3">
            <label for="username" class="form-label fw-bold">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
        </div>
        <div class="col-md-6 offset-md-3 my-3">
            <label for="email" class="form-label fw-bold">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter user email">
        </div>
        <div class="col-md-6 offset-md-3 my-3">
            <label for="password" class="form-label fw-bold">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter user password">
        </div>
        <div class="col-md-6 offset-md-3 my-3">
            <label for="address" class="form-label fw-bold">Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Enter user address">
        </div>
        <div id="emailHelp" class="form-text col-md-6 offset-sm-3">We'll never share your information with anyone else.</div>
        <button type="submit" name="signup" class="btn btn-primary col-md-6 offset-md-3 my-3 fw-bold">Sign Up</button>
    </form>
</div>