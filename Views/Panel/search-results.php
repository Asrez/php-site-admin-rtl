<!doctype html>
<html lang="en">
  <head>
    <title>Result</title>
    <?php include 'Init/style.php'; ?>
  </head>
  <body >
    <?php include 'Includes/header.php' ?>
      <div class="page-wrapper">
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Search Results
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row g-4">
              <div class="col-9">
                <div class="row row-cards">
                <h2>Posts</h2>
                <?php if (empty($posts)) {
                    echo 'no result';
                } ?>
                  <?php foreach ($posts as $post) { ?>
                    <div class="col-sm-6 col-lg-4">
                      <div class="card card-sm">
                        <a href="/panel/post/<?= $post['id'] ?>" class="d-block"><img src="../../static/photos/<?= $post['image'] ?>" class="card-img-top"></a>
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div>
                              <div><?= $post['title'] ?></div>
                              <div class="text-muted"><?= $post['date'] ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                  <br>
                  <h2>Users</h2>
                  <?php if (empty($users)) {
                      echo 'no result';
                  } ?>
                  <?php foreach ($users as $user) { ?>
                    <div class="col-sm-6 col-lg-4">
                      <div class="card card-sm">
                        <a href="/panel/user/<?= $user['id'] ?>" class="d-block"><img src="../../static/avatars/<?= $user['image'] ?>" class="card-img-top"></a>
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div>
                              <div><?= $user['name'] ?></div>
                              <div class="text-muted"><?= $user['username'] ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>

    <?php include 'Includes/footer.php' ?>
    
    <?php include 'Init/script.php'; ?>
    <?php include 'Init/modals.php'; ?>
  </body>
</html>