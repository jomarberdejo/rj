<?php include('db_connect.php'); ?>

<div class="container-fluid">
    <div class=" col-lg-12">
        <div class="new">
            <div class="row">
                <!-- wage form START -->
                <div class="col-md-4">
                    <form action="" id="manage-deductions">
                        <div class="card shadow mb-4" style="height:400px;">
                            <div class=" card-header">Employee Wages Form</div>
                            <div class="card-body " style="overflow-y:scroll;">
                                <!-- Employee Name -->
                                <div class=" form-group">
                                    <label class="control-label">Employee Name</label>
                                    <select class="custom-select browser-default select2 form-control"
                                        name="employee_id">
                                        <option value="">Please Select Employee</option>
                                        <?php
                                        $dept = $conn->query("SELECT * from employee order by fullname asc");
                                        while ($row = $dept->fetch_assoc()) :
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <!-- Monthly Salary -->
                                <div class="form-group">
                                    <label class="control-label">Monthly Salary</label>
                                    <input name="monthly_salary" class="form-control" required />
                                </div>

                                <!-- PERA -->
                                <div class="form-group">
                                    <label class="control-label">PERA</label>
                                    <input name="pera" class="form-control" required />
                                </div>

                                <!-- Gross Amount Earned -->
                                <div class="form-group">
                                    <label class="control-label">Gross Amount Earned</label>
                                    <input name="gross_amount_earned" class="form-control" required />
                                </div>

                                <!-- Deductions -->
                                <div class="form-group">
                                    <label class="control-label">PAGIBIG - PS</label>
                                    <input name="pagibig_ps" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">PAGIBIG - GS</label>
                                    <input name="pagibig_gs" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">PAGIBIG - MP3</label>
                                    <input name="pagibig_mp3" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">GSIS - PS</label>
                                    <input name="gsis_ps" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">GSIS - GS</label>
                                    <input name="gsis_gs" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">SIF</label>
                                    <input name="sif" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">PhilHealth - PS</label>
                                    <input name="philhealth_ps" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">PhilHealth - GS</label>
                                    <input name="philhealth_gs" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Withholding Tax</label>
                                    <input name="withholding_tax" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">PRG</label>
                                    <input name="prg" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">CNL</label>
                                    <input name="cnl" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">EML</label>
                                    <input name="eml" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">MPL</label>
                                    <input name="mpl" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">GFAL</label>
                                    <input name="gfal" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">CPL</label>
                                    <input name="cpl" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">HELP</label>
                                    <input name="help" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">CFI</label>
                                    <input name="cfi" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">CSB</label>
                                    <input name="csb" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Disallowance per FD no.</label>
                                    <input name="disallowance_fd" class="form-control" />
                                </div>

                                <!-- Total Deduction -->
                                <div class="form-group">
                                    <label class="control-label">Total Deduction</label>
                                    <input name="total_deduction" class="form-control" />
                                </div>

                                <!-- Net Salary -->
                                <div class="form-group">
                                    <label class="control-label">Net Salary</label>
                                    <input name="net_salary" class="form-control" required />
                                </div>

                                <!-- Net Received for July (1-15) -->
                                <div class="form-group">
                                    <label class="control-label">Net Received for July (1-15)</label>
                                    <input name="net_received_july_1_15" class="form-control" required />
                                </div>

                                <!-- Signature of Employee (1-15) -->
                                <div class="form-group">
                                    <label class="control-label">Signature of Employee (1-15)</label>
                                    <input name="signature_employee_1_15" class="form-control" required />
                                </div>

                                <!-- Net Received for July (16-31) -->
                                <div class="form-group">
                                    <label class="control-label">Net Received for July (16-31)</label>
                                    <input name="net_received_july_16_31" class="form-control" required />
                                </div>

                                <!-- Signature of Employee (16-31) -->
                                <div class="form-group">
                                    <label class="control-label">Signature of Employee (16-31)</label>
                                    <input name="signature_employee_16_31" class="form-control" required />
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-sm btn-primary col-sm-3 offset-md-3">Save</button>
                                        <button class="btn btn-sm btn-default col-sm-3" type="button"
                                            onclick="_reset()">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id">
                    </form>
                </div>


                <!-- wage form FINISH -->

                <!-- Table Panel -->
                <div class="col-md-8">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th rowspan="3" class="text-center align-middle">No.</th>
                                            <th rowspan="3" class="text-center align-middle">Name</th>
                                            <th rowspan="3" class="text-center align-middle">Position</th>
                                            <th rowspan="3" class="text-center align-middle">Employee No.</th>
                                            <th rowspan="3" class="text-center align-middle">Monthly Salary</th>
                                            <th rowspan="3" class="text-center align-middle">PERA</th>
                                            <th rowspan="3" class="text-center align-middle">Gross Amount Earned</th>
                                            <th colspan="19" class="text-center align-middle">Deductions</th>
                                            <th rowspan="3" class="text-center align-middle">Total Deduction</th>
                                            <th rowspan="3" class="text-center align-middle">Net Salary</th>
                                            <th rowspan="3" class="text-center align-middle">Net Received for July
                                                (1-15)</th>
                                            <th rowspan="3" class="text-center align-middle">Signature of Employee</th>
                                            <th rowspan="3" class="text-center align-middle">Net Received for July
                                                (16-31)</th>
                                            <th rowspan="3" class="text-center align-middle">Signature of Employee</th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-center align-middle">PAGIBIG</th>
                                            <th colspan="2" class="text-center align-middle">GSIS</th>
                                            <th rowspan="2" class="text-center align-middle">SIF</th>
                                            <th colspan="2" class="text-center align-middle">PhilHealth</th>
                                            <th rowspan="2" class="text-center align-middle">Withholding Tax</th>
                                            <th rowspan="2" class="text-center align-middle">PRG</th>
                                            <th rowspan="2" class="text-center align-middle">CNL</th>
                                            <th rowspan="2" class="text-center align-middle">EML</th>
                                            <th rowspan="2" class="text-center align-middle">MPL</th>
                                            <th rowspan="2" class="text-center align-middle">GFAL</th>
                                            <th rowspan="2" class="text-center align-middle">CPL</th>
                                            <th rowspan="2" class="text-center align-middle">HELP</th>
                                            <th rowspan="2" class="text-center align-middle">CFI</th>
                                            <th rowspan="2" class="text-center align-middle">CSB</th>

                                            </th>
                                        </tr>
                                        <tr>
                                            <th>PS</th>
                                            <th>GS</th>
                                            <th>MP3</th>
                                            <th>PS</th>
                                            <th>GS</th>
                                            <th>PS</th>
                                            <th>GS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $wages_info = $conn->query("
                                        SELECT wages.*, 
                                               employee.fullname, 
                                               employee.position, 
                                               employee.employee_no,  
                                               employee.monthly_salary, 
                                               employee.pera, 
                                               employee.gross_amount_earned, 
                                               employee.pagibig_gs, 
                                               employee.pagibig_mp3, 
                                               employee.gsis_ps, 
                                               employee.gsis_gs, 
                                               employee.sif, 
                                               employee.philhealth_ps, 
                                               employee.philhealth_gs, 
                                               employee.withholding_tax, 
                                               employee.prg, 
                                               employee.cnl, 
                                               employee.eml, 
                                               employee.mpl, 
                                               employee.gfal, 
                                               employee.cpl, 
                                               employee.help, 
                                               employee.cfi, 
                                               employee.csb, 
                                               employee.disallowance_fd, 
                                               employee.total_deductions, 
                                               employee.net_salary, 
                                               employee.net_received1, 
                                               employee.employee_signature1,
                                               employee.net_received2, 
                                               employee.employee_signature2
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
                                            <td><b><?php echo $row['employee_no']; ?></b></td>
                                            <td><b><?php echo $row['monthly_salary']; ?></b></td>
                                            <td><b><?php echo $row['pera']; ?></b></td>
                                            <td><b><?php echo $row['gross_amount_earned']; ?></b></td>

                                            <!-- PAGIBIG -->
                                            <td><b><?php echo $row['pagibig_ps']; ?></b></td>
                                            <td><b><?php echo $row['pagibig_gs']; ?></b></td>
                                            <td><b><?php echo $row['pagibig_mp3']; ?></b></td>

                                            <!-- GSIS -->
                                            <td><b><?php echo $row['gsis_ps']; ?></b></td>
                                            <td><b><?php echo $row['gsis_gs']; ?></b></td>

                                            <!-- SIF -->
                                            <td><b><?php echo $row['sif']; ?></b></td>

                                            <!-- PhilHealth -->
                                            <td><b><?php echo $row['philhealth_ps']; ?></b></td>
                                            <td><b><?php echo $row['philhealth_gs']; ?></b></td>

                                            <!-- Withholding Tax -->
                                            <td><b><?php echo $row['withholding_tax']; ?></b></td>

                                            <!-- Other Deductions -->
                                            <td><b><?php echo $row['prg']; ?></b></td>
                                            <td><b><?php echo $row['cnl']; ?></b></td>
                                            <td><b><?php echo $row['eml']; ?></b></td>
                                            <td><b><?php echo $row['mpl']; ?></b></td>
                                            <td><b><?php echo $row['gfal']; ?></b></td>
                                            <td><b><?php echo $row['cpl']; ?></b></td>
                                            <td><b><?php echo $row['help']; ?></b></td>
                                            <td><b><?php echo $row['cfi']; ?></b></td>
                                            <td><b><?php echo $row['csb']; ?></b></td>
                                            <td><b><?php echo $row['disallowance_fd']; ?></b></td>

                                            <!-- Total Deductions and Net Salary -->
                                            <td><b><?php echo $row['total_deductions']; ?></b></td>
                                            <td><b><?php echo $row['net_salary']; ?></b></td>

                                            <!-- Net Received and Employee Signatures -->
                                            <td><b><?php echo $row['net_received_15']; ?></b></td>
                                            <td><b><?php echo $row['employee_signature_15']; ?></b></td>
                                            <td><b><?php echo $row['net_received_16_31']; ?></b></td>
                                            <td><b><?php echo $row['employee_signature_16_31']; ?></b></td>

                                            <!-- View Payroll Button -->
                                            <!-- <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary view_payroll"
                                        data-id="<?php echo $row['id'] ?>" type="button">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </td> -->
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Table Panel -->
            </div>
        </div>
    </div>
</div>

<style>
.card-header,
.control-label {
    color: black;
}

.row {
    display: flex;
    flex-wrap: nowrap;
}

/* .card {
        background: #d1d3e0;
    } */

.new {
    padding: 10px;
    width: 100%;
    height: 100%;
    background: #d1d3e0;
    background-size: cover;
}

td,
tr {
    background-color: #fafafa;
    vertical-align: middle !important;
}

td p {
    margin: unset;
}

img {
    max-width: 100px;
    max-height: 150px;
}
</style>

<script>
function _reset() {
    $(' [name="id" ]').val('');
    $('#manage-deductions').get(0).reset();
    $('.select2').val('').trigger('change');
}
$(document).ready(function() {
    $('.select2').select2();
    $('#manage-deductions').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'ajax.php?action=save_deductions',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Data successfully added ", 'success');
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else if (resp == 2) {
                    alert_toast(" Data successfully updated", 'success');
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else if (resp == 3) {
                    alert_toast("Employee already exists ", 'danger');
                }
            }
        });
    });
    $('.edit_deductions').click(function() {
            var
                form = $('#manage-deductions');
            form.get(0).reset();
            form.find(
                " [name='id' ] ").val($(this).attr('data-id'));
            form.find(" [name = 'employee_id']
                ").val($(this).attr('data-employee_id')).trigger('change'); form.find(" [
                    name = 'no_of_hours'
                ]
                ").val($(this).attr('data-no_of_hours')); form.find(" [name = 'rate_per_hour']
                ").val($(this).attr('data-rate_per_hour')); form.find(" [name = 'undertime']
                ").val($(this).attr('data-undertime')); form.find(" [name = 'overtime']
                ").val($(this).attr('data-overtime')); }); $('.delete_deductions').click(function() { _conf("
                Are you sure to delete this employee wages information ? ", "
                delete_deductions " , [$(this)
                .attr('data-id')]);
    });
});

function delete_deductions(id) {
    $.ajax({
        url: 'ajax.php?action=delete_deductions',
        method: 'POST',
        data: {
            id: id
        },
        success: function(resp) {
            if (resp == 1) {
                alert_toast(" Data successfully deleted", 'success');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }
        }
    });
}
</script>