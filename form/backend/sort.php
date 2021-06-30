<?php
    require "../../koneksi/connection.php";

    $sort = $_POST["sorting"];
    if ($sort == "default") {
?>
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
<?php
    } if($sort == "low_to_high"){
?>
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
                $all_data = "SELECT * FROM task ORDER BY prioritas ASC";
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
<?php
    }else if($sort == "high_to_low"){
?>
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
                $all_data = "SELECT * FROM task ORDER BY prioritas DESC";
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
<?php
    } else if($sort == "A_Z"){
?>
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
                $all_data = "SELECT * FROM task ORDER BY task ASC";
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
<?php
    } else if($sort == "Z_A"){
?>
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
                $all_data = "SELECT * FROM task ORDER BY task DESC";
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
<?php
    } else if($sort == "date_oldest"){
?>
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
                $all_data = "SELECT * FROM task ORDER BY tgl_input ASC";
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
<?php   
    } else if($sort == "date_newest"){
?>
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
                $all_data = "SELECT * FROM task ORDER BY tgl_input DESC";
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
<?php
    }
?>
