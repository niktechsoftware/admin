      <div class="layout-content">
        <div class="layout-content-body">
          <div class="row gutter-xs">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions" style="top: 35%;">
                    <a class="btn btn-sm btn-labeled arrow-primary" href="<?= base_url() ?>newbranch.html">
                      <span class="btn-label">
                        <span class="icon icon-plus-square icon-lg icon-fw"></span>
                      </span>
                      New Branch
                    </a>
                    <a class="btn btn-sm btn-labeled arrow-info" onclick="window.history.back();" href="#">
                      <span class="btn-label">
                        <span class="icon icon-arrow-circle-left icon-lg icon-fw"></span>
                      </span>
                      Back
                    </a>
                  </div>
                  <strong>All Branch</strong>
                </div>
                <div class="card-body">
                  <div class="card-body" data-toggle="match-height">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Address</th>
                          <th>City</th>
                          <th>State</th>
                          <th>Pin</th>
                          <th>Phone</th>
                          <th>Fax</th>
                          <th>Mobile</th>
                          <th>Email</th>
                          <!-- <th>FSD</th> -->
                          <th>Created</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($branchs as $key => $value): ?>
                          <tr>
                            <td><?= $value->id; ?></td>
                            <td><?= $value->title; ?></td>
                            <td><?= $value->address; ?></td>
                            <td><?= $value->city; ?></td>
                            <td><?= $value->state; ?></td>
                            <td><?= $value->pin; ?></td>
                            <td><?= $value->phone; ?></td>
                            <td><?= $value->fax; ?></td>
                            <td><?= $value->mobile; ?></td>
                            <td><?= $value->email; ?></td>
                            <td><?= $value->created; ?></td>
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
