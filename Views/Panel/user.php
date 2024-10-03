<!doctype html>>
<html lang="en" dir="rtl">
  <head>
    <title>User <?= $user['id'] ?></title>
    <?php include "Init/style.php" ?>
  </head>
  <body >
    <div class="page">
    <?php include "Includes/header.php" ?>
      <div class="page-wrapper">
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                <?= $user['name'] ?>
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User info</h3>
              </div>
              <div class="card-body">
                <div class="datagrid">
                  <div class="datagrid-item">
                    <div class="datagrid-title">Name</div>
                    <div class="datagrid-content"><?= $user['name'] ?></div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Username</div>
                    <div class="datagrid-content"><?= $user['username'] ?></div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Avatar</div>
                    <div class="datagrid-content">
                      <div class="d-flex align-items-center">
                        <span class="avatar avatar-xs me-2 avatar-rounded" style="background-image: url(../../static/avatars/<?= $user['image'] ?>)"></span>
                        <?= $user['name'] ?>
                      </div>
                    </div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Date</div>
                    <div class="datagrid-content"><?= date($user['date']) ?></div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Email</div>
                    <div class="datagrid-content">
                    <?= $user['email'] ?>
                    </div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Type</div>
                    <div class="datagrid-content">
                      <?php if ($user['state'] === 1) echo "Admin"; else echo "User" ; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include "Includes/footer.php" ?>
    </div>
  </div>
  <?php include "Init/modals.php" ?>
  <?php include "Init/script.php" ?>
  </body>
</html>