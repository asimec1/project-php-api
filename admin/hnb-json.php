<?php 
$json = file_get_contents('http://api.hnb.hr/tecajn/v1');

//Decode JSON
$json_data = json_decode($json,true);
		
print '
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
	  body {
		width: 80%;
		margin: 0 auto;
	  }
	</style>
</head>
	<body>
		<h2>HNB Rate (JSON)</h2>
		<a href="http://api.hnb.hr/tecajn/v1" target="_blank">Link to HNB API (JSON)</a>
			<table class="table">
				<thead>
					<tr>
						<th width="16">exchange number</th>
						<th width="42">date</th>
						<th width="16">country</th>
						<th width="16">code</th>
						<th width="16">currency</th>
						<th width="32">unit</th>
						<th width="100">buying</th>
						<th width="100">middle</th>
						<th width="100">selling</th>
					</tr>
				</thead>
				<tbody>';
				foreach($json_data as $key => $value) { 
						
				print '
				<tr>
					<td>' . $json_data[$key]["Broj tečajnice"] . '</td>
					<td>' . $json_data[$key]["Datum primjene"] . '</td>
					<td>' . $json_data[$key]["Država"] . '</td>
					<td>' . $json_data[$key]["Šifra valute"] . '</td>
					<td>' . $json_data[$key]["Valuta"] . '</td>
					<td>' . $json_data[$key]["Jedinica"] . '</td>
					<td>' . $json_data[$key]["Kupovni za devize"] . '</td>
					<td>' . $json_data[$key]["Srednji za devize"] . '</td>
					<td>' . $json_data[$key]["Prodajni za devize"] . '</td>
				</tr>';
			}
			print '
			</tbody>
		</table>
	</body>
</html>';
	
?>
