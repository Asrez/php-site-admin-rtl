<!doctype html>

<html lang="en" dir="rtl">

<head>
  <title>Users</title>
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
                Users
              </h2>
              <div class="text-muted mt-1"> <?= $user_count ?> Users, <?= $admin_count ?> Admins</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
              <div class="d-flex">
                <form method="get" action="/panel/search/users">
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
          <div class="row row-cards">
            <?php foreach ($users as $user) { ?>
                <div class="col-md-6 col-lg-3">
                  <div class="card">
                    <div class="card-body p-4 text-center">
                      <span class="avatar avatar-xl mb-3 avatar-rounded"
                        style="background-image: url(/static/avatars/<?= $user['image'] ?>)"></span>
                      <h3 class="m-0 mb-1"><a href="/panel/users/<?= $user['id'] ?>"><?= $user['name'] ?></a></h3>
                      <div class="text-muted"><?= $user['username'] ?></div>
                      <div class="mt-3">
                        <span class="badge bg-purple-lt"><?php if ($user['state'] === 0) echo "User"; else echo "Admin"; ?></span>
                      </div>
                    </div>
                    <div class="d-flex">
                      <a class="card-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24"
                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                          stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <rect x="3" y="5" width="18" height="14" rx="2" />
                          <polyline points="3 7 12 13 21 7" />
                        </svg>
                        <?= $user['email'] ?></a>
                      <a href="/panel/users/<?= $user['id'] ?>" class="card-btn">
                        <?php if ($user['state'] === 0) { ?>
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="7" r="4" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                          </svg>
                        <?php } else { ?>
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            <path d="M16 11l2 2l4 -4" />
                          </svg>
                        <?php } ?>
                        <?php if ($user['state'] === 0)
                          echo "User";
                        else
                          echo "Admin" ?></a>
                      </div>
                    </div>
                  </div>
            <?php } ?>
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