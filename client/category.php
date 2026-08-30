<select name="category" class="form-control" id="category">
    <option value="" disabled selected> --Select--</option>
    <?php
    include("./common/database.php");

    $query = "SELECT * FROM CATEGORY;";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        foreach ($result as $rows) {
    ?>
    <option value=<?= htmlspecialchars($rows["id"]) ?> > <?= htmlspecialchars(ucfirst($rows["category"])) ?> </option>
    <?php
        }
    }
    ?>
</select>