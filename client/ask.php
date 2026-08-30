<div class="container py-4 d-flex justify-content-center align-items-center flex-column">
    <h1 class="col-md-6 offset-md-3 my-4 fw-bold fs-1">Ask Your Question</h1>

    <form action="./server/requests.php" method="post" class="container">
        <div class="col-md-6 offset-md-3 my-3">
            <label for="title" class="form-label fw-bold">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter question title">
        </div>
        <div class="col-md-6 offset-md-3 my-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter your question"></textarea>
        </div>
        <div class="col-md-6 offset-md-3 my-3">
            <label for="category" class="form-label fw-bold">Category</label>
            <?php
            include("./client/category.php");
            ?>
        </div>
        <button type="submit" name="ask" class="btn btn-primary col-md-6 offset-md-3 my-3 fw-bold">Ask Question</button>
    </form>
</div>