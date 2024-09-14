<!doctype html>
<html lang="en" dir="rtl">
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
                  <form method="get" action="/panel/manage/posts">
                    <input type="search" name="search" class="form-control d-inline-block w-9 me-3" placeholder="Search Post…"/>
                  </form>                  <a href="#" class="btn btn-primary">
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
              <div class="col-lg-20">
                <div class="card">
                  <div class="list-group card-list-group">
                    <?php foreach ($posts as $post) { ?>
                    <div class="list-group-item" <?php if ($post['admin_id'] === $admin['id']) { echo "style='background-color:lightblue;'";}?>>
                      <div class="row g-2 align-items-center">
                        <div class="col-auto fs-3">
                          <?= $post['id'] ?>
                        </div>
                        <div class="col-auto">
                          <img src="../../static/photos/<?= $post['image'] ?>" class="rounded" alt="<?= $post['title'] ?>" width="60" height="60">
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
                          <a data-bs-toggle="modal" data-bs-target="#modal-simple<?= $post['id'] ?>" class="link-secondary">
                            <button class="switch-icon" >
                              <span class="text-muted">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="4" width="18" height="16" rx="2" /><path d="M7 8h10" /><path d="M7 12h10" /><path d="M7 16h10" /></svg>
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
                              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-small<?= $post['id'] ?>">
                                Delete
                              </a>
                              <?php if ($post['state'] === 0) { ?>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-success<?= $post['id'] ?>">
                                    Confirm
                                </a>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal modal-blur fade" id="modal-simple<?= $post['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title"><?= $post['title'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <?= $post['content'] ?>
                        </div>
                          <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal modal-blur fade" id="modal-small<?= $post['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="modal-title">Delete Post <?= $post['title'] ?></div>
                            <div>Are you sure?</div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                            <a href="/panel/result/post/delete/<?= $post['id'] ?>" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal modal-blur fade" id="modal-success<?= $post['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          <div class="modal-status bg-success"></div>
                          <div class="modal-body text-center py-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><path d="M9 12l2 2l4 -4" /></svg>
                            <h3>Confirm <?= $post['title'] ?> post</h3>
                          <div class="modal-footer">
                            <div class="w-100">
                              <div class="row">
                                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                    Cancel
                                  </a></div>
                                <div class="col"><a href="/panel/result/post/confirm" class="btn btn-success w-100" data-bs-dismiss="modal">
                                    Set Confirm
                                  </a></div>
                              </div>
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
            <?php if (empty($posts)) echo "no result" ; ?>
          </div>
        </div>
        <?php include "Includes/footer.php"; ?>
      </div>
    </div>
    <?php include "Init/script.php"; ?>
    <?php include "Init/modals.php"; ?>
  </body>
</html>