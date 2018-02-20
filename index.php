<!DOCTYPE html>
<html>
<head>
	<title>Upload Dailymotion</title>
	<link rel="stylesheet" type="text/css" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css" />
</head>
<body class="container">
	<form method="POST" action="upload.php" enctype="multipart/form-data">
		<div class="form-group">
			<label for="video_file">Anexar Vídeo</label>
			<input type="file" name="video_file" id="video_file" class="form-control">
		</div>
		<div class="form-group">
			<label for="video_title">Título do vídeo</label>
			<input type="text" name="video_title" id="video_title" class="form-control">
		</div>
		<div class="form-group">
			<label for="video_description">Descrição do vídeo</label>
			<textarea name="video_description" id="video_description" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="video_tags">Tags do Vídeo</label>
			<input type="text" name="video_tags" id="video_tags" class="form-control">
		</div>

		<button type="submit" class="btn btn-default">Enviar</button>
	</form>
</body>
</html>