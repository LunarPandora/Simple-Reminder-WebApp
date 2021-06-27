<header>
    <script type="text/javascript" src="../../assets/js/sweetalert2/sweetalert2.min.js"></script>
</header>

<?php
    require "../../koneksi/connection.php";

    $id = $_GET["id"];

    $get_task_data = "SELECT task,tgl_input, waktu_input FROM task WHERE id='$id' ";
    $query = mysqli_query($conn,$get_task_data);

    while($row = mysqli_fetch_array($query)){
        $task = $row['task'];
        $tgl_input = $row['tgl_input'];
        $waktu_input = $row['waktu_input'];

        $tgl_skrg = date("Y-m-d");
        $waktu_skrg = date("H:i:s");

        $finished = "INSERT INTO finished VALUES('$id','$task','$tgl_input','$waktu_input','$tgl_skrg','$waktu_skrg')";
        $insert_finished = mysqli_query($conn,$finished);
    }

    $delete_ongoing = "DELETE FROM task WHERE id='$id'";
    $delete = mysqli_query($conn,$delete_ongoing);

    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Task Finished',
            text: 'Task telah selesai !',
        }).then((result)=>{
            if(result.isConfirmed){
                window.location.href = '../index.php';
            }
        });
    </script>";

?>