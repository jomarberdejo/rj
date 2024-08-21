<?php include('db_connect.php') ?>

<div class="container-fluid ">
    <div class="col-lg-12">
        <div class="card p-4" id="hello">
            <div class="card-header">
                <button class="btn btn-success btn-sm btn-block col-md-2 float-right" type="button" id="print_btn">
                    <span class="fa fa-print"></span> Print
                </button>
            </div>

            <hr>
            <div class="table-responsive">
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
                            <th rowspan="2" class="text-center align-middle">Action</th>
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
                            <td><b><?php echo $row['fullname']; ?></b></td>
                            <td><b><?php echo $row['position']; ?></b></td>
                            <td><b><?php echo $row['no_of_hours']; ?></b></td>
                            <td><b><?php echo $row['rate_per_hour']; ?></b></td>
                            <td><b><?php echo !empty($row['undertime']) ? $row['undertime'] : 'None'; ?></b></td>
                            <td><b><?php echo !empty($row['overtime']) ? $row['overtime'] : 'None'; ?></b></td>
                            <td><b><?php echo $row['grand_total']; ?></b></td>
                            <td><b><?php echo $row['tax_percentage']; ?>%</b></td>
                            <td><b><?php echo $row['withholding_tax']; ?></b></td>
                            <td><b><?php echo $row['net_amount_due']; ?></b></td>
                            <td><b><?php echo $row['remarks']; ?></b></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary view_payroll"
                                    data-id="<?php echo $row['id'] ?>" type="button">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





<script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable();
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable();

    $('#print_btn').click(function() {
        var nw = window.open("print_payroll.php?id=", "_blank", "height=500,width=800")
        setTimeout(function() {
            nw.print()
            setTimeout(function() {
                nw.close()
            }, 500)
        }, 1000)
    })

    $('.view_payroll').click(function() {
        var id = $(this).attr('data-id');
        var employee_id = $(this).attr('data-employee_id');
        uni_modal("Employee Payslip", "view_payslip.php?id=" + id + "&employee_id=" + employee_id,
            "large")
    });

    $('.remove_payroll').click(function() {
        _conf("Are you sure to delete this payroll?", "remove_payroll", [$(this).attr('data-id')])
    })
});

function remove_payroll(id) {
    start_load()
    $.ajax({
        url: 'ajax.php?action=delete_payroll',
        method: "POST",
        data: {
            id: id
        },
        error: err => console.log(err),
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Employee's data successfully deleted", "success");
                setTimeout(function() {
                    location.reload();
                }, 1000)
            }
        }
    })
}
</script>