<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missing Records</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-8HxJfWJwKk78vq5wLObPwvU70DE9kC/eAgRTBTjxoIU6hsLkqFVJ8WBo+t/W0lOZ" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
<h2>Missing Records Data</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Year</th>
                    <th>Year Range</th>
                    <th>Items</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($missingRecordsData as $record) : ?>
                    <tr>
                        <td><?php echo $record['title']; ?></td>
                        <td><?php echo $record['year']; ?></td>
                        <td><?php echo $record['year_range']; ?></td>
                        <td><?php echo $record['items']; ?></td>
                        <td><?php echo $record['remarks']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-jjF5xIFN5c6enT8OKTPUCcXD6GyTpmfMUF2S7k/+2EZjBN+6k+0UktpS3T3+sa3P" crossorigin="anonymous"></script>
</body>
</html>
