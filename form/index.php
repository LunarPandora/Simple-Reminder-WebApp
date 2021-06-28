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
    <div class="container">
        <h1>Todo List</h1>
        <div class="row">
            <form action="backend/save_todo_list.php" method="POST">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="task_name">Task : </label>
                        <input type="text" class="form-control" id="task_name" class="task_name" name="task_name" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority : </label>
                        <select class="form-control" id="priority" name="priority" class="priority" required>
                            <option value="">-- Pilih --</option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Date : </label>
                        <input type="date" name="date" id="date" class="form-control" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Time : </label>
                        <input type="time" name="time" id="time" class="form-control" name="date" required>
                    </div>
                    <div class="submit-btn">
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                    <div class="see-finished">
                        <a href="finished.php">
                            <button type="button" class="btn btn-secondary">Finished List</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <div class="all_task_list">
            <table id="task_list" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task Name</th>
                        <th>Priority</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        require "../koneksi/connection.php";
                        $all_data = "SELECT * FROM task";
                        $query = mysqli_query($conn,$all_data);
                        
                        while($res = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?= $res["id"] ?></td>
                        <td><?= $res["task"] ?></td>
                        <td><?= $res["prioritas"] ?></td>
                        <td><?= $res["tgl_input"] ?></td>
                        <td><?= $res["waktu_input"] ?></td>
                        <td>
                            <button class="btn btn-primary" id="edit" onclick="confirmEdit(<?= $res['id'] ?>)">
                                <span class="material-icons edit">edit</span>
                            </button>
                            <button class="btn btn-danger" id="delete" onclick="confirmDelete(<?php echo $res['id'] ?>)">
                                <span class="material-icons delete">delete</span>
                            </button>
                            <button class="btn btn-success" id="finish" onclick="finishedConfirm(<?= $res['id'] ?>)">
                                <span class="material-icons check">check</span>
                            </button>
                            </a>
                        </td>
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

        function confirmDelete(id){
            Swal.fire({
                icon: 'question',
                title: 'Delete Task',
                text: 'Yakin ingin menghapus Task ?',
                showCancelButton: true,
                confirmButtonText: 'Yakin',
                cancelButtonText: 'Batal'
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location.href = "backend/delete_todo_list.php?id="+id;
                }
            });
        }

        function confirmEdit(id){
            Swal.fire({
                icon: 'question',
                title: 'Edit Task',
                text: 'Ingin mengedit Task ?',
                showCancelButton: true,
                confirmButtonText: 'Edit',
                cancelButtonText: 'Batal'
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location.href = "edit.php?id="+id;
                }
            });
        }

        function finishedConfirm(id){
            Swal.fire({
                icon: 'question',
                title: 'Finish Task',
                text: 'Task sudah selesai ?',
                showCancelButton: true,
                confirmButtonText: 'Selesai',
                cancelButtonText: 'Batal'
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location.href = "backend/finish_todo_list.php?id="+id;
                }
            });
        }

    </script>
</body>
</html>