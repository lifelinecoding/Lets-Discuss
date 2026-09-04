<div class="container py-4">

    <div class="row">
        <div class="accordion col-md-6" id="accordionExample">
            <h1 class="heading offset-md-4 my-4 fs-1 fw-bold">Questions</h1>
            <?php
            include("./common/database.php");
            if (isset($_GET["c-id"])) {
                $cid = $_GET["c-id"];
                $query = "SELECT * FROM QUESTIONS WHERE CATEGORY=$cid;";
            } else {
                $query = "SELECT * FROM QUESTIONS;";
            }

            $result = $conn->query($query);
            $i = 0;
            if ($result->num_rows > 0) {
                foreach ($result as $rows) {
                    $i++;
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
            }
            else{
                ?>
                <div class="accordion-item heading p-2 border border-danger rounded shadow text-center my-2">
                            <h2 class="accordion-header fs-5 text-danger">
                                No Question is listed under this category!
                            </h2>
                    </div>
                <?php
            }
            ?>


        </div>
        <div class="col-md-6">
            <h1 class="heading offset-md-4 my-4 fs-1 fw-bold">Category</h1>
            <?php
            // include("./common/database.php");
            $query = "SELECT * FROM CATEGORY;";

            $result = $conn->query($query);
            $i = 0;
            if ($result->num_rows > 0) {
                foreach ($result as $rows) {
                    $i++;
            ?>

                    <div class="heading p-2 border border-primary rounded shadow text-center my-2">
                        <a href="./?c-id=<?= $rows['id'] ?>" class="text-decoration-none text-black">
                        <h2 class="accordion-header fs-5">
                            <?= ucfirst($rows["category"]) ?>
                        </h2>
                        </a>
                    </div>

            <?php
                }
            }
            ?>


        </div>
    </div>
</div>

</div>