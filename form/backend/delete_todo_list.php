<header>
    <script type="text/javascript" src="../../assets/js/sweetalert2/sweetalert2.min.js"></script>
</header>
<?php
    require "../../koneksi/connection.php";

    $id = $_GET['id'];

    $delete_task = "DELETE FROM task WHERE id='$id'";
    $query = mysqli_query($conn,$delete_task);
    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Task Deleted',
        text: 'Task berhasil dihapus !!',
    }).then((result)=>{
        if(result.isConfirmed){
            window.location.href = '../../index.php';
        }
    });
</script>";
?>