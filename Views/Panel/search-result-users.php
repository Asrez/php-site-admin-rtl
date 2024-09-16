<!doctype html>
<html lang="en" dir="rtl">

<head>
  <title>Result Users</title>
  <?php include 'Init/style.php'; ?>
</head>

<body>
  <?php include 'Includes/header.php' ?>
  <div class="page-wrapper">
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              Search Results Users
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
              <?php if (empty($users)) {
                echo 'no result';
              } ?>
              <?php foreach ($users as $user) { ?>
                <div class="col-sm-6 col-lg-4">
                  <div class="card card-sm">
                    <a href="/panel/user/<?= $user['id'] ?>" class="d-block"><img
                        src="/static/avatars/<?= $user['image'] ?>" class="card-img-top"></a>
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
  </div>
  </div>
  <?php include 'Init/script.php'; ?>
  <?php include 'Init/modals.php'; ?>
</body>

</html>