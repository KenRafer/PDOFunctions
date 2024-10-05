<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
    <?php
    $query = "SELECT
	 			CASE 
	 				WHEN TripID = 1 THEN 'New York'
	 				WHEN TripID = 2 THEN 'Los Angeles'
	 				WHEN TripID = 3 THEN 'Chicago'
	 				WHEN TripID = 4 THEN 'Miami'
                    WHEN TripID = 5 THEN 'Houston'
	 			END AS TripID, COUNT(*) AS distanceCount
				FROM trips
	 			GROUP BY TripID
	 		  ";

	 $stmt = $pdo->prepare($query);
	 $executeQuery = $stmt->execute();

	 if ($executeQuery) {
	 	$distanceByTripID = $stmt->fetchAll();
	 }

	 else {
	 	echo "Query failed";
	 }

	?>
	
	<table>
		<tr>
			<th>TripID</th>
			<th>Distance</th>
		</tr>
		<?php foreach ($distanceByTripID as $row) { ?>
		<tr>
			<td><?php echo $row['TripID']; ?></td>
			<td><?php echo $row['distanceCount']; ?></td>
		</tr>
		<?php } ?>
	</table> 
    
</body>
</html>