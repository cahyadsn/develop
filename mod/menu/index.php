<?php
$head_title="Menu Management";
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
            <h3>Menu Management</h3>
          </header>

          <div class="w3-container w3-padding">
            <div class="w3-table-responsive">
            <div class="w3-container">
              <div class="w3-row w3-padding">
                <button class='w3-button w3-theme-d3 w3-right btn_add_menu'>Add</button>
              </div>
              
              <table class="w3-table w3-border w3-bordered w3-striped" id="dt" cellspacing="0" width="100%">
                <thead>
                  <tr class="w3-theme-l1">
                    <th>#</th>
                    <th>Menu Name</th>
                    <th>Sort</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $sql="SELECT * FROM app_menu";
                $result=$db->query($sql);
                $i=0;
                foreach($result as $r):
                ?>
                  <tr>
                    <th scope="row"><?php echo ++$i;?></th>
                    <td><?php echo $r['name'];?></td>
                    <td><?php echo $r['sort'];?></td>
                    <td>
                      <a href='mod/menu/form.php?id=<?php echo $r['id_menu']?>' class='w3-btn w3-small w3-blue'><i class='fa fa-pencil'></i></a>
                      <a href='#<?php echo $r['id_menu']?>' class='w3-btn w3-small w3-red'><i class='fa fa-trash'></i></a>
                      </td>
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
$('#dt').DataTable({});
$('.btn_add_menu').on('click',function(){
  location.href='mod/menu/form.php';
});
";
?>
<?php include '../../inc/footer.php';?>