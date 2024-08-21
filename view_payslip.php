<?php include 'db_connect.php';
$id = $_GET['id'];
$payroll = $conn->query("SELECT w.*, e.fullname as ename, e.employee_no
FROM wages w
INNER JOIN employee e ON w.employee_id = e.id
WHERE w.id = $id");
$row = $payroll->fetch_assoc();
?>

<div class="container-fluid">
    <div class="col-md-12">
        <h5><b><small>Employee ID :</small><?php echo $row['employee_no'] ?></b></h5>
        <h4><b><small>Name: </small><?php echo ucwords($row['ename']) ?></b></h4>
        <hr class="divider">
        <div class="row">
            <!-- <div class="col-md-6">
				<p><b>Payroll Ref : <?php echo $pay['ref_no'] ?></b></p>
				<p><b>Payroll Range : <?php echo date("M d, Y", strtotime($pay['date_from'])) . " - " . date("M d, Y", strtotime($pay['date_to'])) ?></b></p>
				<p><b>Payroll type : <?php echo $pt[$pay['type']] ?></b></p>
			</div> -->
            <div class="col-md-6">
                <!-- <p><b>Days of Absent : <?php echo $absent ?></b></p> -->
                <p><b>Grand Total : <?php echo $row['grand_total'] ?></b></p>
                <!-- <p><b>Tardy/Undertime (mins) : <?php echo $late ?></b></p> -->
                <!-- <p><b>Total Allowance Amount : <?php echo number_format($allowance_amount, 2) ?></b></p> -->
                <p><b>Withholding Tax: <?php echo $row['withholding_tax'] ?></b></p>
                <p><b>Net Amount Due: <?php echo $row['net_amount_due'] ?></b></p>
            </div>
        </div>


        <hr class="divider">
        <div class="row actions-btn">
            <div class="col-lg-12" style="display: flex; justify-content: space-between;">
                <button class="btn btn-primary btn-sm btn-block col-md-2 float-right" type="button"
                    data-dismiss="modal">Close</button>
                <button class="btn btn-success btn-sm btn-block col-md-2 float-right" type="button"
                    id="payslip_print_btn"><span class="fa fa-print"></span> Print</button>
            </div>
        </div>
    </div>

</div>
<style type="text/css">
.list-group-item>span>p {
    margin: unset;
}

.list-group-item>span>p>small {
    font-weight: 700
}

#uni_modal .modal-footer {
    display: none;
}

.alist,
.dlist {
    width: 100%
}

@media print {
    .actions-btn {
        display: none;
    }
}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $('#payslip_print_btn').click(function() {
        console.log('Clicked')
        var nw = window.open("view_payslip.php?id=<?php echo $_GET['id'] ?>", "_blank",
            "height=500,width=800")
        setTimeout(function() {
            nw.print()
            setTimeout(function() {
                nw.close()
            }, 500)
        }, 1000)
    })

})
</script>