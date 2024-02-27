<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <div class="add">
        <a href="create_tasks.php"><button>Create Task</button></a>
    </div>
    <div class="table">
        <hr>
        <h3>To Do</h3>
        <div class="table_report">
                <table style="width: 80%" id="table_report" border="1">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Priority</th>
                        <th>Due Date</th>
                        <th>Operations</th>
                    </tr>
                    <?php
                    include("config.php");

                    $check_qry = "SELECT * FROM tasks";
                    $result = $conn->query($check_qry);

                    if ($result->num_rows > 0) {
                        $i = 1;
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['task_id'];
                            

                    ?>
                
                            <tr>
                                <td><?php echo $id ?>.</td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['priority']; ?></td>
                                <td><?php echo $row['due_date']; ?></td>
                                <td>
                                <form action="edit_task.php" method="POST">
                                    <!-- UPDATE -->
                                    <!-- <a href="edit_task.php" name="updateTask" value="<?php echo $id; ?>">edit</a> -->
                                    <input type="hidden" name="task_id" value="<?php echo $id; ?>"> 
                                    <input type="hidden" name="title" value="<?php echo $row['title']; ?>"> 
                                    <input type="hidden" name="description" value="<?php echo $row['description']; ?>"> 
                                    <input type="hidden" name="priority" value="<?php echo $row['priority']; ?>"> 
                                    <input type="hidden" name="due_date" value="<?php echo $row['due_date']; ?>"> 


                                    <button type="submit" name="updateTask">Update</button>
                                    </form>
                                    <form action="process.php" method="POST">
                                <!-- DELETE -->
                                    <input type="hidden" name="task_id" value="<?php echo $id; ?>">
                                    <button type="submit" name="deleteTask">Delete</button>
                                </td>
                                </form>
                        <?php
                        }
                    } else {
                        echo "<tr><td colspan='6'>No tasks found</td></tr>";
                    }
                        ?>
                </table>
        
        </div>
    </div>

    <!-- PROMPT DIALOG GAMIT SWEET ALERT UG POPPER -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
    if (isset($_SESSION['status']) && $_SESSION['status_code'] != '') {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
            });
        </script>
    <?php
        unset($_SESSION['status']);
        unset($_SESSION['status_code']);
    }
    ?>

</body>

</html>