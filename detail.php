<?php
$host = "database-1.cfci0i2kiu6v.ap-south-1.rds.amazonaws.com";
$user = "dayan";
$pass = "YOUR_RDS_PASSWORD";
$db   = "dipti_journey";

$conn = new mysqli($host, $user, $pass, $db);

// Get the ID from the URL
$item_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch skills related to this specific ID
$sql = "SELECT * FROM skills WHERE intro_id = $item_id"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skill Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <a href="index.php" class="btn btn-secondary mb-3">&larr; Back to List</a>
    
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Associated Skills (ID: <?php echo $item_id; ?>)</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Skill Name</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result->num_rows > 0): ?>
                        <?php while($skill = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $skill['id']; ?></td>
                            <td><?php echo $skill['name']; ?></td>
                            <td><?php echo $skill['description']; ?></td>
                            <td>
                                <span class="badge <?php echo $skill['status'] == 1 ? 'bg-success' : 'bg-danger'; ?>">
                                    <?php echo $skill['status'] == 1 ? 'Active' : 'Inactive'; ?>
                                </span>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No skills found for this item.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>

</html>

