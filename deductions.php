<?php include('db_connect.php'); ?>

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="new">
            <div class="row">
                <!-- FORM Panel -->
                <div class="col-md-4">
                    <form action="" id="manage-deductions">
                        <div class="card shadow mb-4">
                            <div class="card-header">Employee Wages Form</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label">Employee Name</label>
                                    <select class="custom-select browser-default select2" name="employee_id">
                                        <option value=""></option>
                                        <?php
                                        $dept = $conn->query("SELECT * from employee order by fullname asc");
                                        while ($row = $dept->fetch_assoc()) :
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Number of hours Worked (Overload)</label>
                                    <input name="no_of_hours" class="form-control"
                                        pattern="^(0?[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" placeholder="HH:MM" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Rate per hour</label>
                                    <input name="rate_per_hour" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Undertime</label>
                                    <input name="undertime" class="form-control"
                                        pattern="^(0?[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" placeholder="HH:MM" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Overtime</label>
                                    <input name="overtime" class="form-control"
                                        pattern="^(0?[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" placeholder="HH:MM" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tax Percentage</label>
                                    <input name="tax_percentage" class="form-control" />
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
                <!-- FORM Panel -->

                <!-- Table Panel -->
                <div class="col-md-8">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center align-middle">No.</th>
                                            <th rowspan="2" class="text-center align-middle">Employee Name</th>
                                            <th class="text-center" colspan="5">WAGES</th>
                                            <th rowspan="2" class="text-center align-middle">Tax Percentage</th>
                                            <th rowspan="2" class="text-center align-middle">Action</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center align-middle">Number of Minutes Worked <br>
                                                (OVERLOAD)
                                            </th>
                                            <th class="text-center align-middle">Rate per hour</th>
                                            <th class="text-center align-middle">Undertime</th>
                                            <th class="text-center align-middle">Overtime</th>
                                            <th class="text-center align-middle">GRAND TOTAL AMOUNT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $wages_info = $conn->query("SELECT wages.*, employee.fullname
                                        FROM wages
                                        INNER JOIN employee ON wages.employee_id = employee.id
                                        ORDER BY wages.id ASC");
                                        while ($row = $wages_info->fetch_assoc()) :
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td>
                                                <b><?php echo $row['fullname']; ?></b>
                                            </td>
                                            <td>
                                                <b><?php echo $row['no_of_hours']; ?></b>
                                            </td>
                                            <td>
                                                <b><?php echo $row['rate_per_hour']; ?></b>
                                            </td>
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
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-primary edit_deductions" type="button"
                                                    data-id="<?php echo $row['id']; ?>"
                                                    data-no_of_hours="<?php echo $row['no_of_hours']; ?>"
                                                    data-rate_per_hour="<?php echo $row['rate_per_hour']; ?>"
                                                    data-undertime="<?php echo $row['undertime']; ?>"
                                                    data-overtime="<?php echo $row['overtime']; ?>"
                                                    data-employee_id="<?php echo $row['employee_id']; ?>"
                                                    data-tax_percentage="<?php echo $row['tax_percentage']; ?>">Edit</button>
                                                <button class="btn btn-sm btn-danger delete_deductions" type="button"
                                                    data-id="<?php echo $row['id']; ?>">Delete</button>
                                            </td>
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
    $('[name="id"]').val('');
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
                    alert_toast("Data successfully added", 'success');
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else if (resp == 2) {
                    alert_toast("Data successfully updated", 'success');
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else if (resp == 3) {
                    alert_toast("Employee already exists", 'danger');
                }
            }
        });
    });

    $('.edit_deductions').click(function() {
        var form = $('#manage-deductions');
        form.get(0).reset();
        form.find("[name='id']").val($(this).attr('data-id'));
        form.find("[name='employee_id']").val($(this).attr('data-employee_id')).trigger('change');
        form.find("[name='no_of_hours']").val($(this).attr('data-no_of_hours'));
        form.find("[name='rate_per_hour']").val($(this).attr('data-rate_per_hour'));
        form.find("[name='undertime']").val($(this).attr('data-undertime'));
        form.find("[name='overtime']").val($(this).attr('data-overtime'));
    });

    $('.delete_deductions').click(function() {
        _conf("Are you sure to delete this employee wages information ?", "delete_deductions", [$(this)
            .attr('data-id')
        ]);
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
                alert_toast("Data successfully deleted", 'success');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }
        }
    });
}
</script>