<?php 
$head_css="
<link rel='stylesheet' href='css/datatables.bootstrap4.min.css'>
";
$head_js="
<script src='js/datatables.min.js'></script>
<script src='js/datatables.w3css.js'></script>";
include 'inc/header.php';?>
    <div class="w3-container">
      <div class="w3-row">
        <div class="w3-col s12 m12 l12">
          <div class="w3-card-4 w3-margin-top">
            
          <header class="w3-container w3-theme-d2 w3-center">
            <h3>Responsive DataTables</h3>
          </header>

          <div class="w3-container w3-padding">
            <div class="w3-table-responsive">
            <div class="w3-container">
              <table class="w3-table w3-border w3-bordered" id="dt" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Birdthday</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>12 Dec '75</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>3 Jun '82</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>7 Feb '78</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>7 Feb '78</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>7 Feb '78</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>7 Feb '78</td>
                  </tr>                  
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
<?php include 'inc/footer.php';?>