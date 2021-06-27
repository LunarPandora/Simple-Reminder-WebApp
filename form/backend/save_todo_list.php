<header>
    <script type="text/javascript" src="../../assets/js/sweetalert2/sweetalert2.min.js"></script>
</header>
<?php
    require "../../koneksi/connection.php";

    $task = $_POST["task_name"];
    $priority = $_POST["priority"];
    $date = $_POST["date"];
    $time = date("H:i:s");

    $insert_task = "INSERT INTO task (task,prioritas,tgl_input,waktu_input) VALUES ('$task','$priority','$date','$time')";
    $query = mysqli_query($conn,$insert_task) or die($insert_task);
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Task Added',
            text: 'Task berhasil ditambah !!',
        }).then((result)=>{
            if(result.isConfirmed){
                window.location.href = '../index.php';
            }
        });
    </script>";
    // header("location:../index.php");
?>