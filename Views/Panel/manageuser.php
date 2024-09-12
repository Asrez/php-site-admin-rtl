<!doctype html>
<html lang="en">
  <head>
    <title>Manage Users</title>
    <?php include "Init/style.php"; ?>
  </head>
  <body >
    <div class="page">
      <?php include "Includes/header.php"; ?>
      <div class="page-wrapper">
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Users
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row">
              <div class="col-lg-8">
                <div class="card">
                  <div class="list-group card-list-group">
                    <?php foreach ($users as $user) { ?>
                    <div class="list-group-item">
                      <div class="row g-2 align-items-center">
                        <div class="col-auto fs-3">
                          <?= $user['id'] ?>
                        </div>
                        <div class="col-auto">
                          <img src="./static/avatars/<?= $user['image'] ?>" class="rounded" alt="<?= $user['username'] ?>" width="40" height="40">
                        </div>
                        <div class="col">
                        <?= $user['username'] ?>
                          <div class="text-muted">
                          <?= $user['name'] ?> <br>
                          <?= $user['date'] ?>
                          </div>
                        </div>
                        <div class="col-auto text-muted">
                        <?= date($user['date']) ?>
                        </div>
                        <div class="col-auto">
                          <a href="#" class="link-secondary">
                            <button class="switch-icon" data-bs-toggle="switch-icon">
                              <span class="switch-icon-a text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                              </span>
                              <span class="switch-icon-b text-red">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                              </span>
                            </button>
                          </a>
                        </div>
                        <div class="col-auto lh-1">
                          <div class="dropdown">
                            <a href="#" class="link-secondary" data-bs-toggle="dropdown">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="5" cy="12" r="1" /><circle cx="12" cy="12" r="1" /><circle cx="19" cy="12" r="1" /></svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">
                                Delete
                              </a>
                              <a class="dropdown-item" href="#">
                                Set As Admin
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <h3 class="mb-3">Admins</h3>
                <div class="row row-cards">
                  <?php foreach ($admins as $admin) { ?>
                  <div class="col-md-6 col-lg-12">
                    <div class="card">
                      <div class="row row-0">
                        <div class="col-auto">
                          <img src="./static/avatars/<?= $admin['image'] ?>" class="rounded-start" alt="<?= $admin['username'] ?>" width="80" height="80">
                        </div>
                        <div class="col">
                          <div class="card-body">
                          <?= $admin['username'] ?>
                            <div class="text-muted">
                            <?= $admin['name'] ?>
                            </div>
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
        <?php include "Includes/footer.php"; ?>
      </div>
    </div>
    <?php include "Init/script.php"; ?>
    <?php include "Init/modals.php"; ?>
  </body>
</html>