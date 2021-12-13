<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<head>
	<title>HERCA PHP</title>
</head>
<body>
	<div class="container" style="padding-top: 50px">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>Customer ID</th>
					<th>Customer Name</th>
					<th>Province</th>
					<th>City</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include 'koneksi.php';
				$no = 1;
				$data = mysqli_query($koneksi,"SELECT c.id as customer_id, c.name as customer_name, p.name as province, i.name as city FROM `customer` as c LEFT JOIN(SELECT * FROM province)p ON c.province_id=p.id LEFT JOIN(SELECT * FROM city)i ON c.city=i.id");
				while($d = mysqli_fetch_array($data)){
					?>
					<tr>
						<td><?php echo $d['customer_id']; ?></td>
						<td><?php echo $d['customer_name']; ?></td>
						<td><?php echo $d['province']; ?></td>
						<td><?php echo $d['city']; ?></td>
					</tr>
					<?php 
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>