<?php

require 'vendor/autoload.php';

$allowedTypeArr = array(
	"video/mp4", "video/avi", "video/mpeg", "video/mpg", "video/mov", "video/wmv", "video/rm"
);

if(isset($_FILES['video_file'])){
	$title = $_POST['video_title'];
	$description = $_POST['video_description'];
	$tags = $_POST['video_tags'];

	if($_FILES['video_file']['name'] != ''){
		$file_name = str_shuffle('codexworld').'-'.basename($_FILES["video_file"]["name"]);
		$file_path = "videos/" . $file_name;

		if(in_array($_FILES['video_file']['type'], $allowedTypeArr)){
		    if(move_uploaded_file($_FILES['video_file']['tmp_name'], $file_path)){
		    	$apiKey = "your_api_key";
				$apiSecret = "your_api_secret";

				$videotitle = $title;
				$videocategory = "Category of the video";
				$videotags = $tags;
				$videodescription = $description;

				$api = new Dailymotion();
				try{
					$api->setGrantType(
						Dailymotion::GRANT_TYPE_PASSWORD, 
						$apiKey, 
						$apiSecret, 
						array('write','delete'), array(
							'username' => "your_email", 
							'password' => "your_password"
						)
					);
					$url = $api->uploadFile($file_path);

					$result = $api->call('video.create', array('url' => $url, 'title' => $videotitle , 'channel' => $videocategory , 'tags' => $videotags, 'description' => $videodescription, 'published' => true)); 
					$videourl = 'http://www.dailymotion.com/video/'.$result['id'];
					var_dump($result['id']);
					die();
				}catch (DailymotionAuthRequiredException $e){
				    var_dump($e);
				   	die();
				}
				catch (DailymotionAuthRefusedException $e)
				{
				   var_dump($e->getMessage());
				   die();
				}
    		}else{
    			var_dump("erro ao mover o video");
    			die();
    		}
    	}else{
    		var_dump("Erro ao buscar extensão do video");
    		die();
    	}
	}
}