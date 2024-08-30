<style>
* {
    margin-top: 0;
    border-radius: 2px;
    border: 5px solid 161616;
    /* margin:3px; */
}

.fa {
    background: #900000;
}

a.nav-item:hover,
.nav-item.active {
    background-color: #900000;
    color: #fffafa;
    background-color: #900000;
}
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark'>

    <a href="admin.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span>
        Home</a>

    <a href="admin.php?page=payroll_items" class="nav-item nav-payroll_items"><span class='icon-field'><i
                class="fa fa-columns"></i></span> General Payroll </a>
    <a href="admin.php?page=employee" class="nav-item nav-employee"><span class='icon-field'><i
                class="fa fa-user-tie"></i></span> Employee List</a>
    <a href="admin.php?page=deductions" class="nav-item nav-deductions"><span class='icon-field'><i
                class="fa fa-money-bill-wave"></i></span> Employee Wages Info</a>
    <a href="admin.php?page=users" class="nav-item nav-users"><span class='icon-field'><i
                class="fa fa-users"></i></span> Users</a>
    <?php if ($_SESSION['username'] == 1): ?>

    <?php endif; ?>
    </div>

</nav>

<script>
$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>