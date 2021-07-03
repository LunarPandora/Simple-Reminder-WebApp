<?php
    session_start();
    require "../../koneksi/connection.php";
    $id_user = $_SESSION["id"];

    $sort = $_POST["sorting"];
    if ($sort == "default") {
?>
    <?php 
        $all_data = "SELECT * FROM task WHERE id_user='$id_user'";
        $query = mysqli_query($conn,$all_data);
            
        while($res = mysqli_fetch_array($query)){        
    ?>
        <div class="card-list">
            <div class="task-name">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h4><?= $res["task"] ?></h4>
                        <span class="tgl_input"><?= $res["tgl_input"] ?></span>
                        <span> / </span>
                        <span class="waktu_input"><?= $res["waktu_input"] ?></span>
                    </div>
                    <div class="col-md-3 col-12 prioritas">
                        <?php
                            if($res["prioritas"] == "1"){
                        ?>
                                <div class="circle" style="background-color: green;">
                                </div>
                                <h5>Low</h5>
                        <?php
                            }
                            else if($res["prioritas"] == "2"){
                        ?>
                                <div class="circle" style="background-color: #F4D03F;">
                                </div>
                                <h5>Medium</h5>
                        <?php
                            }
                            else if($res["prioritas"] == "3"){
                        ?>  
                                <div class="circle" style="background-color: red">
                                </div>
                                <h5>High</h5>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="action-btn">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <span class="material-icons edit" onclick="confirmEdit(<?= $res['id'] ?>)">
                                        edit
                                    </span>
                                </div>
                                <div class="col-md-4 col-4">
                                    <span class="material-icons delete" onclick="confirmDelete(<?php echo $res['id'] ?>)">
                                        delete
                                    </span>
                                </div>
                                <div class="col-md-4 col-4">
                                    <span class="material-icons check" onclick="finishedConfirm(<?= $res['id'] ?>)">check</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
<?php
    } if($sort == "low_to_high"){
?>
    <?php 
         $all_data = "SELECT * FROM task WHERE id_user='$id_user' ORDER BY prioritas ASC";
        $query = mysqli_query($conn,$all_data);
            
        while($res = mysqli_fetch_array($query)){        
    ?>
        <div class="card-list">
            <div class="task-name">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h4><?= $res["task"] ?></h4>
                        <span class="tgl_input"><?= $res["tgl_input"] ?></span>
                        <span> / </span>
                        <span class="waktu_input"><?= $res["waktu_input"] ?></span>
                    </div>
                    <div class="col-md-3 col-12 prioritas">
                        <?php
                            if($res["prioritas"] == "1"){
                        ?>
                                <div class="circle" style="background-color: green;">
                                </div>
                                <h5>Low</h5>
                        <?php
                            }
                            else if($res["prioritas"] == "2"){
                        ?>
                                <div class="circle" style="background-color: #F4D03F;">
                                </div>
                                <h5>Medium</h5>
                        <?php
                            }
                            else if($res["prioritas"] == "3"){
                        ?>  
                                <div class="circle" style="background-color: red">
                                </div>
                                <h5>High</h5>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="action-btn">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <span class="material-icons edit" onclick="confirmEdit(<?= $res['id'] ?>)">
                                        edit
                                    </span>
                                </div>
                                <div class="col-md-4 col-4">
                                    <span class="material-icons delete" onclick="confirmDelete(<?php echo $res['id'] ?>)">
                                        delete
                                    </span>
                                </div>
                                <div class="col-md-4 col-4">
                                    <span class="material-icons check" onclick="finishedConfirm(<?= $res['id'] ?>)">check</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
<?php
    }else if($sort == "high_to_low"){
?>
    <?php 
         $all_data = "SELECT * FROM task WHERE id_user='$id_user' ORDER BY prioritas DESC";
        $query = mysqli_query($conn,$all_data);
            
        while($res = mysqli_fetch_array($query)){        
    ?>
        <div class="card-list">
            <div class="task-name">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h4><?= $res["task"] ?></h4>
                        <span class="tgl_input"><?= $res["tgl_input"] ?></span>
                        <span> / </span>
                        <span class="waktu_input"><?= $res["waktu_input"] ?></span>
                    </div>
                    <div class="col-md-3 col-12 prioritas">
                        <?php
                            if($res["prioritas"] == "1"){
                        ?>
                                <div class="circle" style="background-color: green;">
                                </div>
                                <h5>Low</h5>
                        <?php
                            }
                            else if($res["prioritas"] == "2"){
                        ?>
                                <div class="circle" style="background-color: #F4D03F;">
                                </div>
                                <h5>Medium</h5>
                        <?php
                            }
                            else if($res["prioritas"] == "3"){
                        ?>  
                                <div class="circle" style="background-color: red">
                                </div>
                                <h5>High</h5>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="action-btn">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <span class="material-icons edit" onclick="confirmEdit(<?= $res['id'] ?>)">
                                        edit
                                    </span>
                                </div>
                                <div class="col-md-4 col-4">
                                    <span class="material-icons delete" onclick="confirmDelete(<?php echo $res['id'] ?>)">
                                        delete
                                    </span>
                                </div>
                                <div class="col-md-4 col-4">
                                    <span class="material-icons check" onclick="finishedConfirm(<?= $res['id'] ?>)">check</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
<?php
    } else if($sort == "A_Z"){
?>
    <?php 
         $all_data = "SELECT * FROM task WHERE id_user='$id_user' ORDER BY task ASC";
        $query = mysqli_query($conn,$all_data);
            
        while($res = mysqli_fetch_array($query)){        
    ?>
        <div class="card-list">
            <div class="task-name">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h4><?= $res["task"] ?></h4>
                        <span class="tgl_input"><?= $res["tgl_input"] ?></span>
                        <span> / </span>
                        <span class="waktu_input"><?= $res["waktu_input"] ?></span>
                    </div>
                    <div class="col-md-3 col-12 prioritas">
                        <?php
                            if($res["prioritas"] == "1"){
                        ?>
                                <div class="circle" style="background-color: green;">
                                </div>
                                <h5>Low</h5>
                        <?php
                            }
                            else if($res["prioritas"] == "2"){
                        ?>
                                <div class="circle" style="background-color: #F4D03F;">
                                </div>
                                <h5>Medium</h5>
                        <?php
                            }
                            else if($res["prioritas"] == "3"){
                        ?>  
                                <div class="circle" style="background-color: red">
                                </div>
                                <h5>High</h5>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="action-btn">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <span class="material-icons edit" onclick="confirmEdit(<?= $res['id'] ?>)">
                                        edit
                                    </span>
                                </div>
                                <div class="col-md-4 col-4">
                                    <span class="material-icons delete" onclick="confirmDelete(<?php echo $res['id'] ?>)">
                                        delete
                                    </span>
                                </div>
                                <div class="col-md-4 col-4">
                                    <span class="material-icons check" onclick="finishedConfirm(<?= $res['id'] ?>)">check</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
<?php
    } else if($sort == "Z_A"){
?>
    <?php 
         $all_data = "SELECT * FROM task WHERE id_user='$id_user' ORDER BY task DESC";
        $query = mysqli_query($conn,$all_data);
            
        while($res = mysqli_fetch_array($query)){        
    ?>
        <div class="card-list">
            <div class="task-name">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h4><?= $res["task"] ?></h4>
                        <span class="tgl_input"><?= $res["tgl_input"] ?></span>
                        <span> / </span>
                        <span class="waktu_input"><?= $res["waktu_input"] ?></span>
                    </div>
                    <div class="col-md-3 col-12 prioritas">
                        <?php
                            if($res["prioritas"] == "1"){
                        ?>
                                <div class="circle" style="background-color: green;">
                                </div>
                                <h5>Low</h5>
                        <?php
                            }
                            else if($res["prioritas"] == "2"){
                        ?>
                                <div class="circle" style="background-color: #F4D03F;">
                                </div>
                                <h5>Medium</h5>
                        <?php
                            }
                            else if($res["prioritas"] == "3"){
                        ?>  
                                <div class="circle" style="background-color: red">
                                </div>
                                <h5>High</h5>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="action-btn">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <span class="material-icons edit" onclick="confirmEdit(<?= $res['id'] ?>)">
                                        edit
                                    </span>
                                </div>
                                <div class="col-md-4 col-4">
                                    <span class="material-icons delete" onclick="confirmDelete(<?php echo $res['id'] ?>)">
                                        delete
                                    </span>
                                </div>
                                <div class="col-md-4 col-4">
                                    <span class="material-icons check" onclick="finishedConfirm(<?= $res['id'] ?>)">check</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
<?php
    } else if($sort == "date_oldest"){
?>
    <?php 
         $all_data = "SELECT * FROM task WHERE id_user='$id_user' ORDER BY tgl_input ASC";
        $query = mysqli_query($conn,$all_data);
            
        while($res = mysqli_fetch_array($query)){        
    ?>
        <div class="card-list">
            <div class="task-name">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h4><?= $res["task"] ?></h4>
                        <span class="tgl_input"><?= $res["tgl_input"] ?></span>
                        <span> / </span>
                        <span class="waktu_input"><?= $res["waktu_input"] ?></span>
                    </div>
                    <div class="col-md-3 col-12 prioritas">
                        <?php
                            if($res["prioritas"] == "1"){
                        ?>
                                <div class="circle" style="background-color: green;">
                                </div>
                                <h5>Low</h5>
                        <?php
                            }
                            else if($res["prioritas"] == "2"){
                        ?>
                                <div class="circle" style="background-color: #F4D03F;">
                                </div>
                                <h5>Medium</h5>
                        <?php
                            }
                            else if($res["prioritas"] == "3"){
                        ?>  
                                <div class="circle" style="background-color: red">
                                </div>
                                <h5>High</h5>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="action-btn">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <span class="material-icons edit" onclick="confirmEdit(<?= $res['id'] ?>)">
                                        edit
                                    </span>
                                </div>
                                <div class="col-md-4 col-4">
                                    <span class="material-icons delete" onclick="confirmDelete(<?php echo $res['id'] ?>)">
                                        delete
                                    </span>
                                </div>
                                <div class="col-md-4 col-4">
                                    <span class="material-icons check" onclick="finishedConfirm(<?= $res['id'] ?>)">check</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
<?php   
    } else if($sort == "date_newest"){
?>
    <?php 
         $all_data = "SELECT * FROM task WHERE id_user='$id_user' ORDER BY tgl_input DESC";
        $query = mysqli_query($conn,$all_data);
            
        while($res = mysqli_fetch_array($query)){        
    ?>
        <div class="card-list">
            <div class="task-name">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h4><?= $res["task"] ?></h4>
                        <span class="tgl_input"><?= $res["tgl_input"] ?></span>
                        <span> / </span>
                        <span class="waktu_input"><?= $res["waktu_input"] ?></span>
                    </div>
                    <div class="col-md-3 col-12 prioritas">
                        <?php
                            if($res["prioritas"] == "1"){
                        ?>
                                <div class="circle" style="background-color: green;">
                                </div>
                                <h5>Low</h5>
                        <?php
                            }
                            else if($res["prioritas"] == "2"){
                        ?>
                                <div class="circle" style="background-color: #F4D03F;">
                                </div>
                                <h5>Medium</h5>
                        <?php
                            }
                            else if($res["prioritas"] == "3"){
                        ?>  
                                <div class="circle" style="background-color: red">
                                </div>
                                <h5>High</h5>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="action-btn">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <span class="material-icons edit" onclick="confirmEdit(<?= $res['id'] ?>)">
                                        edit
                                    </span>
                                </div>
                                <div class="col-md-4 col-4">
                                    <span class="material-icons delete" onclick="confirmDelete(<?php echo $res['id'] ?>)">
                                        delete
                                    </span>
                                </div>
                                <div class="col-md-4 col-4">
                                    <span class="material-icons check" onclick="finishedConfirm(<?= $res['id'] ?>)">check</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
<?php
    }
?>
