<?php include 'db_connect.php'; ?>

<div class="container-fluid">
    <div class="row">
        <h3 class="text-white ml-3"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</h3>
        <section class="content col-12">
            <div class="row">
                <?php
                $cards = [
                    ['icon' => 'fas fa-users', 'title' => 'Employee List', 'link' => 'admin.php?page=employee', 'query' => 'SELECT COUNT(id) as total FROM employee'],
                    ['icon' => 'fas fa-user-tie', 'title' => 'User List', 'link' => 'admin.php?page=users', 'query' => 'SELECT COUNT(id) as total FROM users']
                ];

                foreach ($cards as $card) {
                    $stmt = $conn->prepare($card['query']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $total = $result->fetch_assoc()['total'];
                ?>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-3">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="<?php echo $card['link']; ?>" class="text-xs font-weight-bold text-danger text-uppercase mb-1 d-block" style="font-size: 1rem;">
                                            <?php echo $card['title']; ?>
                                        </a>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 4rem;"><?php echo $total; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="<?php echo $card['icon']; ?> fa-2x text-gray-300" style="font-size: 4rem;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>
</div>