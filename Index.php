<?php 

require "ToDoList.php";
$toDoList = new ToDoList();
$tasks = $toDoList->update(); 

?>

<div class="container">
    <div class="row">
        <form method="GET">
            <label>Task Description</label>
            <input type="text" name="description" id="TaskDescriptionInput">
            <input type="submit" value="Create Task" class="btn btn-success" name="CREATE">
        </form> 
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Tasks</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($tasks as &$task) 
                {
                    echo "<tr>";
                    echo "<form method='GET'>";
                    if ($task->id == $toDoList->UPDATEID)
                    {
                        echo "<td><input type='text' value='". $task->description . "' name='descriptionUpdated'></td>";
                        echo "<td><input type='submit' value='Confirm Update' class='btn btn-success' name='UPDATE'></td>";
                    }
                    else 
                    {
                        echo "<td>". $task->description . "</td>";
                        echo "<td><input type='submit' value='Delete' class='btn btn-danger' name='DELETE'><input type='submit' value='Update' class='btn btn-warning' name='INITUPDATE'></td>";
                    }
                    echo '<td><input type="hidden" value="' . $task->id . '" class="btn btn-danger" name="id"></td>';
                    echo "</form>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require "Footer.php";