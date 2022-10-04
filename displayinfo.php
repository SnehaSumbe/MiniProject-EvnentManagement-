<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
</head>
<body style="margin: 50px;">
    <h1>Organizers</h1>
    <br>
    <table class="table">
        <thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Contact no.</th>
				<th>Type</th>
				<th>Experience</th>
				<th>About Yourself</th>
			</tr>
		</thead>

        <tbody>
            <?php
            $host = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbName = "serviceprovider";

			// Create connection
			$connection = new mysqli($host, $dbUsername, $dbPassword, $dbName);

            // Check connection
			if ($connection->connect_error) {
				die("Connection failed: " . $connection->connect_error);
			}

            // read all row from database table
			$sql = "SELECT * FROM nsp";
			$result = $connection->query($sql);

            if (!$result) {
				die("Invalid query: " . $connection->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["ID"] . "</td>
                    <td>" . $row["myName"] . "</td>
                    <td>" . $row["myEmail"] . "</td>
                    <td>" . $row["myNumber"] . "</td>
                    <td>" . $row["myService"] . "</td>
                    <td>" . $row["myExperience"] . "</td>
                    <td>" . $row["yourself"] .  "</td>
                    
                </tr>";
            }

            $connection->close();
            ?>
        </tbody>
    </table>
</body>
</html>