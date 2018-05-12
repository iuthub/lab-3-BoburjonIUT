<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<?php if(isset($_REQUEST['playlist'])){ ?>
				<a href="music.php" style="border: 1px solid black; padding:5px ; border-radius: 2px; background-color: grey;"> BACK </a>
				<?php } ?>

		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>

		<div id="listarea">
			<ul id="musiclist">

				<?php require("songs/function.php");
					if (!isset($_REQUEST['playlist'])) {
					$musics = glob("songs/*.mp3");
					$playlists = glob("songs/*.txt");
					$m3u = glob("songs/*.m3u");
					if(isset($_REQUEST['shuffle']) && $_REQUEST['shuffle'] == "on"){
						shuffle($playlists);
						shuffle($musics);
					}

					foreach ($musics as $music) { ?>
					 	<li class="mp3item"><a href="songs/<?= basename($music)?>"> <?= basename($music)?> </a><?=" (" . calc(filesize($music)) . ")"?></li>
					 <?php } 
						$playlists = glob("songs/*.txt");

						foreach ($playlists as $playslist) { ?>
						 	<li class="playlistitem"><a href= "?playlist=<?=basename($playslist)?>"> <?= basename($playslist) ?> </a></li>
						 <?php } 

						 foreach ($m3u as $file) { ?>
						 	<li class="playlistitem"><a href= "?playlist=<?=basename($file)?>"> <?= basename($file) ?> </a></li>
						 <?php }
						}
						else{
							$musics = file("songs/" . $_REQUEST['playlist'], FILE_IGNORE_NEW_LINES);
							if(isset($_REQUEST['shuffle']) && $_REQUEST['shuffle'] == "on"){
								shuffle($musics);
							}
							foreach ($musics as $music) {
							if(strpos($music, "#") === false){ ?>
								<li class="mp3item">
									<a href= "<?= basename($music)?>"> <?= basename($music)?> </a>
									<?=" (" . calc(filesize("songs/" . $music)) . ")"?></li>
							<?php }
						}
						}?>
			</ul>
		</div>
	</body>
</html>
