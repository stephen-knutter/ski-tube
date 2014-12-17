<?php
	include_once('ski_db_fns.php');
	define('YOUTUBE_CALL', 'http://gdata.youtube.com/feeds/api/playlists/PL4BpgGzFW-7cmkSAtYtMlA-4ShtDLxC63');
	
	
	function get_youtube_id($url){
	$pattern =
    '%^# Match any youtube URL
    (?:https?://)?  # Optional scheme. Either http or https
    (?:www\.)?      # Optional www subdomain
    (?:             # Group host alternatives
      youtu\.be/    # Either youtu.be,
    | youtube\.com  # or youtube.com
      (?:           # Group path alternatives
        /embed/     # Either /embed/
      | /v/         # or /v/
      | .*v=        # or /watch\?v=
      )             # End path alternatives.
    )               # End host alternatives.
    ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
    ($|&).*         # if additional parameters are also in query string after video id.
    $%x'
    ;
    $result = preg_match($pattern, $url, $matches);
    if (false !== $result) {
      return $matches[1];
    }
    return false;
	}
	
	function get_count(){
		$xml = simplexml_load_file(YOUTUBE_CALL);
		$num_videos = count($xml->entry);
		return $num_videos;
	}
	
	function youtube_videos($start, $results_per_page){
		$xml = simplexml_load_file(YOUTUBE_CALL);
		$num_videos = count($xml->entry);
		if($num_videos < $results_per_page){
			$results_per_page = $num_videos;
		}
	
		if($num_videos > 0){
			$conn = db_connect();
			for($i=$start; $i<$results_per_page; $i++){
				$entry = $xml->entry[$i];
				$media = $entry->children('http://search.yahoo.com/mrss/');
				$title = $media->group->title;
				$title = htmlspecialchars($title);
			
				$yt = $media->children('http://gdata.youtube.com/schemas/2007');
				$attrs = $yt->duration->attributes();
				$length_min = floor($attrs['seconds'] / 60);
			
				$time = $length_min . ' min';
			
				$desc = $media->group->description;
			
				$attrs = $media->group->player->attributes();
				$video_url = $attrs['url'];
			
				$id = get_youtube_id($video_url);
			
				$query = "SELECT id FROM videos WHERE id='".$id."'";
				$result = $conn->query($query);
				if($result->num_rows < 1){
					$query = "INSERT INTO videos VALUES('".$id."', '".$title."', '".$desc."')";
					$result = $conn->query($query);
				}
			
				$attrs = $media->group->thumbnail[0]->attributes();
				$thumbnail_url = $attrs['url'];
			
				echo '<li><div class="title">"'.$title.'"</div><div class="time">'.$time.'</div><div class="frontRating">'.get_rating($id).'</div><div class="frontPic"><a href="watch_video.php?title='.$title.'&video='.$id.'"><img src="'.$thumbnail_url.'"></a></div></li>';
			}
		} else {
			echo '<p>Currently No Videos</p>';
		}
	}	
?>