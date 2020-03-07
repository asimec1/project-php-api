<?php 
	#Fetch HNB XML 
	$xml = simplexml_load_file("http://api.hnb.hr/tecajn/v1?valuta=EUR&format=xml") or die("Error: Cannot create object");
		
	print '<h2>HNB Rate (XML)</h2>
	<a href="http://api.hnb.hr/tecajn/v1?valuta=EUR&format=xml" target="_blank">Link to HNB API (XML)</a>
			<table>
				<thead>
					<tr>
						<th>exchange number</th>
						<th>date</th>
						<th>country</th>
						<th>code</th>
						<th>currency</th>
						<th>unit</th>
						<th>buying</th>
						<th>middle</th>
						<th>selling</th>
					</tr>
				</thead>
				<tbody>';
				foreach ($xml->children() as $row) {
					$broj_tecajnice = $row->broj_tecajnice;
					$datum = $row->datum;
					$drzava = $row->drzava;
					$sifra_valute = $row->sifra_valute;
					$valuta = $row->valuta;
					$jedinica = $row->jedinica;
					$kupovni_tecaj = $row->kupovni_tecaj;
					$srednji_tecaj = $row->srednji_tecaj;
					$prodajni_tecaj = $row->prodajni_tecaj;
					
					$query  = "SELECT datum FROM hnb_xml";
					$result = @mysqli_query($MySQL, $query);
					$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
					if ($row['datum'] != $datum) {
						#Insert data to database
						$_query  = "INSERT INTO hnb_xml (broj_tecajnice, datum, drzava, sifra_valute, valuta, jedinica, kupovni_tecaj, srednji_tecaj, prodajni_tecaj)";
						$_query .= " VALUES ('" . htmlspecialchars($broj_tecajnice, ENT_QUOTES) . "', '" . htmlspecialchars($datum, ENT_QUOTES) . "', '" . htmlspecialchars($drzava, ENT_QUOTES) . "', '" . htmlspecialchars($sifra_valute, ENT_QUOTES) . "', " . (int)$valuta . ", " . (int)$jedinica . ", '" . htmlspecialchars($kupovni_tecaj, ENT_QUOTES) . "', '" . htmlspecialchars($srednji_tecaj, ENT_QUOTES) . "', '" . htmlspecialchars($prodajni_tecaj, ENT_QUOTES) . "')";
						$_result = @mysqli_query($MySQL, $_query); 
					}
					print '
					<tr>
						<td>' . $broj_tecajnice . '</td>
						<td>' . $datum . '</td>
						<td>' . $drzava . '</td>
						<td>' . $sifra_valute . '</td>
						<td>' . $valuta . '</td>
						<td>' . $jedinica . '</td>
						<td>' . $kupovni_tecaj . '</td>
						<td>' . $srednji_tecaj . '</td>
						<td>' . $prodajni_tecaj . '</td>
					</tr>';
				}
			print '
				</tbody>
			</table>';
	# Close MySQL connection		
	@mysqli_close($MySQL);
?>