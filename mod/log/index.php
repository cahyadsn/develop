<?php
$head_title="Log Management";
$head_css="
<link rel='stylesheet' href='css/datatables.bootstrap4.min.css'>
";
$head_js="
<script src='js/datatables.min.js'></script>
<script src='js/datatables.w3css.js'></script>";
include '../../inc/header.php';?>
    <div class="w3-container">
      <div class="w3-row">
        <div class="w3-col s12 m12 l12">
          <div class="w3-card-4 w3-margin-top">

          <header class="w3-container w3-theme-d2 w3-center">
            <h3>Log Management</h3>
          </header>

          <div class="w3-container w3-padding">
            <div class="w3-table-responsive">
            <div class="w3-container">
              <table class="w3-table w3-border w3-bordered w3-striped" id="dt" cellspacing="0" width="100%">
                <thead>
                  <tr class="w3-theme-l1">
                    <th>#</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>User</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $sql="SELECT a.*,b.username AS user FROM app_log a JOIN app_user b USING(id_user)";
                $result=$db->query($sql);
                $i=0;
                foreach($result as $r):
                ?>
                  <tr>
                    <th scope="row"><?php echo ++$i;?></th>
                    <td><?php echo $r['description'];?></td>
                    <td><?php echo $r['type'];?></td>
                    <td><?php echo $r['user'];?></td>
                    <td>edit|delete</td>
                  </tr>
                <?php endforeach;?>
                </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
$block_js= "
$('#dt').DataTable();
";
?>
<?php include '../../inc/footer.php';?>