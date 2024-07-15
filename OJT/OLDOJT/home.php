<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GreenGuardian</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
	<link rel="stylesheet" href="css/style.css" />
	<link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	
</head>
<body>
<div class="app">
		<div class="menu-toggle">
			<div class="hamburger">
				<span></span>
			</div>
		</div>

		<aside class="sidebar">
			<div class="row sidebar-header">
				<a class="col" href="home.php" style="color: white;">
					<img class="col" src="images/SANTAROSA.png" width="50" height="50">
					Admin</a>
				<hr/>
			</div>
			<!--<div class="profile <?= $_SESSION['Status'] === 'Occupied' ? 'occupied' : 'available' ?>">
				<h3><?= $_SESSION['FirstName']; ?> <?= $_SESSION['LastName']; ?></h3>
				<p><?= $_SESSION['Role']; ?> </p>
				<p class="status">Status: <?= $_SESSION['Status']; ?></p>
			</div>-->                 
			 
			<nav class="menu">
				<a href="home.php" class="menu-item is-active"><i class="fas fa-chart-line"></i>Dashboard</a>
				<a href="forms.php" class="menu-item"><i class="fas fa-file-alt"></i>Forms</a>
				<a href="home-user.php" class="menu-item"><i class="fas fa-user"></i>Users</a>
				<a href="vaccines.php" class="menu-item"><i class="fas fa-map-pin"></i>Vaccines</a>
				<a href="logout.php" class="menu-item"><i class="fas fa-arrow-left"></i>Logout</a>
			</nav>

		</aside>

		<main class="content">
			<h1>Dashboard</h1>
			<hr>
			<div class="row">
  <section class="box col">
    <h4>Covid Vaccinations</h4>
    <input type="date" id="startDateCovid" value="<?php echo date('Y-m-d'); ?>">
    <input type="date" id="endDateCovid" value="<?php echo date('Y-m-d'); ?>">
    <canvas id="line-chartcanvas-1"></canvas>
    <button onclick="checkLatestEntries()">Check Latest Entries</button>
  </section>

  <section class="box col">
    <h4>Pertussis Vaccinations</h4>
    <input type="date" id="startDatePertussis" value="<?php echo date('Y-m-d'); ?>">
    <input type="date" id="endDatePertussis" value="<?php echo date('Y-m-d'); ?>">
    <canvas id="line-chartcanvas-2"></canvas>
    <button onclick="checkLatestEntries()">Check Latest Entries</button>
  </section>
</div>

				<section class="box col">
					<h4>Latest reports</h4>
					<div class="container mt-3">
						<div class="table-responsive-lg">
							<table class="table table-responsive">
								<thead>
								  <tr>
									<th>Date</th>
									<th>Ticket No.</th>
									<th>Status</th>
									<th>Details</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
								  <?php
									while ($row = $result->fetch_assoc()) 
									{
									?>
									<td><?php echo $row['date'];?></td>
									<td><?php echo $row['ticketnum'];?></td>
									<td><?php echo $row['status'];?></td>
									<td><?php echo '<a href="reports-view.php?ticketnum='.$row['ticketnum'].'" class="button-3">View</a>';?></td>
								  </tr>
								  <?php
									}
								?>
								</tbody>
							  </table>
						</div>
					</div>
				</section>
			</div>
			
					
				</section>

				<!-- Doughnut chart section -->
				<section class="col">
					<div style="margin: 1rem">
						<canvas id="doughnut-chartcanvas-1" width="100" height="100"></canvas>
					</div>
				</section>
				
			</div>

			
		</main>
	</div>

	<!-- javascript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
	<script>
		//setup for date
		const dateArrayJS = <?php echo json_encode($dateArray); ?>;
		//console.log(dateArrayJS);

		const dateChartJS = dateArrayJS.map((day, index) => {
			let dayjs = new Date(day);
			return dayjs.setHours(0, 0, 0, 0);
		});


		// render init block
		const myChart = new Chart(
			document.getElementById('myChart'),
			config
			);

		// Instantly assign Chart.js version
		const chartVersion = document.getElementById('chartVersion');
		chartVersion.innerText = Chart.version;
	</script>

	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/3.0.1/chartjs-plugin-annotation.min.js" integrity="sha512-Hn1w6YiiFw6p6S2lXv6yKeqTk0PLVzeCwWY9n32beuPjQ5HLcvz5l2QsP+KilEr1ws37rCTw3bZpvfvVIeTh0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script src="js/togglemenu.js"></script>
	<script src="js/line-chart.js"></script>
	<script src="js/doughnut-chart.js"></script>
	
</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>