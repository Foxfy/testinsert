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
    <title>Create Competition - Thai Football Tournament</title>

    <script
      type="module"
      crossorigin
      src="./assets/compiled/js/bootstrap.esm.js"
    ></script>
    <link rel="stylesheet" href="./assets/compiled/css/bootstrap.css" />
  </head>
  <body>
  <?php
    $slug = $_GET['competition_slug'];
    $sql = "SELECT c.* , COUNT(ap.provinces_id) AS count_province FROM competitions c LEFT JOIN allowed_provinces ap ON c.id = ap.competitions_id WHERE c.slug = '$slug'";
    $result = $conn->query($sql);
    $detail = $result->fetch_assoc();
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
        <h3 class="mb-0">Join Team</h3>
        <?php
          if(isset($_SESSION['alert'])){
        ?>
        <div class="alert <?=$_SESSION['alert']['css']?>"><?=$_SESSION['alert']['msg']?></div>
        <?php
            unset($_SESSION['alert']);
          }
        ?>
      </header>

      <section class="form">
        <div class="row">
          <div class="col-md-4">
            <form action="insert_jointeam.php" method="POST" enctype="multipart/form-data">
                <div class="col-12">
                  <div class="mb-3">
                    <input type="hidden" name="competition_slug" value="<?=$_GET['competition_slug']?>">
                    <label for="team_id">Team</label>
                    <select
                      name="team_id"
                      id="team_id"
                      class="form-control"
                    >
                    <?php
                      $sql = "SELECT * FROM teams";
                      $result = $conn->query($sql);
                      while($row=$result->fetch_assoc()){
                        if(in_array($row['id'] , $_SESSION['post']['teams']??[])){
                          $selected = 'selected';
                        }else{
                          $selected = '';
                        }
                    ?>
                      <option value="<?=$row['id']?>" <?=$selected?>><?=$row['team_name']?></option>
                    <?php
                      }
                    ?>
                    </select>
                  </div>
                </div>
              <div class="row mt-2">
                <div class="col-8">
                  <button class="btn btn-primary w-100" type="submit">
                    Save
                  </button>
                </div>
                <div class="col-4">
                  <a
                    href="detail.php?competition_slug=<?=$detail['slug']?>'"
                    class="btn bg-light text-primary w-100"
                    >Back</a
                  >
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>
