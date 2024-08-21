<?php
include 'db_connect.php';
if (isset($_GET['id'])) {
	$qry = $conn->query("SELECT * FROM employee where id = " . $_GET['id'])->fetch_array();
	foreach ($qry as $k => $v) {
		$$k = $v;
	}
}
?>
<div class="container-fluid">
    <form id='employee_frm'>
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : "" ?>" />
        <div class="form-group">
            <label>Fullname</label>
            <input type="text" name="fullname" required="required" class="form-control"
                value="<?php echo isset($fullname) ? $fullname : "" ?>" />
        </div>
        <div class="form-group">
            <label>Position</label>
            <input type="text" name="position" required="required" class="form-control"
                value="<?php echo isset($position) ? $position : "" ?>" />
        </div>
    </form>
</div>
<script>
// $('[name="department_id"]').change(function() {
// 	var did = $(this).val()
// 	$('[name="position_id"] .opt').each(function() {
// 		if ($(this).attr('data-did') == did) {
// 			$(this).attr('disabled', false)
// 		} else {
// 			$(this).attr('disabled', true)
// 		}
// 	})
// })
$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Please Select Here",
        width: "100%"
    })
    $('#employee_frm').submit(function(e) {
        e.preventDefault()
        start_load();
        $.ajax({
            url: 'ajax.php?action=save_employee',
            method: "POST",
            data: $(this).serialize(),
            error: err => console.log(),
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Employee's data successfully saved", "success");
                    setTimeout(function() {
                        location.reload();

                    }, 1000)
                }
            }
        })
    })
})
</script>