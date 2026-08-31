<div class="container py-4">
    <h1 class="heading offset-md-2 my-4 fs-1 fw-bold">Questions</h1>

    <div class="accordion col-md-6" id="accordionExample">
        <?php
        include("./common/database.php");
        $query = "SELECT * FROM QUESTIONS;";

        $result = $conn->query($query);
        $i = 0;
        if ($result->num_rows > 0) {
            foreach ($result as $rows) {
                $i++;
        ?>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button fs-5 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?= $i ?>" aria-expanded="false" aria-controls="collapseOne<?= $i ?>">
                            <?= $rows["title"] ?>
                        </button>
                    </h2>
                    <div id="collapseOne<?= $i ?>" class="accordion-collapse collapse  fs-6" data-bs-parent="#accordionExample">
                        <div class="accordion-body"> <strong>Description: </strong>
                            <?= $rows["description"] ?>
                        </div>
                    </div>
                    <a href="./?q-id=<?=$rows['id']?>"><button type="button"  class="btn btn-primary rounded-xl m-2">Answers</button></a>
                </div>

        <?php
            }
        }
        ?>


    </div>

</div>