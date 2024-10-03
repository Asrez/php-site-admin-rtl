<!doctype html>>
<html lang="en" dir="rtl">
  <head>
    <title>Post <?= $post['id'] ?></title>
    <?php include "Init/style.php" ?>
  </head>
  <body >
    <div class="page">
    <?php include "Includes/header.php" ?>
      <div class="page-wrapper">
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                <?= $post['title'] ?>
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Post info</h3>
              </div>
              <div class="card-body">
                <div class="datagrid">
                  <div class="datagrid-item">
                    <div class="datagrid-title">Title</div>
                    <div class="datagrid-content"><?= $post['title'] ?></div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">content</div>
                    <div class="datagrid-content"><?= $post['content'] ?></div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Image</div>
                    <div class="datagrid-content">
                      <div class="d-flex align-items-center">
                        <span class="avatar avatar-xs me-2 avatar-rounded" style="background-image: url(../../static/photos/<?= $post['image'] ?>)"></span>
                        <?= $post['title'] ?>
                      </div>
                    </div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Date</div>
                    <div class="datagrid-content"><?= date($post['date']) ?></div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">View count</div>
                    <div class="datagrid-content">
                    <?= $post['viewcount'] ?>
                    </div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">status</div>
                    <div class="datagrid-content">
                      <?php if ($post['state'] === 1) echo "confirmed"; else echo "not confirmed" ; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include "Includes/footer.php" ?>
    </div>
  </div>
  <?php include "Init/modals.php" ?>
  <?php include "Init/script.php" ?>
  </body>
</html>