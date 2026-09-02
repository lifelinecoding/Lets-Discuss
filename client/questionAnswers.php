<div class="container py-4">
    <?php
    include("./common/database.php");
    $qid = $_GET["q-id"];

    $query = "SELECT * FROM QUESTIONS WHERE ID = $qid;";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    ?>

    <div class="card shadow border-0 my-4 col-md-8">
        <div class="card-body p-4">
            <h3 class="mb-2"><strong>Question: </strong><?= $row['title'] ?></h3>
            <p class="text-muted fs-6"><strong>Description: </strong><?= $row['description'] ?></p>
        </div>
    </div>

    <div class="col-md-8">
        <?php
        include("./client/answers.php");
        ?>
        <form action="./server/requests.php" method="POST">
            <div class="mb-3">
                <input type="hidden" name="question_id" value="<?= $qid ?>">
                <?php
                if (!isset($_SESSION["user"]["username"])) {

                ?>
                    <h1 class="text-danger fs-5">Login to submit your answer</h1>
                <?php

                } else {
                ?>
                    <textarea name="answer" id="answer" class="form-control" rows="4"
                        placeholder="Write your answer here..." required></textarea>
            </div>
            <button type="submit" name="ans" class="btn btn-primary px-4">Submit Answer</button>
        <?php
                }
        ?>

        </form>
    </div>

</div>