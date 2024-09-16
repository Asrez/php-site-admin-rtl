<!doctype html>

<html lang="en" dir="rtl">
  <head>
    <title>Posts</title>
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
                  Posts
                </h2>
                <div class="text-muted mt-1"><?= $post_count ?> : All Posts </div>
                <div class="text-muted mt-1"><?= $not_confirmed_pages ?> : Not Confirmed Posts </div>
              </div>
              <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                  <form method="get" action="/panel/search/posts">
                    <input type="search" name="search" class="form-control d-inline-block w-9 me-3" placeholder="Search Post…"/>
                  </form>                  <a data-bs-toggle="modal" data-bs-target="#modal-report" class="btn btn-primary">
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
            <div class="row row-cards">
              <?php foreach ($posts as $post) { ?>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-body p-4 text-center">
                    <span class="avatar avatar-xl mb-3 " style="background-image: url(/static/photos/<?= $post['image'] ?>)"></span>
                    <h3 class="m-0 mb-1"><a href="#"><?= $post['title'] ?></a></h3>
                    <div class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M12 19c-4 0 -7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7c-.42 .736 -.858 1.414 -1.311 2.033" /><path d="M15 19l2 2l4 -4" /></svg>
                    <?= $post['viewcount'] ?></div>
                    <div class="mt-3">
                      <span class="badge bg-purple-lt"><?= $post['date'] ?></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <a class="card-btn" data-bs-toggle="modal" data-bs-target="#modal-simple<?= $post['id'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="4" width="18" height="16" rx="2" /><path d="M7 8h10" /><path d="M7 12h10" /><path d="M7 16h10" /></svg>
                    Content</a>
                    <a class="card-btn">
                    <?php if($post['state'] === 0) {?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l3 -3m2 -2l1 -1" /><path d="M9.148 9.145a0.498 .498 0 0 0 .352 .855a0.5 .5 0 0 0 .35 -.142" /><path d="M14.148 14.145a0.498 .498 0 0 0 .352 .855a0.5 .5 0 0 0 .35 -.142" /><path d="M5.641 5.631a9 9 0 1 0 12.719 12.738m1.68 -2.318a9 9 0 0 0 -12.074 -12.098" /><path d="M3 3l18 18" /></svg>
                        <?php } else { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7c.412 .41 .97 .64 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1c0 .58 .23 1.138 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1" /><path d="M9 12l2 2l4 -4" /></svg>
                        <?php } ?></a>
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