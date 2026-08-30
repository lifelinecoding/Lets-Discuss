<div class="container py-4">
    <h1 class="col-6 offset-sm-4 my-4">Ask Your Question</h1>

    <form action="./server/requests.php" method="post">
        <div class="col-6 offset-sm-3 my-3">
            <label for="title" class="form-label fw-bold">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter question title">
        </div>
        <div class="col-6 offset-sm-3 my-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter your question"></textarea>
        </div>
        <div class="col-6 offset-sm-3 my-3">
            <label for="category" class="form-label fw-bold">Category</label>
            <select name="category" class="form-control" id="category" >
                <option value="" disabled selected > --Select--</option>
                <option value="mobile">Mobile</option>
                <option value="sports">Sports</option>
                <option value="entertainment">Entertainment</option>
                <option value="ganeral">General</option>
                <option value="technology">Technology</option>
            </select>
        </div>
        <button type="submit" name="ask" class="btn btn-primary col-6 offset-sm-3 my-3 fw-bold">Submit</button>
    </form>
</div>