<?php 

require "ToDoList.php";
$toDoList = new ToDoList();
$toDoList->update();
$tasks = $toDoList->getTasks();

?>

<!--<div class="container">
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
                //<?php 
//                foreach ($tasks as &$task) 
//                {
//                    echo "<tr>";
//                    echo "<form method='GET'>";
//                    if ($task->id == $toDoList->UPDATEID)
//                    {
//                        echo "<td><input type='text' value='". $task->description . "' name='descriptionUpdated'></td>";
//                        echo "<td><input type='submit' value='Confirm Update' class='btn btn-success' name='UPDATE'></td>";
//                    }
//                    else 
//                    {
//                        echo "<td>". $task->description . "</td>";
//                        echo "<td><input type='submit' value='Delete' class='btn btn-danger' name='DELETE'><input type='submit' value='Update' class='btn btn-warning' name='INITUPDATE'></td>";
//                    }
//                    echo '<td><input type="hidden" value="' . $task->id . '" class="btn btn-danger" name="id"></td>';
//                    echo "</form>";
//                    echo "</tr>";
//                }
//                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>-->



<div class="container">
    <div class="row">
        <form method="GET">
            <label>Task Description</label>
            <input type="text" name="description" id="TaskDescriptionInput">
            <input type="submit" value="Create Task" class="btn btn-success">
            <input type="hidden" name="action" value="create">
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
                        echo "<td align='right'><button type='submit' name='action' value='update' class='btn btn-success'>Update</button>";
                    }
                    else 
                    {
                        echo "<td>". $task->description . "</td>";
                        echo "<td align='right'><button type='submit' name='action' value='delete' class='btn btn-danger'>Delete</button> &nbsp;";
                        echo "<button type='submit' name='action' value='initupdate' class='btn btn-warning'>Update</button></td>";
                    }
                    echo '<input type="hidden" name="id" value="' . $task->id . '">';
                    echo "</form>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>