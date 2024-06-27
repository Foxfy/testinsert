<?php
  include_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>List Competitions - Thai Football Tournament</title>

    <script
      type="module"
      crossorigin
      src="./assets/compiled/js/bootstrap.esm.js"
    ></script>
    <link rel="stylesheet" href="./assets/compiled/css/bootstrap.css" />
  </head>
  <body>
    <?php
      $sql = "SELECT c.* , COUNT(ap.provinces_id) AS count_province FROM competitions c LEFT JOIN allowed_provinces ap ON c.id = ap.competitions_id GROUP BY c.id ORDER BY c.id DESC";
      $result = $conn->query($sql);
    ?>
    <?php
    include('navbar.php');
    ?>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="index.php"
          >Thai Football competition</a
        >
      </div>
    </nav> -->

    <main class="container py-5">
      <header class="mb-4 d-flex align-items-center justify-content-between">
        <h3 class="mb-0">Competition List</h3>
        <div>
          <a class="btn btn-outline-primary" href="create.php">Create a competition</a>
          <a class="btn btn-outline-primary" href="team_create.php">Create a team</a>
        </div>
      </header>
      <?php
        if(isset($_SESSION['alert'])){
      ?>
      <div class="alert <?=$_SESSION['alert']['css']?>"><?=$_SESSION['alert']['msg']?></div>
      <?php
        unset($_SESSION['alert']);
        }
      ?>

      <section class="competition-list">
        <?php
          while($detail = $result->fetch_assoc()){
        ?>
        <a href="detail.php?competition_slug=<?=$detail['slug']?>">
          <article class="competition-box card mb-3">
            <div class="card-body">
              <h4><?=$detail['name']?></h4>
              <p class="text-muted mb-0"><?=$detail['max_teams']?> Teams - <?=$detail['count_province']?> Provinces</p>
            </div>
          </article>
        </a>
        <?php
          }
        ?>
      </section>
    </main>
  </body>
</html>
