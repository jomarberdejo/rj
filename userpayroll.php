<?php include('db_connect.php') ?>
			<div class="new">
				<div class="card">
					<div class="card-header">
						<span><b>Payroll List</b></span>
						
					</div>
					<div class="card-body">
						<table id="table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Ref No</th>
									<th>Date From</th>
									<th>Date To</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
									
									$payroll=$conn->query("SELECT * FROM payroll order by date(date_from) desc") or die(mysqli_error());
									while($row=$payroll->fetch_array()){
								?>
								<tr>
									<td><?php echo $row['ref_no']?></td>
									<td><?php echo date("M d, Y",strtotime($row['date_from'])) ?></td>
									<td><?php echo date("M d, Y",strtotime($row['date_to'])) ?></td>
									<?php if($row['status'] == 0): ?>
									<td class="text-center"><span class="badge badge-primary">New</span></td>
									<?php else: ?>
									<td class="text-center"><span class="badge badge-success">Calculated</span></td>
									<?php endif ?>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
<style>
	.row{
		display:flex;
		flex-wrap:nowrap;
	}	
	.card{
		background: #d1d3e0;
		
	}
	.new{
		padding:10px;
		/* width:100%;
		height:100%; */
		background: black;
		background-size:cover;
	}
	td, tr{
		background-color: #fafafa;
		vertical-align: middle !important;
	}

</style>
			
		
		
	<script type="text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){

			
			})
		
	</script>
