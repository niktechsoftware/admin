      <div class="layout-content">
        <div class="layout-content-body">
          <div class="row gutter-xs">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions" style="top: 35%;">
                    <a class="btn btn-sm btn-labeled arrow-primary" href="<?= base_url() ?>newcommittee.html">
                      <span class="btn-label">
                        <span class="icon icon-plus-square icon-lg icon-fw"></span>
                      </span>
                      New Committee
                    </a>
                    <a class="btn btn-sm btn-labeled arrow-info" onclick="window.history.back();" href="#">
                      <span class="btn-label">
                        <span class="icon icon-arrow-circle-left icon-lg icon-fw"></span>
                      </span>
                      Back
                    </a>
                  </div>
                  <strong>All Committees</strong>
                </div>
                <div class="card-body">
                  <div class="card-body" data-toggle="match-height">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Branch</th>
                          <th>Head</th>
                          <th>Created</th>
                          <th>Settings</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($commitees as $key => $value): ?>
                          <tr>
                            <td><?= $value->id; ?></td>
                            <td><?= $value->title; ?></td>
                            <td><?= $value->branchTitle; ?></td>
                            <td><?= $value->name; ?></td>
                            <td><?= $value->created; ?></td>
                            <td>
                              <!-- <span class="icon icon-edit"></span>
                              &emsp;
                              <span class="icon icon-newspaper-o"></span> -->

                            <button>  <a href="<?php base_url();?>Settings/EditCommitee/<?= $value->id; ?>">Edit</a></button>
                             <button>  <a href="<?php base_url();?>Settings/deleteCommitee/<?= $value->id; ?>">Delete</a></button>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
