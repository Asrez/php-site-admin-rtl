<!doctype html>
<html lang="en">
  <head>
    <title>My Account</title>
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
                  Account Settings
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="row g-0">
                <form method="post" action="/panel/result/account"></form>
                <div class="col d-flex flex-column">
                  <div class="card-body">
                    <h2 class="mb-4">My Account</h2>
                    <h3 class="card-title">Profile Details</h3>
                    <div class="row align-items-center">
                      <div class="col-auto"><span class="avatar avatar-xl" style="background-image: url(../../static/avatars/<?= $admin['image'] ?>)"></span>
                      </div>
                      <div class="col-auto"><a href="#" class="btn">
                          Change avatar
                        </a></div>
                      <div class="col-auto"><a href="#" class="btn btn-ghost-danger">
                          Delete avatar
                        </a></div>
                    </div>
                    <h3 class="card-title mt-4">Profile</h3>
                    <div class="row g-3">
                       <div class="col-md">
                        <div class="form-label">Image</div>
                        <input type="file" class="form-control" name="image">
                      </div>
                      <div class="col-md">
                        <div class="form-label">Name</div>
                        <input type="text" class="form-control" name="name" value="<?= $admin['name'] ?>">
                      </div>
                      <div class="col-md">
                        <div class="form-label">Username</div>
                        <input type="text" class="form-control" name="username" value="<?= $admin['username'] ?>">
                      </div>
                      <div class="col-md">
                        <div class="form-label">Email</div>
                        <input type="email" class="form-control" name="email" value="<?= $admin['email'] ?>">
                      </div>
                      <div class="col-md">
                        <div class="form-label">Password</div>
                        <input type="password" class="form-control" name="password">
                      </div>
                      <h3 class="card-title mt-4">Set New Password</h3>
                      <div class="col-md">
                        <div class="form-label">New Password</div>
                        <input type="password" class="form-control" name="new_password">
                      </div>
                      <div class="col-md">
                        <div class="form-label">Repeat New Password</div>
                        <input type="password" class="form-control" name="reply_new_password">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer bg-transparent mt-auto">
                    <div class="btn-list justify-content-end">
                      <a href="#" class="btn">
                        Cancel
                      </a>
                      <button href="#" class="btn btn-primary" type="submit">
                        Submit
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include "Includes/footer.php"; ?>
      </div>
    </div>
    <?php include "Init/modals.php"; ?>
    <?php include "Init/script.php"; ?>
  </body>
</html>