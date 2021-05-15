<?php
    try {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=eliteanywhere", 'root', '');
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    $query = $pdo->query("SELECT * FROM users WHERE id < 75");
    $query->setFetchMode(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $query->fetch()): ?>
                    <tr>
                        <td><?= $row->first_name . ' ' . $row->last_name ?></td>
                        <td><?= $row->email ?></td>
                        <td><?= ($row->status == 1) ? 'Active' : 'Not Active' ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
