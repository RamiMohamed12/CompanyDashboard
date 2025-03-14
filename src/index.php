<html> 
    <head> 
    <meta charset="utf-8">
    <title> Dashboard </title>
    <link rel="stylesheet" href="style.css">    
</head>
    
<body> 
    
    <h2> Database table </h2> 
    <table> 
        <thead> 
        <tr> 
            <th> ID </th> 
            <th> Name </th> 
            <th> Address </th> 
            <th> Salary </th> 
            <th> Action </th>
        </tr>
        </thead>
    
    <tbody> 

        <?php 
        require_once "config.php";
        $message = "";
        $message_class = "";

        // Process delete action if ID is provided
        if(isset($_GET['delete_id'])) {
            $id = $_GET['delete_id'];
            $delete_sql = "DELETE FROM employees WHERE id = :id";
            $delete_stmt = $pdo->prepare($delete_sql);
            $delete_stmt->bindParam(':id', $id);
            $delete_stmt->execute();
            $message = "Record deleted successfully";
            $message_class = "success";
        }
        
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $salary = $_POST['salary'];
            
            // Validate input before attempting database insertion
            if ($salary < 0) {
                $message = "Salary must be a positive number";
                $message_class = "error";
            } 
            else if ($salary > 10000000000) {
                $message = "Out of bounds";
                $message_class = "error";
            }
            else {
                // Only perform database insertion if validation passes
                $sql2 = "INSERT INTO employees (name, address, salary) VALUES (:name, :address, :salary)";
                $stmt = $pdo->prepare($sql2);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':address', $address);
                $stmt->bindParam(':salary', $salary);
                
                if($stmt->execute()) {
                    $message = "Employee added successfully";
                    $message_class = "success";
                } else {
                    $message = "Error adding employee";
                    $message_class = "error";
                }
            }
        }
        
        // Display all employees
        $sql = "SELECT * FROM employees";
        $result = $pdo->query($sql);
        if ($result->rowCount() > 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                echo "<td>". $row["id"] . "</td>";
                echo "<td>". $row["name"] . "</td>";
                echo "<td>". $row["address"] . "</td>";
                echo "<td>". $row["salary"] . "</td>";
                echo "<td><a href='index.php?delete_id=" . $row["id"] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'> No data found </td></tr>";
        }
        
        // HTML form for user input
        echo "<form method='post' action=''>";
        echo "<tr>";
        echo "<td></td>";
        echo "<td><input type='text' name='name' placeholder='Enter name'></td>";
        echo "<td><input type='text' name='address' placeholder='Enter address'></td>";
        echo "<td><input type='number' name='salary' placeholder='Enter salary'></td>";
        echo "<td><input type='submit' name='submit' value='Add Employee'></td>";
        echo "</tr>";
        echo "</form>";

        $pdo = null;
        ?>

    </tbody>
    </table>

    <?php if(!empty($message)): ?>
    <div id="message" class="message <?php echo $message_class; ?>">
        <?php echo $message; ?>
    </div>
    <script>
        // Make message disappear after 3 seconds
        setTimeout(function() {
            document.getElementById('message').style.display = 'none';
        }, 3000);
    </script>
    <?php endif; ?>
</body>

</html>