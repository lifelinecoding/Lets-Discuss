<nav class="navbar navbar-expand-lg bg-black py-3">
  <div class="container-fluid">
    <a class="navbar-brand text-white fw-bold " href="#">LetsDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-white" href="./">Home</a>
        </li>

        <?php
        if (isset($_SESSION["user"]["username"])) {
        ?>
          <li class="nav-item">
            <a class="nav-link text-white"> <?php echo $_SESSION["user"]["username"] ?> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="./server/requests.php?logout=true">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="?ask=true">Ask a Question</a>
          </li>
        <?php
        } else {
        ?>

          <li class="nav-item">
            <a class="nav-link text-white" href="?login=true">Login</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white" href="?signup=true">SignUp</a>
          </li>
        <?php
        }
        ?>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Latest Questions</a>
        </li>
      </ul>
    </div>
  </div>
</nav>