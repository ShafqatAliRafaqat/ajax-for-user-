<html>
<head>
<?php
include('inc/connection.php');
error_reporting(0);
?>
<title> Mega Inventory </title>
<script src="assets/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/dist/sweetalert.css">
<script src="ajax.js"></script>


<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="#"></a>
</div>

<ul class="nav navbar-nav navbar-right">
<li><a href="#"><b>Mega Inventory</b> <span class="glyphicon glyphicon-log-in"></span></a></li>

</ul>
</div>
</nav>
</head>

<body>

<div class="container-fluid">

<div class="row" id="insertform">
<div class="col-sm-6">
<div class="panel panel-info">
<div class="panel-heading">Add product</div>

<div class="panel-body" id="">
<form class="form-horizontal"  action="javascript:savedata();" method="post">
<div class="form-group">
<label class="control-label col-sm-3" >Product Code:</label>
<div class="col-sm-9">
<input type="text" class="form-control" name="PCODE" id="PCODE" onchange= "checkpcode();" placeholder="Product Code" required>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Product Unit:</label>
<div class="col-sm-9">
<input type="text" class="form-control" name="PUNIT" id="PUNIT" placeholder="Product Unit" required>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Product Sale:</label>
<div class="col-sm-9">
<input type="text" class="form-control" name="PSALE" id="PSALE" placeholder="Product Sale" required>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Product Purchase:</label>
<div class="col-sm-9">
<input type="text" class="form-control" name="PPURCHASE" id="PPURCHASE" placeholder="Product Purchase" required>
</div>
</div>
<div class="col-sm-offset-3 col-sm-9">
<button type="submit" class="btn btn-success">Submit</button>
</div>
</form>

</div>
</div>
</div>

<div class="col-sm-6" >

<div class="panel panel-info">
<div class="panel-heading">Details of Products </div>
<div class="panel-body" id="fetchdata">
<table class="table table-hover table-responsive ">
<thead>
<tr>
<th class="collapse">Product Code</th>
<th>Product Unit</th>
<th>Product Sale</th>
<th>Product Purchase</th>
<th> Action</th>
</tr>
</thead>
<tbody >
<?php
$query ="select * FROM PRODUCT";

$result= mysqli_query($database,$query);
while($data= mysqli_fetch_array($result,MYSQLI_BOTH))
{
?>
<tr>
<td class="collapse"><?php echo $data['PRODUCTCODE'];?></td>
<td><?php echo $data['PRODUCTUNIT'];?></td>
<td><?php echo $data['PRODUCTSALE'];?></td>
<td><?php echo $data['PRODUCTPURCHASE'];?></td>
<td>
<div class="dropdown">
<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Actions</button>
<ul class="dropdown-menu">
<li>

<a type="button"  onclick="details (<?php echo $data['PRODUCTCODE'];?>)"  class="btn btn-info">
<span class="glyphicon glyphicon-eye-open"></span>
</a>

</li>
<li>



<a type="button" onclick= "editdata(<?php echo $data['PRODUCTCODE']; ?>);" class="btn btn-info">
<span class="glyphicon glyphicon-pencil"></span>
</a>
</li>
<li>
<a type="button" onclick= "deletedata(<?php echo $data['PRODUCTCODE'];  ?>);" class="btn btn-info">
<span class="glyphicon glyphicon-trash" ></span>
</a>
</li>
</ul>
</div>
</td>



</tr>
<?php }?>
</tbody>
</table>



<!-- Modal -->
<div id="myModal" class="modal" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Edit</h4>
</div>
<div class="modal-body" id="editform">
</div>

</div>

</div>
</div>







</div>
</div>

</div>

</div>
</div>
<?php
$a =$_GET['row'];
if($a == 'true')
{
?>
<script>
swal('Wellcome to Home');
</script>
<?php
}
?>



</body>

</html>