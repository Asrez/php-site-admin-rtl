<!doctype html>
<html lang="en" dir="rtl">
  <head>
    <title>Manage Avertising</title>
    <?php include "Init/style.php"; ?>
  </head>
  <body >
    <div class="page">
      <?php include "Includes/header.php"; ?>
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Manage Avertising
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row">
              <div class="col-lg-13">
                <div class="card">
                  <div class="list-group card-list-group">
                    <?php foreach ($advers as $adver) { ?>
                    <div class="list-group-item">
                      <div class="row g-6 align-items-center">
                        <div class="col-auto fs-3">
                          <?= $adver['id'] ?>
                        </div>
                        <div class="col-auto">
                          <img src="/static/photos/<?= $adver['value_setting'] ?>" class="rounded" alt="<?= $adver['title'] ?>" width="60" height="60">
                        </div>
                        <div class="col">
                          <div class="text-muted">
                          <?= $adver['text'] ?>
                          </div>
                        </div>
                        <div class="col-auto text-muted">
                        <?= $adver['link'] ?>
                        </div>
                        <div class="col-auto">
                          <a href="#" class="link-secondary">
                            <button class="switch-icon" >
                              <span class="text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><circle cx="12" cy="12" r="3" /></svg>
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
                                Update
                              </a>
                              <a class="dropdown-item" href="#">
                                Delete
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