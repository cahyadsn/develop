<?php
$head_title="Menu Management";
$head_css="
<link rel='stylesheet' href='css/datatables.bootstrap4.min.css'>
";
$head_js="
<script src='js/datatables.min.js'></script>
<script src='js/datatables.w3css.js'></script>";
include '../../inc/header.php';
$id='';
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $sql="SELECT * FROM app_menu WHERE id_menu='{$id}'";
  $result=$db->query($sql);
  $r=$result->fetch_object();
}
?>
    <div class="w3-container">
      <div class="w3-row">
        <div class="w3-col s12 m12 l12">
          <div class="w3-card-4 w3-margin-top">
          <form class="w3-container w3-padding">
          <header class="w3-container w3-theme-d2 w3-center">
            <h3>Menu Management</h3>
          </header>
          <div class="w3-container w3-padding">
            <h1 class="w3-text-theme"><?php echo empty($id)?'Add':'Edit';?> Menu</h1>
            <input type='hidden' name='id_menu' id='id_menu' value='<?php echo $id;?>'>
            <div class="w3-row">
              <div class="w3-col s12 w3-padding">
                 <label class="w3-text-theme">Menu Name</label>
              </div>
              <div class="w3-col s12 w3-padding">
                <input class="w3-input w3-hover-theme w3-animate-input" type="text" value='<?php echo isset($r->name)?$r->name:'';?>' style='width:30%'>
              </div>
              <div class="w3-col s12 w3-padding">
                <label class="w3-text-theme">Sorting Number</label>
              </div>
              <div class="w3-col s12 w3-padding">
                <input class="w3-input w3-hover-theme w3-animate-input" type="text" value='<?php echo isset($r->sort)?$r->sort:'';?>' style='width:30%'>
              </div>
            </div>
          </div>
          <footer class='w3-container w3-theme-d1'>
            <div class="w3-row">
              <div class="w3-col s6 w3-padding">  
                <button class="w3-btn w3-bar w3-theme-d3">Add</button>
              </div>
              <div class="w3-col s6 w3-padding">
                <button class="w3-btn w3-bar w3-theme-l2">Cancel</button>
              </div>              
            </div>
          </footer>
          </form>
        </div>
      </div>
    </div>
<?php
$block_js= "

";
?>
<?php include '../../inc/footer.php';?>