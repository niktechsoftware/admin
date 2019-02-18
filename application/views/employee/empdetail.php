      <div class="layout-content">
        <div class="layout-content-body">
          <div class="row gutter-xs">
            <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                  <div class="card-actions" style="top: 35%;">
                    <a class="btn btn-sm btn-labeled arrow-primary" href="<?= base_url() ?>newemploye.html">
                      <span class="btn-label">
                        <span class="icon icon-plus-square icon-lg icon-fw"></span>
                      </span>
                      New Employee
                    </a>
                    <a class="btn btn-sm btn-labeled arrow-info" onclick="window.history.back();" href="#">
                      <span class="btn-label">
                        <span class="icon icon-arrow-circle-left icon-lg icon-fw"></span>
                      </span>
                      Back
                    </a>
                  </div>
                  <strong>All Employes</strong>
                </div>
                <div class="card-body">
                  <div class="card-body" data-toggle="match-height">
                     <div class="panel-scroll table-responsive">
                    <table class="table table-striped table-hover center" id="empdetail">
                    
                      <thead>
                        <tr>
                          <th>Employee Code</th>
                          <th>Name</th>
                          <th>Father</th>
                          <th>Status</th>
                          <th>Address</th>
                          <th>Employee Post</th>
                          <th>Mobile</th>
                          <th>Email</th>
                          <th>Aadhar No</th>
                          <th>Created</th>
                          <th>Detail</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($abc as $value): ?>
                          <tr>
                            <td><?= $value->id; ?></td>
                            <td><?= $value->name; ?></td>
                            <td><?= $value->fatherName; ?></td>
                            <td><?= $value->activeStatus == 1 ? 'Active' : 'Deactive'; ?></td>
                            <td><?= $value->address; ?></td>
                            <td><?= $value->emp_designation; ?></td>
                            <td><?= $value->mobile; ?></td>
                            <td><?= $value->email; ?></td>
                            <td><?= $value->aadharNo; ?></td>
                            <td><?= date("d-M-Y (H:i:s A)", strtotime($value->created)); ?></td>
                            <td><a class="btn btn-primary" href="<?= base_url() ?>employee/<?= $value->id ?>">Detail</a></td>
                            <td><a class="btn btn-success" href="<?= base_url() ?>employeeEdit/<?= $value->id ?>">Edit</a></td>
                            <td><a class="btn btn-danger"  href="<?= base_url() ?>employee/employeeDelete/<?= $value->id ?>" onclick="return confirm('Are you sure')">Delete</a></td>
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
    
