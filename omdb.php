<?php 
	print '
	<h1>OMDB</h1>';
	if (!isset($_POST['action']) || $_POST['action'] == '') { $_POST['action'] = FALSE; }
		
		if ($_POST['action'] == FALSE) {
			print '
			  <h1 style="text-align:center;">Search IMDB (form)</h1>
			  <form class="form-horizontal" action="" name="imdbsearch" method="POST">
				<div class="form-group">
				  <label class="control-label col-sm-2" for="title">Title*:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="title" placeholder="Enter movie title, example: Fight club; Bad boys" name="title" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="year">Year:</label>
				  <div class="col-sm-10">          
					<input type="year" class="form-control" id="year" placeholder="Enter year of the movie, example: 1999; 1995; 2020" name="year" pattern="[0-9]{4}">
				  </div>
				</div>
				<input type="hidden" name="action" value="TRUE">
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<input type="submit" value="Submit">
				  </div>
				</div>
			  </form>';
		} 
		else if ($_POST['action'] == TRUE) {
			print '
			<h1>Result of your search</h1>';
			$key = 'be5ea402';
		
			if ($_POST['year'] != '') { $url = 'http://www.omdbapi.com/?apikey='.$key.'&t=' . urlencode($_POST['title']) . '&y=' . urlencode($_POST['year']); } 
			else { $url = 'http://www.omdbapi.com/?apikey='.$key.'&t=' . urlencode($_POST['title']); }

			$json = file_get_contents($url);
			$_data = json_decode($json,true);

			if (isset($_data['Title']) && $_data['Title'] != '') {
				print '
				<p><a href="index.php?menu=10">BACK</a></p>
				<div style="float: left;width: 22%;margin-right: 2%;">
					<img src="' . $_data['Poster'] . '" alt="' . $_data['Title'] . '" style="width: 100%;border:1px solid grey; padding: 2px; margin:0 10px 10px 0; float:left;">
				</div>
				<div style="float:left;width:70%">
					<p><strong>Movie title:</strong> ' . $_data['Title'] . '</p>
					<p><strong>Year:</strong> ' . $_data['Year'] . '</p>
					<p><strong>Rated:</strong> ' . $_data['Rated'] . '</p>
					<p><strong>Released:</strong> ' . $_data['Released'] . '</p>
					<p><strong>Runtime:</strong> ' . $_data['Runtime'] . '</p>
					<p><strong>Genre:</strong> ' . $_data['Genre'] . '</p>
					<p><strong>Director:</strong> ' . $_data['Director'] . '</p>
					<p><strong>Writer:</strong> ' . $_data['Writer'] . '</p>
					<p><strong>Actors:</strong> ' . $_data['Actors'] . '</p>
					<p><strong>Plot:</strong> ' . $_data['Plot'] . '</p>
					<p><strong>Language:</strong> ' . $_data['Language'] . '</p>
					<p><strong>Country:</strong> ' . $_data['Country'] . '</p>
					<p><strong>Awards:</strong> ' . $_data['Awards'] . '</p>
					<p><strong>Ratings:</strong> ' . $_data['Ratings'][0]['Source'] . ': ' . $_data['Ratings'][0]['Value'] . '</p>
					<p><strong>imdbRating:</strong> ' . $_data['imdbRating'] . '</p>
					<p><strong>Production:</strong> ' . $_data['Production'] . '</p>
					<p><strong>Website:</strong> <a href="' . $_data['Website'] . '">' . $_data['Website'] . '</a></p>
				</div>
				<div style="clear:both"></div>';
			}
			else {
				echo '<p>Something went wrong</p>';
			}
		}
	print '
	</div>';
?>