<?php
$head_title="User Management";
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
            <h3>User Management</h3>
          </header>

          <div class="w3-container w3-padding">
            <div class="w3-table-responsive">
            <div class="w3-container">
              <table class="w3-table w3-border w3-bordered w3-striped" id="dt" cellspacing="0" width="100%">
                <thead>
                  <tr class="w3-theme-l1">
                    <th>#</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Access</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $sql="SELECT * FROM app_user";
                $result=$db->query($sql);
                $i=0;
                foreach($result as $r):
                ?>
                  <tr>
                    <th scope="row"><?php echo ++$i;?></th>
                    <td><?php echo $r['username'];?></td>
                    <td><?php echo $r['email'];?></td>
                    <td><?php echo $r['level'];?></td>
                    <td><?php echo $r['access'];?></td>
                    <td><input type='checkbox' id='chk[<?php echo $r['id_user'];?>]' <?php echo ($r['status']=='1'?' checked':'');?> readonly><?php echo ($r['status']!='1'?'not':'');?> active</td>
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