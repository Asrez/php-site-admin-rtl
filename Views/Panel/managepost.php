<!doctype html>
<html lang="en">
  <head>
    <title>Manage Posts</title>
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
                  Manage Posts
                </h2>
              </div>
              <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                  <a href="#" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                    New Post
                  </a>
                </div>
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
                    <?php foreach ($posts as $post) { ?>
                    <div class="list-group-item">
                      <div class="row g-2 align-items-center">
                        <div class="col-auto fs-3">
                          <?= $post['id'] ?>
                        </div>
                        <div class="col-auto">
                          <img src="../../static/photos/<?= $post['image'] ?>" class="rounded" alt="<?= $post['title'] ?>" width="40" height="40">
                        </div>
                        <div class="col">
                        <?= $post['title'] ?>
                          <div class="text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M12 19c-4 0 -7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7c-.42 .736 -.858 1.414 -1.311 2.033" /><path d="M15 19l2 2l4 -4" /></svg>
                          <?= $post['viewcount'] ?>
                          </div>
                        </div>
                        <div class="col-auto text-muted">
                        <?= date($post['date']) ?>
                        </div>
                        <div class="col-auto">
                          <a href="#" class="link-secondary">
                            <button class="switch-icon" data-bs-toggle="switch-icon">
                              <span class="switch-icon-a text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
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
                              <?php if ($post['state'] === 0) { ?>
                                <a class="dropdown-item" href="#">
                                    Confirm
                                </a>
                              <?php } ?>
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