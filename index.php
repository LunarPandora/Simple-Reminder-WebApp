<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/datatable/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Todo List</title>
</head>
<body>
    <header>
        <h1>To Do List</h1>
    </header>
    <div class="container-fluid">
        <div class="row">
            <form action="form/backend/save_todo_list.php" method="POST">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="task_name">Task : </label>
                        <input type="text" class="form-control" id="task_name" class="task_name" name="task_name" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority : </label>
                        <select class="form-control" id="priority" name="priority" class="priority" required>
                            <option value="">-- Pilih --</option>
                            <option value="3">High</option>
                            <option value="2">Medium</option>
                            <option value="1">Low</option>
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
                    <div class="two-btn">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="submit-btn">
                                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="see-finished">
                                    <a href="form/finished.php">
                                        <button type="button" class="btn btn-danger" id="finished">Finished List</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="sort">
                    <label for="sorting">Sort By : </label>
                    <select name="sorting" id="sorting" class="form-control">
                        <option value="default">Default</option>
                        <option value="A_Z">Task : A - Z</option>
                        <option value="Z_A">Task : Z - A</option>
                        <option value="low_to_high">Priority : Low - High</option>
                        <option value="high_to_low">Priority : High - Low</option>
                        <option value="date_oldest">Date : Oldest</option>
                        <option value="date_newest">Date : Newest</option>
                    </select>
                </div>
                <div class="all_task_list" id="all_task_list">
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
                                require "koneksi/connection.php";
                                $all_data = "SELECT * FROM task";
                                $query = mysqli_query($conn,$all_data);
                                
                                while($res = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?= $res["id"] ?></td>
                                <td><?= $res["task"] ?></td>
                                <td>
                                    <?php
                                        if($res["prioritas"] == "1"){
                                            echo "Low";       
                                        }
                                        else if($res["prioritas"] == "2"){
                                            echo "Medium";
                                        }
                                        else if($res["prioritas"] == "3"){
                                            echo "High";
                                        }
                                    ?>
                                </td>
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
        </div>
    </div>


    <script type="text/javascript" src="assets/js/jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery/jquery.mask.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/datatable/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/datatable/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert2/sweetalert2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#task_list').DataTable({
                "searching": false,
                "sorting": false,
                "language":{
                "url":"assets/datatable/DataTables-1.10.24/json/Indonesian.json",
                "sEmptyTable":"Tidads"
            },
            });

            $("#sorting").change(function(){
                var sorting = $("#sorting").val();
                $.ajax({
                    type: 'POST',
                    url: 'form/backend/sort.php',
                    cache: false,
                    data: {
                        sorting: sorting,
                    },
                    success:function(response){
                        $("#all_task_list").html(response);
                        $('#task_list').DataTable({
                            "searching": false,
                            "sorting": false,
                            "language":{
                            "url":"assets/datatable/DataTables-1.10.24/json/Indonesian.json",
                            "sEmptyTable":"Tidads"
                        },
                        });
                    }
                });
            })
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
                    window.location.href = "form/backend/delete_todo_list.php?id="+id;
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
                    window.location.href = "form/edit.php?id="+id;
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
                    window.location.href = "form/backend/finish_todo_list.php?id="+id;
                }
            });
        }

    </script>
</body>
</html>