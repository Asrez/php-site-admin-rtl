<!doctype html>
<html lang="en" dir="rtl" >
  <head>
    <title><?= $title['value_setting']; ?></title>
    <?php include "Init/style.php"; ?>
  </head>
  <body >
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
                  <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                    Create New Post
                  </a>
                  <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
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
                          <a class="text-muted" >Not Confirmed Post</a>
                        </div>
                      </div>
                    </div>
                    <div class="h1 mb-3"><?= $not_confirmed_percent ?>%</div>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-primary" style="width: <?= $not_confirmed_percent ?>%" role="progressbar" aria-valuenow="<?= $not_confirmed_percent ?>" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
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
                          <a class="text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User In This Month</a>
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
                          <a class="text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Not Confirmed Comments</a>
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
                          <a class=" text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View Count Post</a>
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
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" /><path d="M10 16h6" /><circle cx="13" cy="11" r="2" /><path d="M4 8h3" /><path d="M4 12h3" /><path d="M4 16h3" /></svg>
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
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
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
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
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
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
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
                          <?php foreach($users as $user) { ?>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/<?= $user['image'] ?>)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  Name : <strong><?= $user['name'] ?></strong> Username : <strong><?= $user['username'] ?></strong>
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
                    <div class="card-title">Admins activity</div>
                  </div>
                  <div class="position-relative">
                    <div class="position-absolute top-0 left-0 px-3 mt-1 w-75">
                      <div class="row g-2">
                        <div class="col-auto">
                          <div class="chart-sparkline chart-sparkline-square" id="sparkline-activity"></div>
                        </div>
                        <div class="col">
                          <div>Today's Earning: $4,262.40</div>
                          <div class="text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                            +5% more than yesterday</div>
                        </div>
                      </div>
                    </div>
                    <div id="chart-development-activity"></div>
                  </div>
                  <div class="card-table table-responsive">
                    <table class="table table-vcenter">
                      <thead>
                        <tr>
                          <th>Admin</th>
                          <th>Post</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($admin_activity as $activity) { ?>
                        <tr>
                          <td class="w-1">
                            <span class="avatar avatar-sm" style="background-image: url(./static/avatars/<?= $activity['userimage'] ?>)"></span>
                            <?= $activity['username'] ?>
                          </td>
                          <td class="td-truncate">
                            <a href="/panel/post/<?= $activity['post_id'] ?>">
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
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" /><line x1="10" y1="10" x2="10.01" y2="10" /><line x1="14" y1="10" x2="14.01" y2="10" /><path d="M10 14a3.5 3.5 0 0 0 4 0" /></svg>
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
                          /panel/post/<?= $page['id'] ?>
                          <a href="/panel/post/<?= $page['id'] ?>" class="ms-1" aria-label="Open website">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
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
                <a href="/" class="card card-sponsor" target="_blank" rel="noopener" style="background-image: url(./static/sponsor-banner-homepage.svg)" aria-label="Sponsor Tabler!">
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
                      <td class="text-nowrap" title="Post">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" /><path d="M10 16h6" /><circle cx="13" cy="11" r="2" /><path d="M4 8h3" /><path d="M4 12h3" /><path d="M4 16h3" /></svg>
                      </td>
                        <td class="w-1 pe-0">
                        <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu">
                                  <a class="dropdown-item" href="/panel/result/post/confirm/<?= $page['id'] ?>" >
                                    Confirm
                                  </a>
                                  <a class="dropdown-item" href="/panel/result/post/delete/<?= $page['id'] ?>">
                                    Delete
                                  </a>
                              </div>
                            </span>
                        </td>
                        <td class="w-100">
                          <a href="/panel/post/<?= $page['id'] ?>" class="text-reset">Show Post <?= $page['title'] ?></a>
                        </td>
                        <td class="text-nowrap text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                          <?= date($page['date']) ?>
                        </td>
                        <td>
                          <span class="avatar avatar-sm" style="background-image: url(./static/photos/<?= $page['image'] ?>)"></span>
                        </td>
                      </tr>
                      <?php } ?>
                      <?php foreach ($Not_Confirmed_Comment as $comment) { ?>
                      <tr>
                        <td class="text-nowrap" title="Comment">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /><line x1="8" y1="9" x2="16" y2="9" /><line x1="8" y1="13" x2="14" y2="13" /></svg>
                        </td>
                        <td class="w-1 pe-0">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu">
                                  <a class="dropdown-item" href="/panel/result/comment/confirm/<?= $comment['id'] ?>" >
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
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="6 15 12 9 18 15" /></svg>
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
                          <td><a href="invoice.html" class="text-reset" tabindex="-1"><?= $post['title'] ?></a></td>
                          <td>
                            <span class="flag " style="background-image:url(../static/photos/<?= $post['image'] ?>)"></span>
                          </td>
                          <td>
                          <?= date($post['date']) ?>
                          </td>
                          <td><span class="badge bg-<?php if($post['state'] === 1) echo "success"; else echo "warning"; ?> me-1"></span> <?php if($post['state'] === 0) echo "Not Confirmed" ; else echo "Confirmed"?></td>
                          <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Delete
                                </a>
                                <a class="dropdown-item" href="#">
                                  Update
                                </a>
                                <?php if($post['state'] === 0) { ?>
                                  <a class="dropdown-item" href="#">
                                  Confirm
                                  </a>
                                <?php } ?>
                              </div>
                            </span>
                          </td>
                        </tr>
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
  </body>
</html>