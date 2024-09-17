<!doctype html>
<html lang="en" dir="rtl">

<head>
  <title>Manage Users</title>
  <?php include "Init/style.php"; ?>
</head>

<body>
  <div class="page">
    <?php include "Includes/header.php"; ?>
    <div class="page-wrapper">
      <div class="page-header d-print-none">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <div class="col">
              <h2 class="page-title">
                Manage Users
              </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
              <div class="d-flex">
                <form method="get" action="/panel/manage/users">
                  <input type="search" name="search" class="form-control d-inline-block w-9 me-3"
                    placeholder="Search User…" />
                </form>
                <a data-bs-toggle="modal" data-bs-target="#modal-report2" class="btn btn-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                  </svg>
                  New User
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
                  <?php foreach ($users as $user) { ?>
                    <div class="list-group-item">
                      <div class="row g-2 align-items-center">
                        <div class="col-auto fs-3">
                          <?= $user['id'] ?>
                        </div>
                        <div class="col-auto">
                          <img src="/static/avatars/<?= $user['image'] ?>" class="rounded" alt="<?= $user['username'] ?>"
                            width="40" height="40">
                        </div>
                        <div class="col">
                          <?= $user['username'] ?>
                          <div class="text-muted">
                            <?= $user['name'] ?>
                          </div>
                        </div>
                        <div class="col-auto text-muted">
                          <?= date($user['date']) ?>
                        </div>
                        <div class="col-auto">
                          <a href="#" class="link-secondary">
                            <button class="switch-icon" data-bs-toggle="switch-icon">
                              <span class="switch-icon-a text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                  stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                  <circle cx="12" cy="7" r="4" />
                                  <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                              </span>
                            </button>
                          </a>
                        </div>
                        <div class="col-auto lh-1">
                          <div class="dropdown">
                            <a href="#" class="link-secondary" data-bs-toggle="dropdown">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="5" cy="12" r="1" />
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="19" cy="12" r="1" />
                              </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#modal-small<?= $user['id'] ?>">
                                Delete
                              </a>
                              <a class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#modal-report2-update<?= $user['id'] ?>">
                                Update
                              </a>
                              <a class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#modal-small2<?= $user['id'] ?>">
                                Set As Admin
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal modal-blur fade" id="modal-small<?= $user['id'] ?>" tabindex="-1" role="dialog"
                      aria-hidden="true">
                      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="modal-title">Delete User <?= $user['username'] ?></div>
                            <div>Are you sure?</div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-link link-secondary me-auto"
                              data-bs-dismiss="modal">Cancel</button>
                            <a href="/panel/result/user/delete/<?= $user['id'] ?>" class="btn btn-danger">Yes, delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal modal-blur fade" id="modal-small2<?= $user['id'] ?>" tabindex="-1" role="dialog"
                      aria-hidden="true">
                      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="modal-title">Set Admin User <?= $user['username'] ?></div>
                            <div>Are you sure?</div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-link link-secondary me-auto"
                              data-bs-dismiss="modal">Cancel</button>
                            <a href="/panel/result/user/setadmin/<?= $user['id'] ?>" class="btn btn-success">Yes, Set as
                              admin</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal modal-blur fade" id="modal-report2-update<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <form method="post" action="/panel/result/user/update/<?= $user['id'] ?>"
                          enctype="multipart/form-data">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Update User</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="enter name of user"
                                  value="<?= $user['name'] ?>">
                              </div>
                              <label class="form-label">Type</label>
                              <div class="form-selectgroup-boxes row mb-3">
                                <div class="col-lg-6">
                                  <label class="form-selectgroup-item">
                                    <input type="radio" name="type" value="0" class="form-selectgroup-input" <?php if ($user['state'] === 0)
                                      echo "checked"; ?>>
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                      <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                      </span>
                                      <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">User</span>
                                        <span class="d-block text-muted">can't access the admin panel</span>
                                      </span>
                                    </span>
                                  </label>
                                </div>
                                <div class="col-lg-6">
                                  <label class="form-selectgroup-item">
                                    <input type="radio" name="type" value="1" class="form-selectgroup-input" <?php if ($user['state'] === 1)
                                      echo "checked"; ?>>
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                      <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                      </span>
                                      <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Admin</span>
                                        <span class="d-block text-muted">can access the admin panel</span>
                                      </span>
                                    </span>
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>">
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control"
                                      value="<?= $user['username'] ?>">
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control">
                                  </div>
                                </div>
                                <div class="col-lg-16">
                                  <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input class="form-control" name="password" type="password" required>
                                  </div>
                                </div>
                                <div class="col-lg-16">
                                  <div>
                                    <label class="form-label">Repassword</label>
                                    <input class="form-control" name="repassword" type="password" required>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                Cancel
                              </a>
                              <button type="submit" name="btn_new_user" class="btn btn-primary ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                  stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                  <line x1="12" y1="5" x2="12" y2="19" />
                                  <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Update
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  <?php } ?>
                  <?php if (empty($users))
                    echo "no result"; ?>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <h3 class="mb-3">Admins</h3>
              <div class="row row-cards">
                <?php foreach ($admins as $adminn) { ?>
                  <div class="col-md-6 col-lg-12">
                    <div class="card" <?php if ($adminn === $admin) { ?> style="background-color : lightblue;" <?php } ?>>
                      <div class="row row-0">
                        <div class="col-auto">
                          <img src="/static/avatars/<?= $adminn['image'] ?>" class="rounded-start"
                            alt="<?= $adminn['username'] ?>" width="80" height="80">
                        </div>
                        <div class="col">
                          <div class="card-body">
                            <?= $adminn['username'] ?>
                            <div class="text-muted">
                              <?= $adminn['name'] ?>
                            </div>
                          </div>
                        </div>
                        <?php if ($adminn === $admin) { ?>
                          <div class="col-auto">
                            <a href="/panel/manage/account" class="link-secondary">
                              <button class="switch-icon">
                                <span class="text-muted">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" />
                                    <path d="M16 5l3 3" />
                                    <path d="M9 7.07a7.002 7.002 0 0 0 1 13.93a7.002 7.002 0 0 0 6.929 -5.999" />
                                  </svg>
                                </span>
                              </button>
                            </a>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                <?php if (empty($users))
                  echo "no result"; ?>
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