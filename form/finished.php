<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>To Do List</title>
</head>
<body>
    <header>
        <a href="../index.php">
            <h1>Finished To Do List</h1>
        </a>
    </header>
    <div class="container-fluid">
        <div id="all_task_list">
            <?php 
                require "../koneksi/connection.php";
                $all_data = "SELECT * FROM finished";
                $query = mysqli_query($conn,$all_data);

                if(mysqli_num_rows($query) > 0){
                    while($res = mysqli_fetch_array($query)){        
            ?>
            <div class="card-list">
                <div class="task-name">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <h4><?= $res["task_finished"] ?></h4>
                            <span> <?=$res["tanggal_mulai"] ?></span>
                            <span> / </span>
                            <span> <?=$res["waktu_mulai"] ?></span>
                        </div>
                        <div class="col-md-3 col-12 prioritas">
                            <span class="material-icons check" style="position:absolute;font-size: 25px;">check</span>
                            <h5 style="margin-left:40px;">Finished</h5>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="finished-detail">
                                <span> <?=$res["tanggal_selesai"] ?></span>
                                <span> / </span>
                                <span> <?=$res["waktu_selesai"] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php
                    }
                } else {
                    ?>
                    <div class="no-card">
                        <h3>No Task Finished</h3>
                    </div>
                <?php
                    }
                ?>
        <div class="back-btn">
            <a href="../index.php">
                <button class="btn btn-danger" id="back">
                    Back
                </button>
            </a>
        </div>
        </div>
    </div>

    <script type="text/javascript" src="../assets/js/jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>