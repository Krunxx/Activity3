<?php
session_start();
$db = new mysqli("localhost", "root", "", "task_management");

if(!$db){
    die("Error in db". mysqli_connect_error());
} else {
    // Check if task_id is set in the URL
    if(isset($_POST['updateTask'])) {
        $id = $_POST['task_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];
        $due_date = $_POST['due_date'];
        
        $_SESSION['task_id'] = $id;

        // echo $id;
        // echo $title;
        // echo $description;
        // echo $priority;
        // echo $due_date;

        $qry = "SELECT * FROM tasks WHERE task_id = $id";
        
        $run = $db->query($qry);
        
        // Check if query executed successfully
        if($run !== false && $run->num_rows > 0) {
            while($row = $run->fetch_assoc()) {
                $title = $row['title'];
                $description = $row['description'];
                $priority = $row['priority'];
                $due_date = $row['due_date'];
            }
        } else {
            echo "Error: Task not found";
        }
    } else {
        echo "Error: Task ID not provided";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT A TASK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <form action="process.php" method="POST">
        <label>Title</label>
            <input type="text" name="title" placeholder="Enter title" value="<?php echo $title; ?>" required>
            <br><br>
            <label>Description</label>
            <input type="text" name="description" placeholder="Enter Description" value="<?php echo $description; ?>" required>
            <br><br>
            <label for="priority">priority</label required>
            <select name="priority" id="priority">
                <option value="Low" <?php if($priority == 'Low') echo 'selected'; ?> >Low</option>
                <option value="Medium" <?php if($priority == 'Medium') echo 'selected'; ?>>Medium</option>
                <option value="High" <?php if($priority == 'High') echo 'selected'; ?>>High</option>
            </select>
            <br><br>
            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" name="due_date" class="form-control" value="<?php echo $due_date; ?>"  required>
            <button type="submit" name="processTask">Submit</button><br><br>
        </form>

    </div>
</body>

</html>