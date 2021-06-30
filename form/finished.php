<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/datatable/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Todo List</title>
</head>
<body>
    <header>
        <a href="../index.php">
            <h1>Finished To Do List</h1>
        </a>
    </header>
    <div class="container-fluid">

        <div class="all_task_list">
            <table id="task_list" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task Name</th>
                        <th>Tanggal Mulai</th>
                        <th>Waktu Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Waktu Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        require "../koneksi/connection.php";
                        $all_finished = "SELECT * FROM finished";
                        $query = mysqli_query($conn,$all_finished);
                        
                        while($res = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?= $res["id_finished"] ?></td>
                        <td><?= $res["task_finished"] ?></td>
                        <td><?= $res["tanggal_mulai"] ?></td>
                        <td><?= $res["waktu_mulai"] ?></td>
                        <td><?= $res["tanggal_selesai"] ?></td>
                        <td><?= $res["waktu_selesai"] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>


    <script type="text/javascript" src="../assets/js/jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="../assets/js/sweetalert2/sweetalert2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#task_list').DataTable({
                "searching": false,
                "language":{
                "url":"../assets/datatable/DataTables-1.10.24/json/Indonesian.json",
                "sEmptyTable":"Tidads"
            },
            });
        });
    </script>
</body>
</html>