<?php 
	$json = file_get_contents('http://api.hnb.hr/tecajn/v1');

	//Decode JSON
	$json_data = json_decode($json,true);
		
	print '<h2>HNB Rate (JSON)</h2>
	<a href="http://api.hnb.hr/tecajn/v1" target="_blank">Link to HNB API (JSON)</a>
			<table>
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
			</table>';
	# Close MySQL connection		
	@mysqli_close($MySQL);
?>