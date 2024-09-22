<!doctype html>
<html lang="en" dir="rtl">

<head>
  <title><?= $title['value_setting']; ?></title>
  <?php include "Init/style.php"; ?>
</head>

<body>
  <?php include "Includes/header.php"; ?>
  <div class="page">
    <div class="page-wrapper">
      <div class="page-header d-print-none">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <div class="col">
              <div class="page-pretitle">
                Dashboard
              </div>
              <h2 class="page-title">
                <?= $title['value_setting']; ?>
              </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
              <div class="btn-list">
                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                  data-bs-target="#modal-report">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                  </svg>
                  Create New Post
                </a>
                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                  data-bs-target="#modal-report" aria-label="Create new report">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="page-body">
        <div class="container-xl">
          <div class="row row-deck row-cards">
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="ms-auto lh-1">
                      <div class="dropdown">
                        <a class="text-muted">Not Confirmed Post</a>
                      </div>
                    </div>
                  </div>
                  <div class="h1 mb-3"><?= $not_confirmed_percent ?>%</div>
                  <div class="progress progress-sm">
                    <div class="progress-bar bg-primary" style="width: <?= $not_confirmed_percent ?>%"
                      role="progressbar" aria-valuenow="<?= $not_confirmed_percent ?>" aria-valuemin="0"
                      aria-valuemax="100" aria-label="75% Complete">
                      <span class="visually-hidden">75% Complete</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="ms-auto lh-1">
                      <div class="dropdown">
                        <a class="text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">User In This Month</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="chart-revenue-bg" class="chart-sm"></div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="ms-auto lh-1">
                      <div class="dropdown">
                        <a class="text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">Not Confirmed Comments</a>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex align-items-baseline">
                    <div class="h1 mb-3 me-2"><?= $comment_count ?></div>
                    <div class="me-auto">
                      <span class="text-yellow d-inline-flex align-items-center lh-1">
                        <?= $not_confirmed_comment_percent ?>%
                      </span>
                    </div>
                  </div>
                  <div id="chart-new-clients" class="chart-sm"></div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="ms-auto lh-1">
                      <div class="dropdown">
                        <a class=" text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">View Count Post</a>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex align-items-baseline">
                    <div class="h1 mb-3 me-2"><?= $post_count ?></div>
                  </div>
                  <div id="chart-active-users" class="chart-sm"></div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="row row-cards">
                <div class="col-sm-6 col-lg-3">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-black text-white avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                              viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" />
                              <path d="M10 16h6" />
                              <circle cx="13" cy="11" r="2" />
                              <path d="M4 8h3" />
                              <path d="M4 12h3" />
                              <path d="M4 16h3" />
                            </svg>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-medium">
                            <?= $post_count ?> Posts
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-green text-white avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                              <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                              <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                              <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                            </svg>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-medium">
                            <?= $user_count ?> Users
                          </div>
                          <div class="text-muted">
                            <?= $admin_count ?> Admins
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-pink text-white avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                              viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <rect x="4" y="5" width="16" height="16" rx="2" />
                              <line x1="16" y1="3" x2="16" y2="7" />
                              <line x1="8" y1="3" x2="8" y2="7" />
                              <line x1="4" y1="11" x2="20" y2="11" />
                              <line x1="11" y1="15" x2="12" y2="15" />
                              <line x1="12" y1="15" x2="12" y2="18" />
                            </svg>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-medium">
                            <?= $comment_count ?> Comments
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-red text-white avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                              viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <circle cx="12" cy="12" r="2" />
                              <path
                                d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                            </svg>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-medium">
                            <?= $view_count ?> View Count
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row row-cards">
                <div class="col-12">
                  <div class="card" style="height: 28rem">
                    <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                      <div class="divide-y">
                        <?php foreach ($users as $user) { ?>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar"
                                  style="background-image: url(../../static/avatars/<?= $user['image'] ?>)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  Name : <strong><?= $user['name'] ?></strong> Username :
                                  <strong><?= $user['username'] ?></strong>
                                </div>
                                <div class="text-muted"><?= date($user['date']) ?></div>
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
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="card-title">Your activities in this recent month</div>
                </div>
                <div class="position-relative">
                  <div class="position-absolute top-0 left-0 px-3 mt-1 w-75">
                    <div class="row g-2">
                      <div class="col-auto">
                        <div class="chart-sparkline chart-sparkline-square" id="sparkline-activity"></div>
                      </div>
                    </div>
                  </div>
                  <div id="chart-development-activity"></div>
                </div>
                <table class="table table-vcenter">
                  <thead>
                    <tr>
                      <th class="w-1">Admin</th>
                      <th class="td-truncate">Post</th>
                      <th class="text-nowrap text-muted">Date</th>
                    </tr>
                  </thead>
                </table>
                <div class="card-table table-responsive" style="overflow:auto; max-height: 200px;">
                  <table class="table table-vcenter">
                    <tbody>
                      <?php foreach ($admin_activity as $activity) { ?>
                        <tr>
                          <td class="w-1">
                            <span class="avatar avatar-sm"
                              style="background-image: url(../../static/avatars/<?= $activity['userimage'] ?>)"></span>
                            <?= $activity['username'] ?>
                          </td>
                          <td class="td-truncate">
                            <a href="/panel/posts/<?= $activity['post_id'] ?>">
                              <div class="text-truncate">
                                <?= $activity['title'] ?>
                              </div>
                            </a>
                          </td>
                          <td class="text-nowrap text-muted"><?= date($activity['date']) ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card card-md">
                <div class="card-stamp card-stamp-lg">
                  <div class="card-stamp-icon bg-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path
                        d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                      <line x1="10" y1="10" x2="10.01" y2="10" />
                      <line x1="14" y1="10" x2="14.01" y2="10" />
                      <path d="M10 14a3.5 3.5 0 0 0 4 0" />
                    </svg>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Most Visited Posts</h3>
                </div>
                <div class="card-table table-responsive">
                  <table class="table table-vcenter">
                    <thead>
                      <tr>
                        <th>Post Address</th>
                        <th>Post Name</th>
                        <th>Visitors</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tr>
                      <?php foreach ($most_visit_pages as $page) { ?>
                        <td>
                          /panel/posts/<?= $page['id'] ?>
                          <a href="/panel/posts/<?= $page['id'] ?>" class="ms-1" aria-label="Open website">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                              viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" />
                              <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" />
                            </svg>
                          </a>
                        </td>
                        <td class="text-muted"><?= $page['title'] ?></td>
                        <td class="text-muted"><?= $page['viewcount'] ?></td>
                        <td class="text-muted"><?= date($page['date']) ?></td>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <a href="/" class="card card-sponsor" target="_blank" rel="noopener"
                style="background-image: url(/static/sponsor-banner-homepage.svg)" aria-label="Sponsor Tabler!">
                <div class="card-body"></div>
              </a>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tables</h3>
                </div>
                <table class="table card-table table-vcenter">
                  <thead>
                    <tr>
                      <th>Table</th>
                      <th colspan="2">Count</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Posts</td>
                      <td><?= $post_count ?></td>
                      <td class="w-50">
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-primary" style="width: <?= $post_count ?>%"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Users</td>
                      <td><?= $user_count ?></td>
                      <td class="w-50">
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-primary" style="width: <?= $user_count ?>%"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Admins</td>
                      <td><?= $admin_count ?></td>
                      <td class="w-50">
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-primary" style="width: <?= $admin_count ?>%"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Comments</td>
                      <td><?= $comment_count ?></td>
                      <td class="w-50">
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-primary" style="width: <?= $comment_count ?>%"></div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-12 col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tasks</h3>
                </div>
                <div class="table-responsive">
                  <table class="table card-table table-vcenter">
                    <?php foreach ($not_confirmed_pages as $page) { ?>
                      <tr>
                        <td class="text-nowrap" title="Post" data-bs-toggle="modal"
                          data-bs-target="#modal-simple<?= $page['id'] ?>">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" />
                            <path d="M10 16h6" />
                            <circle cx="13" cy="11" r="2" />
                            <path d="M4 8h3" />
                            <path d="M4 12h3" />
                            <path d="M4 16h3" />
                          </svg>
                        </td>
                        <td class="w-1 pe-0">
                          <span class="dropdown">
                            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport"
                              data-bs-toggle="dropdown">Actions</button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/panel/result/post/confirm/<?= $page['id'] ?>">
                                Confirm
                              </a>
                              <a class="dropdown-item" href="/panel/result/post/delete/<?= $page['id'] ?>">
                                Delete
                              </a>
                            </div>
                          </span>
                        </td>
                        <td class="w-100">
                          <a href="/panel/posts/<?= $page['id'] ?>" class="text-reset"><?= $page['title'] ?></a>
                        </td>
                        <td class="text-nowrap text-muted">
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
                          <?= date($page['date']) ?>
                        </td>
                        <td>
                          <span class="avatar avatar-sm"
                            style="background-image: url(../../static/photos/<?= $page['image'] ?>)"></span>
                        </td>
                      </tr>
                    <?php } ?>
                    <?php foreach ($Not_Confirmed_Comment as $comment) { ?>
                      <tr>
                        <td class="text-nowrap" title="Comment">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                            <line x1="8" y1="9" x2="16" y2="9" />
                            <line x1="8" y1="13" x2="14" y2="13" />
                          </svg>
                        </td>
                        <td class="w-1 pe-0">
                          <span class="dropdown">
                            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport"
                              data-bs-toggle="dropdown">Actions</button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/panel/result/comment/confirm/<?= $comment['id'] ?>">
                                Confirm
                              </a>
                              <a class="dropdown-item" href="/panel/result/comment/delete/<?= $comment['id'] ?>">
                                Delete
                              </a>
                            </div>
                          </span>
                        </td>
                        <td class="w-100"><?= $comment['comment'] ?>
                        </td>
                        <td class="text-nowrap text-muted">
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
                          <?= date($comment['date']) ?>
                        </td>
                        <td></td>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Posts</h3>
                </div>
                <div class="card-body border-bottom py-3">
                  <div class="d-flex">
                    <div class="ms-auto text-muted">
                      Search:
                      <div class="ms-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                      <tr>
                        <th class="w-1">Code
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="6 15 12 9 18 15" />
                          </svg>
                        </th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>State</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($posts as $post) { ?>
                        <tr>
                          <td><span class="text-muted"><?= $post['id'] ?></span></td>
                          <td><a class="text-reset" tabindex="-1" data-bs-toggle="modal"
                              data-bs-target="#modal-simple<?= $post['id'] ?>"><?= $post['title'] ?></a></td>
                          <td>
                            <span class="flag "
                              style="background-image:url(../static/photos/<?= $post['image'] ?>)"></span>
                          </td>
                          <td>
                            <?= date($post['date']) ?>
                          </td>
                          <td><span class="badge bg-<?php if ($post['state'] === 1)
                            echo "success";
                          else
                            echo "warning"; ?> me-1"></span>
                            <?php if ($post['state'] === 0)
                              echo "Not Confirmed";
                            else
                              echo "Confirmed" ?>
                            </td>
                            <td class="text-end">
                              <span class="dropdown">
                                <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport"
                                  data-bs-toggle="dropdown">Actions</button>
                                <div class="dropdown-menu dropdown-menu-end">
                                  <a class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#modal-small<?= $post['id'] ?>">
                                  Delete
                                </a>
                                <?php if ($post['state'] === 1) { ?>
                                  <a class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#modal-report-update<?= $post['id'] ?>">
                                    Update
                                  </a>
                                <?php } ?>
                                <?php if ($post['state'] === 0) { ?>
                                  <a class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#modal-success<?= $post['id'] ?>">
                                    Confirm
                                  </a>
                                <?php } ?>
                              </div>
                            </span>
                          </td>
                        </tr>
                        <div class="modal modal-blur fade" id="modal-small<?= $post['id'] ?>" tabindex="-1" role="dialog"
                          aria-hidden="true">
                          <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-body">
                                <div class="modal-title">Delete Post <?= $post['title'] ?></div>
                                <div>Are you sure?</div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-link link-secondary me-auto"
                                  data-bs-dismiss="modal">Cancel</button>
                                <a href="/panel/result/post/delete/<?= $post['id'] ?>" class="btn btn-danger">Yes,
                                  delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal modal-blur fade" id="modal-simple<?= $post['id'] ?>" tabindex="-1" role="dialog"
                          aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title"><?= $post['title'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
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
                        <div class="modal modal-blur fade" id="modal-success<?= $post['id'] ?>" tabindex="-1"
                          role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              <div class="modal-status bg-success"></div>
                              <div class="modal-body text-center py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24"
                                  height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                  stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                  <circle cx="12" cy="12" r="9" />
                                  <path d="M9 12l2 2l4 -4" />
                                </svg>
                                <h3 dir="ltr">do you want to confirm `<?= $post['title'] ?>` post ?</h3>
                                <div class="modal-footer">
                                  <div class="w-100">
                                    <div class="row">
                                      <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                          Cancel
                                        </a></div>
                                      <div class="col"><a href="/panel/result/post/confirm/<?= $post['id'] ?>"
                                          class="btn btn-success w-100">
                                          Yes
                                        </a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal modal-blur fade" id="modal-report-update<?= $post['id'] ?>" tabindex="-1"
                          role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <form method="post" action="/panel/result/post/Update/<?= $post['id'] ?>"
                              enctype="multipart/form-data">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Update Post</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Your post title"
                                      value="<?= $post['title'] ?>">
                                  </div>
                                  <label class="form-label"></label>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image">
                                      </div>
                                    </div>
                                    <div class="col-lg-12">
                                      <div>
                                        <label class="form-label">Content</label>
                                        <textarea class="form-control" rows="3" name="content"
                                          placeholder="write content..."><?= $post['content'] ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <a class="btn btn-link link-secondary" data-bs-dismiss="modal" aria-label="Close">
                                    Cancel
                                  </a>
                                  <button type="submit" name="btn_update_post" class="btn btn-primary ms-auto">
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
                    </tbody>
                  </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                  <p class="m-0 text-muted">Showing <?= $post_count ?></span> Posts</p>
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

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
        chart: {
          type: "area",
          fontFamily: 'inherit',
          height: 40.0,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: .16,
          type: 'solid'
        },
        stroke: {
          width: 2,
          lineCap: "round",
          curve: "smooth",
        },
        series: [{
          name: "Profits",
          data: <?php print_r(json_encode($user_chart_count)); ?>
        }],
        tooltip: {
          theme: 'dark'
        },
        grid: {
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0,
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          type: 'datetime',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: <?php print_r(json_encode($user_chart_date)); ?>,
        colors: [tabler.getColor("primary")],
        legend: {
          show: false,
        },
      })).render();
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
        chart: {
          type: "line",
          fontFamily: 'inherit',
          height: 40.0,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        fill: {
          opacity: 1,
        },
        stroke: {
          width: [2, 1],
          dashArray: [0, 3],
          lineCap: "round",
          curve: "smooth",
        },
        series: [{
          name: "Post Id",
          data: <?php print_r(json_encode($AllComments['comment_post_id'])); ?>
        }, {
          name: "Title",
          data: <?php print_r(json_encode($AllComments["comment_title"])); ?>
        }],
        tooltip: {
          theme: 'dark'
        },
        grid: {
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0,
          },
          tooltip: {
            enabled: false
          },
          type: 'datetime',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: <?php print_r(json_encode($AllComments["comment_user_id"])); ?>,
        colors: [tabler.getColor("primary"), tabler.getColor("gray-600")],
        legend: {
          show: false,
        },
      })).render();
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
        chart: {
          type: "bar",
          fontFamily: 'inherit',
          height: 40.0,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        plotOptions: {
          bar: {
            columnWidth: '50%',
          }
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: 1,
        },
        series: [{
          name: "Profits",
          data: <?php print_r(json_encode($view_count_chart)); ?>
        }],
        tooltip: {
          theme: 'dark'
        },
        grid: {
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0,
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          type: 'datetime',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: <?php print_r(json_encode($title_chart)); ?>,
        colors: [tabler.getColor("primary")],
        legend: {
          show: false,
        },
      })).render();
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
        chart: {
          type: "bar",
          fontFamily: 'inherit',
          height: 240,
          parentHeightOffset: 0,
          toolbar: {
            show: false,
          },
          animations: {
            enabled: false
          },
          stacked: true,
        },
        plotOptions: {
          bar: {
            columnWidth: '50%',
          }
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: 1,
        },
        series: [{
          name: "Web",
          data: [1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2, 12, 5, 8, 22, 6, 8, 6, 4, 1, 8, 24, 29, 51, 40, 47, 23, 26, 50, 26, 41, 22, 46, 47, 81, 46, 6]
        }, {
          name: "Social",
          data: [2, 5, 4, 3, 3, 1, 4, 7, 5, 1, 2, 5, 3, 2, 6, 7, 7, 1, 5, 5, 2, 12, 4, 6, 18, 3, 5, 2, 13, 15, 20, 47, 18, 15, 11, 10, 0]
        }, {
          name: "Other",
          data: [2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5, 2, 8, 4, 9, 1, 2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1, 6]
        }],
        tooltip: {
          theme: 'dark'
        },
        grid: {
          padding: {
            top: -20,
            right: 0,
            left: -4,
            bottom: -4
          },
          strokeDashArray: 4,
          xaxis: {
            lines: {
              show: true
            }
          },
        },
        xaxis: {
          labels: {
            padding: 0,
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          type: 'datetime',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: [
          '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24', '2020-07-25', '2020-07-26'
        ],
        colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor("green", 0.8)],
        legend: {
          show: false,
        },
      })).render();
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const map = new jsVectorMap({
        selector: '#map-world',
        map: 'world',
        backgroundColor: 'transparent',
        regionStyle: {
          initial: {
            fill: tabler.getColor('body-bg'),
            stroke: tabler.getColor('border-color'),
            strokeWidth: 2,
          }
        },
        zoomOnScroll: false,
        zoomButtons: false,
        visualizeData: {
          scale: [tabler.getColor('bg-surface'), tabler.getColor('primary')],
          values: { "AF": 16, "AL": 11, "DZ": 158, "AO": 85, "AG": 1, "AR": 351, "AM": 8, "AU": 1219, "AT": 366, "AZ": 52, "BS": 7, "BH": 21, "BD": 105, "BB": 3, "BY": 52, "BE": 461, "BZ": 1, "BJ": 6, "BT": 1, "BO": 19, "BA": 16, "BW": 12, "BR": 2023, "BN": 11, "BG": 44, "BF": 8, "BI": 1, "KH": 11, "CM": 21, "CA": 1563, "CV": 1, "CF": 2, "TD": 7, "CL": 199, "CN": 5745, "CO": 283, "KM": 0, "CD": 12, "CG": 11, "CR": 35, "CI": 22, "HR": 59, "CY": 22, "CZ": 195, "DK": 304, "DJ": 1, "DM": 0, "DO": 50, "EC": 61, "EG": 216, "SV": 21, "GQ": 14, "ER": 2, "EE": 19, "ET": 30, "FJ": 3, "FI": 231, "FR": 2555, "GA": 12, "GM": 1, "GE": 11, "DE": 3305, "GH": 18, "GR": 305, "GD": 0, "GT": 40, "GN": 4, "GW": 0, "GY": 2, "HT": 6, "HN": 15, "HK": 226, "HU": 132, "IS": 12, "IN": 1430, "ID": 695, "IR": 337, "IQ": 84, "IE": 204, "IL": 201, "IT": 2036, "JM": 13, "JP": 5390, "JO": 27, "KZ": 129, "KE": 32, "KI": 0, "KR": 986, "KW": 117, "KG": 4, "LA": 6, "LV": 23, "LB": 39, "LS": 1, "LR": 0, "LY": 77, "LT": 35, "LU": 52, "MK": 9, "MG": 8, "MW": 5, "MY": 218, "MV": 1, "ML": 9, "MT": 7, "MR": 3, "MU": 9, "MX": 1004, "MD": 5, "MN": 5, "ME": 3, "MA": 91, "MZ": 10, "MM": 35, "NA": 11, "NP": 15, "NL": 770, "NZ": 138, "NI": 6, "NE": 5, "NG": 206, "NO": 413, "OM": 53, "PK": 174, "PA": 27, "PG": 8, "PY": 17, "PE": 153, "PH": 189, "PL": 438, "PT": 223, "QA": 126, "RO": 158, "RU": 1476, "RW": 5, "WS": 0, "ST": 0, "SA": 434, "SN": 12, "RS": 38, "SC": 0, "SL": 1, "SG": 217, "SK": 86, "SI": 46, "SB": 0, "ZA": 354, "ES": 1374, "LK": 48, "KN": 0, "LC": 1, "VC": 0, "SD": 65, "SR": 3, "SZ": 3, "SE": 444, "CH": 522, "SY": 59, "TW": 426, "TJ": 5, "TZ": 22, "TH": 312, "TL": 0, "TG": 3, "TO": 0, "TT": 21, "TN": 43, "TR": 729, "TM": 0, "UG": 17, "UA": 136, "AE": 239, "GB": 2258, "US": 4624, "UY": 40, "UZ": 37, "VU": 0, "VE": 285, "VN": 101, "YE": 30, "ZM": 15, "ZW": 5 },
        },
      });
      window.addEventListener("resize", () => {
        map.updateSize();
      });
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-activity'), {
        chart: {
          type: "radialBar",
          fontFamily: 'inherit',
          height: 40,
          width: 40,
          animations: {
            enabled: false
          },
          sparkline: {
            enabled: true
          },
        },
        tooltip: {
          enabled: false,
        },
        plotOptions: {
          radialBar: {
            hollow: {
              margin: 0,
              size: '75%'
            },
            track: {
              margin: 0
            },
            dataLabels: {
              show: false
            }
          }
        },
        colors: [tabler.getColor("blue")],
        series: [<?php echo json_encode($all_my_post); ?>],
      })).render();
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
        chart: {
          type: "area",
          fontFamily: 'inherit',
          height: 192,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: .16,
          type: 'solid'
        },
        stroke: {
          width: 2,
          lineCap: "round",
          curve: "smooth",
        },
        series: [{
          name: "Purchases",
          data: <?php print_r(json_encode($post_chart_count)); ?>
        }],
        tooltip: {
          theme: 'dark'
        },
        grid: {
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0,
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          type: 'datetime',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: <?php print_r(json_encode($post_chart_date)); ?>,
        colors: [tabler.getColor("primary")],
        legend: {
          show: false,
        },
        point: {
          show: false
        },
      })).render();
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-1'), {
        chart: {
          type: "line",
          fontFamily: 'inherit',
          height: 24,
          animations: {
            enabled: false
          },
          sparkline: {
            enabled: true
          },
        },
        tooltip: {
          enabled: false,
        },
        stroke: {
          width: 2,
          lineCap: "round",
        },
        series: [{
          color: tabler.getColor("primary"),
          data: [17, 24, 20, 10, 5, 1, 4, 18, 13]
        }],
      })).render();
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-2'), {
        chart: {
          type: "line",
          fontFamily: 'inherit',
          height: 24,
          animations: {
            enabled: false
          },
          sparkline: {
            enabled: true
          },
        },
        tooltip: {
          enabled: false,
        },
        stroke: {
          width: 2,
          lineCap: "round",
        },
        series: [{
          color: tabler.getColor("primary"),
          data: [13, 11, 19, 22, 12, 7, 14, 3, 21]
        }],
      })).render();
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-3'), {
        chart: {
          type: "line",
          fontFamily: 'inherit',
          height: 24,
          animations: {
            enabled: false
          },
          sparkline: {
            enabled: true
          },
        },
        tooltip: {
          enabled: false,
        },
        stroke: {
          width: 2,
          lineCap: "round",
        },
        series: [{
          color: tabler.getColor("primary"),
          data: [10, 13, 10, 4, 17, 3, 23, 22, 19]
        }],
      })).render();
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-4'), {
        chart: {
          type: "line",
          fontFamily: 'inherit',
          height: 24,
          animations: {
            enabled: false
          },
          sparkline: {
            enabled: true
          },
        },
        tooltip: {
          enabled: false,
        },
        stroke: {
          width: 2,
          lineCap: "round",
        },
        series: [{
          color: tabler.getColor("primary"),
          data: [6, 15, 13, 13, 5, 7, 17, 20, 19]
        }],
      })).render();
    });
  </script>
</body>

</html>