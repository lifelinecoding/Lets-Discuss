<div class="container py-4">
    <?php
    include("./common/database.php");
    $qid = $_GET["q-id"];

    $query = "SELECT * FROM QUESTIONS WHERE ID = $qid;";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $cid = $row["category"];
    ?>

    <div class="row">

        <div class="col-md-8">
            <div class="card shadow border-0 my-4">
                <div class="card-body p-4">
                    <h3 class="mb-2"><strong>Question: </strong><?= $row['title'] ?></h3>
                    <p class="text-muted fs-6"><strong>Description: </strong><?= $row['description'] ?></p>
                </div>
            </div>
            <?php
            include("./client/answers.php");
            ?>
            <form action="./server/requests.php" method="POST">
                <!-- <div class="mb-3"> -->
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
                <!-- </div> -->
                <button type="submit" name="ans" class="btn btn-primary px-4">Submit Answer</button>
            <?php
                    }
            ?>
            </form>
        </div>

        <div class="col-md-4">
            <?php
            $CategoryQuery = "SELECT CATEGORY FROM CATEGORY WHERE ID =  $cid";
            $categoryResult = $conn -> query($CategoryQuery);
            $category = $categoryResult->fetch_assoc();
            ?>
            <div class="card shadow border-0 my-4">
                <div class="card-body p-4">
                    <h3 class="heading text-center fs-4 text-muted"><?= ucfirst($category["CATEGORY"]) ?>: Suggested Questions </h3>
                </div>
            </div>
                <?php
                $CategoryQuestionQuery = "SELECT * FROM QUESTIONS WHERE CATEGORY = $cid AND ID != $qid";
                $CategoryQuestionResult = $conn->query($CategoryQuestionQuery);

                if ($CategoryQuestionResult->num_rows > 0) {
                    foreach ($CategoryQuestionResult as $rows) {
                ?>
                        <div class="accordion-item heading p-2 border border-primary rounded shadow text-center my-2">
                            <a href="./?q-id=<?= $rows['id'] ?>" class="text-decoration-none text-black">
                                <h2 class="accordion-header fs-5">
                                    <?= $rows["title"] ?>
                                </h2>
                            </a>
                        </div>

                    <?php
                    }
                } else {
                    ?>
                    <div class="accordion-item heading p-2 border border-danger rounded shadow text-center my-2">
                        <h2 class="accordion-header fs-5 text-danger">
                            No Other Question is listed under this category!
                        </h2>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>


    </div>