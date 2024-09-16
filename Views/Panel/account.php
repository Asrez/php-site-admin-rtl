<!doctype html>
<html lang="en" dir="rtl">

<head>
  <title>My Account</title>
  <?php include "Init/style.php"; ?>
</head>

<body>
  <script src="./dist/js/demo-theme.min.js?1668287865"></script>
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
              <form action="/panel/result/account" method="post">
                <div class="col d-flex flex-column">
                  <div class="card-body">
                    <h2 class="mb-4">My Account</h2>
                    <h3 class="card-title">Profile Details</h3>
                    <div class="row align-items-center">
                      <div class="col-auto"><span class="avatar avatar-xl"
                          style="background-image: url(/static/avatars/<?= $admin['image'] ?>)"></span>
                      </div>
                      <h3>Change avatar</h3>
                      <div class="col-auto btn"><input type="file" name="image"></div>
                    </div>
                    <h3 class="card-title mt-4">Profile</h3>
                    <div class="row g-3">
                      <div class="col-md">
                        <div class="form-label">Name</div>
                        <input type="text" class="form-control" value="<?= $admin['name'] ?>" name="name">
                      </div>
                      <div class="col-md">
                        <div class="form-label">Username</div>
                        <input type="text" class="form-control" value="<?= $admin['username'] ?>" name="username">
                      </div>
                      <div class="col-md">
                        <div class="form-label">Email</div>
                        <input type="email" class="form-control" value="<?= $admin['email'] ?>" name="email">
                      </div>
                    </div>
                    <h3 class="card-title mt-4">Password</h3>
                    <p class="card-subtitle">You have to fill this field to update your account</p>
                    <input type="password" class="form-control" name="password" placeholder="Password">

                    <h3 class="card-title mt-4">New Password</h3>
                    <p class="card-subtitle"></p>
                    <input type="password" class="form-control" name="new_password">

                    <h3 class="card-title mt-4">Reply New Password</h3>
                    <p class="card-subtitle"></p>
                    <input type="password" class="form-control" name="new_password2">

                  </div>
                  <div class="card-footer bg-transparent mt-auto">
                    <div class="btn-list justify-content-end">
                      <a href="/panel" class="btn">
                        Cancel
                      </a>
                      <button type="submit" class="btn btn-primary">
                        Submit
                      </button>
                    </div>
                  </div>
                </div>
              </form>
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