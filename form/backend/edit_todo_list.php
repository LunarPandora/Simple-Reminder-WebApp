<header>
    <script type="text/javascript" src="../../assets/js/sweetalert2/sweetalert2.min.js"></script>
</header>

<?php
    require "../../koneksi/connection.php";

    $id = $_GET["id"];
    $task = $_POST["task_name"];
    $priority = $_POST["priority"];
    $date = $_POST["date"];

    $update_data = "UPDATE task SET task='$task',prioritas='$priority',tgl_input='$date' WHERE id='$id' ";
    $query = mysqli_query($conn,$update_data);
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Task Updated',
            text: 'Task berhasil diupdate !!',
        }).then((result)=>{
            if(result.isConfirmed){
                window.location.href = '../index.php';
            }
        });
    </script>";

?>