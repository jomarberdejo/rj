<style>
table {
    width: 100%;
    border-collapse: collapse;
}

tr,
td,
th {
    border: 1px solid black;
}

.text-center {
    text-align: center;
}

.text-right {
    text-align: right;
}
</style>

<?php include('db_connect.php'); ?>

<?php

$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$query = "SELECT * FROM wages";


if ($id) {
    $query .= " WHERE id = $id";
}


$pay = $conn->query($query)->fetch_array();


if (!$pay) {
    echo "<p>No payroll record found.</p>";
    exit;
}

$pt = array(1 => "Monthly", 2 => "Semi-Monthly");
?>
<div>
    <!-- <h2 class="text-center">Payroll - <?php echo htmlspecialchars($pay['ref_no']); ?></h2> -->
    <hr>
</div>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th rowspan="2" class="text-center align-middle">No.</th>
            <th rowspan="2" class="text-center align-middle">Name</th>
            <th rowspan="2" class="text-center align-middle">Position</th>
            <th class="text-center" colspan="5">WAGES</th>
            <th rowspan="2" class="text-center align-middle">Tax Percentage</th>
            <th rowspan="2" class="text-center align-middle">Withholding Tax</th>
            <th rowspan="2" class="text-center align-middle">Net Amount Due</th>
            <th rowspan="2" class="text-center align-middle">Remarks</th>

        </tr>
        <tr>
            <th class="text-center align-middle">Number of minutes Worked <br> (OVERLOAD)</th>
            <th class="text-center align-middle">Rate per hour</th>
            <!-- <th class="text-center align-middle">Tardiness</th> -->
            <th class="text-center align-middle">Undertime</th>
            <th class="text-center align-middle">Overtime</th>
            <th class="text-center align-middle">GRAND TOTAL AMOUNT</th>
        </tr>
    </thead>
    <tbody>
        <?php
						$i = 1;
						$wages_info = $conn->query("
							SELECT wages.*, employee.fullname, employee.position
							FROM wages
							INNER JOIN employee ON wages.employee_id = employee.id
							ORDER BY wages.id ASC
						");
						while ($row = $wages_info->fetch_assoc()) :
						?>
        <tr>
            <td class="text-center"><?php echo $i++; ?></td>
            <td>
                <b><?php echo $row['fullname']; ?></b>
            </td>
            <td>
                <b><?php echo $row['position']; ?></b>
            </td>
            <td>
                <b><?php echo $row['no_of_hours']; ?></b>
            </td>
            <td>
                <b><?php echo $row['rate_per_hour']; ?></b>
            </td>
            <!-- <td>
									<b><?php echo $row['tardiness']; ?></b>
								</td> -->
            <td>
                <b><?php echo !empty($row['undertime']) ? $row['undertime'] : 'None'; ?></b>
            </td>
            <td>
                <b><?php echo !empty($row['overtime']) ? $row['overtime'] : 'None'; ?></b>
            </td>
            <td>
                <b><?php echo $row['grand_total']; ?></b>
            </td>
            <td>
                <b><?php echo $row['tax_percentage']; ?>%</b>
            </td>
            <td>
                <b><?php echo $row['withholding_tax']; ?></b>
            </td>
            <td>
                <b><?php echo $row['net_amount_due']; ?></b>
            </td>
            <td>
                <b><?php echo $row['remarks']; ?></b>
            </td>

        </tr>
        <?php endwhile; ?>
    </tbody>
</table>