<?php
	require_once "01_db_conn.php";

	// Prepare and execute query
	$sql = "SELECT * FROM student";
	$result = $conn->query($sql);

	// Check for query error
	if (!$result) {
		die("Query failed: " . $conn->error);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Information</title>
</head>
<body>

	<h1 style="text-align:center;">Student Information</h1>

	<table border="1" cellpadding="10" width="800px" style="margin: 0 auto;">
		<tr>
			<th>Name</th>
			<th>Program</th>
			<th>Contact</th>
			<th>Operation</th>
		</tr>

		<?php if ($result->num_rows > 0): ?>
			<?php while ($r = $result->fetch_assoc()): ?>
				<tr>
					<td><?php echo htmlspecialchars($r['Name']); ?></td>
					<td><?php echo htmlspecialchars($r['Program']); ?></td>
					<td><?php echo htmlspecialchars($r['Contact']); ?></td>
					<td>
						<a href="delete.php?id=<?php echo urlencode($r['ID']); ?>">Delete</a> | 
						<a href="updateinquiry.php?id=<?php echo urlencode($r['ID']); ?>">Update</a>
					</td>
				</tr>
			<?php endwhile; ?>
		<?php else: ?>
			<tr><td colspan="4" style="text-align:center;">No records found</td></tr>
		<?php endif; ?>
	</table>

</body>
</html>
