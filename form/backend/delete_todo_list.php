<header>
    <script type="text/javascript" src="../../assets/js/sweetalert2/sweetalert2.min.js"></script>
</header>
<?php
    session_start();
    require "../../koneksi/connection.php";

    $id = $_GET['id'];
    $delete = $_GET['delete'];
    $id_user = $_SESSION["id"];

    if($delete == "clear_task_id"){
        $delete_task = "DELETE FROM task WHERE id='$id' AND id_user='$id_user'";
        $query = mysqli_query($conn,$delete_task);
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Task Deleted',
            text: 'Task berhasil dihapus !!',
        }).then((result)=>{
            if(result.isConfirmed){
                window.location.href = '../index.php';
            }
        });
    </script>";
    } else if($delete == "clear_task"){
        $clear_task = "DELETE FROM task WHERE id_user='$id_user'";
        $query = mysqli_query($conn,$clear_task);
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Task Cleared ! ',
            text: 'Seluruh task berhasil dihapus',
        }).then((result)=>{
            if(result.isConfirmed){
                window.location.href = '../index.php';
            }
        });
    </script>";
    }
    else if($delete == "clear_finished"){
        $clear_finished = "DELETE FROM finished WHERE id_user_finished='$id_user'";
        $query = mysqli_query($conn,$clear_finished);
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Finished Task Deleted',
            text: 'Finished Task berhasil dihapus !!',
        }).then((result)=>{
            if(result.isConfirmed){
                window.location.href = '../finished.php';
            }
        });
    </script>";
    }
?>