<div class="container py-4">
    <label for="answer" class="form-label fw-semibold fs-3 text-primary">Answer: </label>
    <?php
    $qid = $_GET["q-id"];
    $query = "SELECT * FROM ANSWERS INNER JOIN USERS ON USERS.ID = ANSWERS.USER_ID WHERE ANSWERS.QUESTION_ID = $qid;";   

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        foreach ($result as $rows) {
            $answer = $rows["answers"];
            $owner = $rows["username"];
    ?>
            <div class="card-body answer">
                <strong class="text-primary"><?= $owner ?> </strong><br />
                <p class="text-muted fs-6"><?= $answer ?></p>
            </div>
        <?php
        }
        ?>

    <?php
    }
    ?>

</div>