<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "dipti_journey");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM introduction"; // Replace 'products' with your actual table name
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Biography</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">My AutoBiography</h2>
    <div class="table-responsive shadow-sm bg-white p-3 rounded">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Short Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td>
                        <img src="https://via.placeholder.com/80" class="rounded" alt="static-img">
                    </td>
                    <td>
                        <a href="detail.php?id=<?php echo $row['id']; ?>" class="fw-bold text-decoration-none">
                            <?php echo $row['name']; ?>
                        </a>
                    </td>
                    <td><?php echo $row['short_description']; ?></td>
                    <td>
                        <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-primary">View Skills</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>