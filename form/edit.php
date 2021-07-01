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
        <h1>To Do List</h1>
    </header>
    <div class="container-fluid">
        <div class="row">
            <?php
                    require "../koneksi/connection.php";

                    $id = $_GET['id'];

                    $get_data = "SELECT * FROM task WHERE id = '$id'";
                    $query = mysqli_query($conn,$get_data);

                    if ($res = mysqli_fetch_array($query)) {
            ?>
            <form action="backend/edit_todo_list.php?id=<?= $res['id'] ?>" method="POST">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="task_name">Task : </label>
                        <input type="text" class="form-control" id="task_name" class="task_name" name="task_name" autocomplete="off" required value="<?= $res['task'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority : </label>
                        <select class="form-control" id="priority" name="priority" class="priority" required>
                            <?php
                                if($res["prioritas"] == "3"){
                            ?>
                                    <option value="3">High</option>
                                    <option value="2">Medium</option>
                                    <option value="1">Low</option>
                            <?php
                                }
                                else if($res["prioritas"] == "2"){
                            ?>
                                    <option value="2">Medium</option>
                                    <option value="1">Low</option>
                                    <option value="3">High</option>
                            <?php
                                } else if($res['prioritas'] == "1"){
                            ?>
                                    <option value="1">Low</option>
                                    <option value="2">Medium</option>
                                    <option value="3">High</option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Date : </label>
                        <input type="date" name="date" id="date" class="form-control" name="date" required value="<?= $res["tgl_input"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="date">Time : </label>
                        <input type="time" name="time" id="time" class="form-control" name="date" required value="<?= $res["waktu_input"] ?>">
                    </div>
                    <div class="two-btn">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="submit-btn">
                                    <button type="submit" class="btn btn-primary" id="save-edit">Save Edit</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cancel-btn">
                                    <button type="button" class="btn btn-danger" id="cancel" onclick="cancelConfirm()">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                <?php
                    } ?>
        </div>
    </div>
    <script type="text/javascript" src="../assets/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/sweetalert2/sweetalert2.min.js"></script>

    <script>
        function cancelConfirm(){
            Swal.fire({
                icon: 'question',
                title: 'Cancel',
                text: 'Yakin ingin membatalkan edit ?',
                showCancelButton: true,
                confirmButtonText: 'Yakin',
                cancelButtonText: 'Batal'
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location.href = "../index.php";
                }
            });
        }
    </script>
</body>
</html>