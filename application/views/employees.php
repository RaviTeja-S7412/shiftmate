<?php
  $this->load->view('includes/header')
?>
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- page content starts -->
    <div class="page-content">
      <div class="header">Employees</div>
      <div class="container" style="margin-top:20px;">
        <div class="table-responsive">
          <table id="example" class="display" style="width:100%;">
            <thead>
                <tr>
                    <th>Sl.No</th>
                    <th>Employee Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Created date</th>
                    <!-- <th>Salary</th> -->
                </tr>
            </thead>
            <tbody>
              <? $users = $this->db->order_by("id","desc")->get_where("tbl_users", ["role"=>"employee", "status"=>"Active"])->result(); 
                 foreach($users as $k => $u){
              ?>
                  <tr>
                      <td><? echo ($k+1) ?></td>
                      <td><? echo $u->first_name." ".$u->last_name ?></td>
                      <td><? echo $u->mobile ?></td>
                      <td><? echo $u->email ?></td>
                      <td><? echo date("m-d-Y",strtotime($u->created_date)) ?></td>
                  </tr>
              <? } ?>    
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--  -->
    <!-- page content ends -->

    
<?php
  $this->load->view('includes/footer')
?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function(){
    $("#example").dataTable();
  })
</script>