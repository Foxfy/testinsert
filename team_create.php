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
        <h3 class="mb-0">Create a competition</h3>
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
            <form action="insert_team.php" method="POST" enctype="multipart/form-data">
              <div class="col-12">
                <div class="mb-3">
                  <label for="team_name">Team Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="team_name"
                    name="team_name"
                    value="<?=$_SESSION['post']['team_name']??''?>"
                    required
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label for="province">Provinces</label>
                    <select
                      name="province"
                      id="province"
                      class="form-control"
                    >
                    <?php
                      $sql = "SELECT * FROM provinces";
                      $result = $conn->query($sql);
                      while($row=$result->fetch_assoc()){
                        if(in_array($row['id'] , $_SESSION['post']['provinces']??[])){
                          $selected = 'selected';
                        }else{
                          $selected = '';
                        }
                    ?>
                      <option value="<?=$row['id']?>" <?=$selected?>><?=$row['name']?></option>
                    <?php
                      }
                    ?>
                      <!-- <option>Buriram</option>
                      <option>Chiangrai</option>
                      <option>Chonburi</option>
                      <option>Khon Kaen</option>
                      <option>Lampang</option>
                      <option>Lamphun</option>
                      <option>Nakhon Ratchasima</option>
                      <option>Nong Bua Lamphu</option>
                      <option>Nonthaburi</option>
                      <option>Prachuap Khiri Khan</option>
                      <option>Ratchaburi</option>
                      <option>Sukhothai</option> -->
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label for="logo_team">Logo Team</label>
                    <input
                      type="file"
                      class="form-control"
                      id="logo_team"
                      name="logo_team"
                      value=""
                    />
                  </div>
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
                    href="index.php"
                    class="btn bg-light text-primary w-100"
                    type="submit"
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
