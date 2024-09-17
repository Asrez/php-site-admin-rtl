<!doctype html>
<html lang="en" dir="rtl">
  <head>
    <title>Manage Comments</title>
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
                  Manage Comments
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
                    <?php foreach ($comments as $comment) { ?>
                    <div class="list-group-item">
                      <div class="row g-6 align-items-center">
                        <div class="col-auto fs-3">
                          <?= $comment['id'] ?>
                        </div>
                        <div class="col">
                          <div class="text-muted">
                          <?= $comment['title'] ?>
                          </div>
                        </div>
                        <div class="col-auto text-muted">
                        <?= $comment['text'] ?>
                        </div>
                        <div class="col-auto text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <rect x="4" y="5" width="16" height="16" rx="2" />
                            <line x1="16" y1="3" x2="16" y2="7" />
                            <line x1="8" y1="3" x2="8" y2="7" />
                            <line x1="4" y1="11" x2="20" y2="11" />
                            <line x1="11" y1="15" x2="12" y2="15" />
                            <line x1="12" y1="15" x2="12" y2="18" />
                          </svg>
                        <?= $comment['date'] ?>
                        </div>
                        <div class="col-auto">
                          <a  class="link-secondary">
                            <button class="switch-icon" >
                              <span class="text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                                <line x1="8" y1="9" x2="16" y2="9" />
                                <line x1="8" y1="13" x2="14" y2="13" />
                                </svg>      
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
                                <?php if ($comment['state'] === 0) { ?>
                              <a class="dropdown-item" href="#">
                                Confirm
                              </a>
                              <?php } ?>
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