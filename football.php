<?php 
	print '
	<h1>Football API</h1>';
	$uri = 'http://api.football-data.org/v2/competitions/2021/matches/?matchday=2';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 0ca84118345643b18d1f55f21b972d50';
    $stream_context = stream_context_create($reqPrefs);
	
    $response = file_get_contents($uri, false, $stream_context);
    $matches = json_decode($response);
	
	print '
	<h3>Matches for the 2nd matchday of the Premiere League</h3>
    <table class="table table-striped" style="width:50%">
        <tr>
            <th style="width:200px;">HomeTeam</th>
            <th style="width:10px;"></th>
            <th style="width:200px;">AwayTeam</th>
            <th colspan="3" style="width:200px;">Result</th>
        </tr>';
	class FootballData {
		
		public $config;
		public $baseUri;
		public $reqPrefs = array();
			
		public function __construct() {
		
			$this->baseUri = 'http://api.football-data.org/v2/'; 
			
			$this->reqPrefs['http']['method'] = 'GET';
			$this->reqPrefs['http']['header'] = 'X-Auth-Token: 0ca84118345643b18d1f55f21b972d50';
		}
		
		
		function findMatchesByCompetitionAndMatchday($c, $m) {
			$resource = 'competitions/' . $c . '/matches/?matchday=' . $m;

			$response = file_get_contents($this->baseUri . $resource, false, 
										  stream_context_create($this->reqPrefs));
			
			return json_decode($response);
		}
	}
	$api = new FootballData();
		
    foreach ($api->findMatchesByCompetitionAndMatchday(2021, 29)->matches as $match) {
		print '
		<tr>
            <td>' . $match->homeTeam->name . '</td>
            <td>-</td>
            <td>' . $match->awayTeam->name . '</td>
            <td>' . $match->score->fullTime->homeTeam . '</td>
            <td>:</td>
            <td>' . $match->score->fullTime->awayTeam . '</td>
        </tr>';
    }
    print '
	</table>';
?>