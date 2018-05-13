<?php

//Get the helper functions for metadata getters
require_once("meta_helpers.php");

/*Returns an array of image metadata for PNG, JPG and GIF for locally stored files */
function image_local_metadata($file_path) {
  $image_info = array();
  $ext = get_file_extension($file_path);
  $image_info['guid'] = get_guid();
  $image_info['name'] = basename($file_path, ".".$ext);
  $image_info['type'] = get_file_extension($file_path);
  $image_info['width'] = getimagesize($file_path)[0];
  $image_info['height'] = getimagesize($file_path)[1];
  $image_info['size'] = filesize($file_path);
  $image_info['timeCreated'] = filemtime($file_path);
  $image_info['timeEntered'] = time();
  $image_info['path'] = $file_path;

  return $image_info;
}


/*Returns an array of image metadata for PNG, JPG and GIF for URL based files */
function image_URL_metadata($file_path) {
  $image_info = array();
  $ext = get_file_extension($file_path);
  $image_info['guid'] = get_guid();
  $image_info['name'] = basename($file_path, ".".$ext);
  $image_info['type'] = get_file_extension($file_path);
  $image_info['width'] = getimagesize($file_path)[0];
  $image_info['height'] = getimagesize($file_path)[1];
  $image_info['size'] = remote_filesize($file_path);
  $image_info['timeCreated'] = remote_time($file_path);
  $image_info['timeEntered'] = time();
  $image_info['path'] = $file_path;

  return $image_info;
}

/*Returns an array of metadata for MS Word files */
function DOCX_local_metadata($file_path) {
  $text_info = array();
  $ext = get_file_extension($file_path);
  $text_info['guid'] = get_guid();
  $text_info['name'] = basename($file_path, ".".$ext);
  $text_info['type'] = get_file_extension($file_path);
  $text_info['size'] = filesize($file_path);
  $text_info['timeCreated'] = filemtime($file_path);
  $text_info['timeEntered'] = time();
  $text_info['numberOfChars'] = extract_DOCX_text($file_path);
  $text_info['path'] = $file_path;

  return $text_info;
}

/*Returns an array of metadata for local XML and TXT files */
function text_local_metadata($file_path) {
  $text_info = array();
  $ext = get_file_extension($file_path);
  $text_info['guid'] = get_guid();
  $text_info['name'] = basename($file_path, ".".$ext);
  $text_info['type'] = get_file_extension($file_path);
  $text_info['size'] = filesize($file_path);
  $text_info['timeCreated'] = filemtime($file_path);
  $text_info['timeEntered'] = time();
  $text_info['numberOfChars'] = strlen(file_get_contents(($file_path)));
  $text_info['path'] = $file_path;

  return $text_info;
}

/*Returns an array of metadata for URL based XML and TXT files */
function text_URL_metadata($file_path) {
  $image_info = array();
  $ext = get_file_extension($file_path);
  $image_info['guid'] = get_guid();
  $image_info['name'] = basename($file_path, ".".$ext);
  $image_info['type'] = get_file_extension($file_path);
  $image_info['size'] = remote_filesize($file_path);
  $image_info['timeCreated'] = remote_time($file_path);
  $image_info['timeEntered'] = time();
  $image_info['numberOfChars'] = strlen(file_get_contents(($file_path)));
  $image_info['path'] = $file_path;

  return $image_info;
}

/*Returns an array of metadata for URL based HTML files */
function HTML_URL_metadata($file_path) {
  $image_info = array();
  $ext = get_file_extension($file_path);
  $image_info['guid'] = get_guid();
  $image_info['name'] = basename($file_path, ".".$ext);
  $image_info['type'] = get_file_extension($file_path);
  $image_info['size'] = remote_filesize($file_path);
  $image_info['timeCreated'] = remote_time($file_path);
  $image_info['timeEntered'] = time();
  $image_info['path'] = $file_path;

  return $image_info;
}

/*Returns an array of metadata for local HTML files */
function HTML_local_metadata($file_path) {
  $image_info = array();
  $ext = get_file_extension($file_path);
  $image_info['guid'] = get_guid();
  $image_info['name'] = basename($file_path, ".".$ext);
  $image_info['type'] = get_file_extension($file_path);
  $image_info['size'] = filesize($file_path);
  $image_info['timeCreated'] = filemtime($file_path);
  $image_info['timeEntered'] = time();
  $image_info['path'] = $file_path;

  return $image_info;
}

/*Returns an array of metadata for local MP3 and WAV audio files */
function audio_local_metadata($file_path) {
  $audio_info = array();
  $audio_info['guid'] = get_guid();
  $audio_info['type'] = get_file_extension($file_path);
  $audio_info['name'] = basename($file_path, ".".$audio_info['type']);
  $audio_info['size'] = filesize($file_path);
  $audio_info['timeCreated'] = filemtime($file_path);
  $audio_info['timeEntered'] = time();
  $audio_info['audioLength'] = get_local_audio_length($file_path);
  $audio_info['path'] = $file_path;

  return $audio_info;
}

/*Returns an array of metadata for local MP4 and MOV video files */
function video_local_metadata($file_path) {
  $video_info = array();
  $video_info['guid'] = get_guid();
  $video_info['type'] = get_file_extension($file_path);
  $video_info['name'] = basename($file_path, ".".$video_info['type']);
  $video_info['size'] = filesize($file_path);
  $video_info['timeCreated'] = filemtime($file_path);
  $video_info['timeEntered'] = time();
  $video_info['videoLength'] = get_local_video_data($file_path)[1];
  $video_info['videoResolution'] = get_local_video_data($file_path)[0];
  $video_info['path'] = $file_path;

  return $video_info;
}

/*Returns an array of metadata for URL based MP4 and MOV video files */
function video_URL_metadata($file_path) {
  $image_info = array();
  $ext = get_file_extension($file_path);
  $image_info['guid'] = get_guid();
  $image_info['name'] = basename($file_path, ".".$ext);
  $image_info['type'] = get_file_extension($file_path);
  $image_info['size'] = get_URL_video_data($file_path)[2];
  $image_info['timeCreated'] = remote_time($file_path);
  $image_info['timeEntered'] = time();
  $image_info['videoLength'] = get_URL_video_data($file_path)[1];
  $image_info['videoResolution'] = get_URL_video_data($file_path)[0];
  $image_info['path'] = $file_path;

  return $image_info;
}

/*Returns an array of metadata for URL based MP3 and WAV audio files */
function audio_URL_metadata($file_path) {
  $image_info = array();
  $ext = get_file_extension($file_path);
  $image_info['guid'] = get_guid();
  $image_info['name'] = basename($file_path, ".".$ext);
  $image_info['type'] = get_file_extension($file_path);
  $image_info['size'] = get_URL_audio_data($file_path)[1];
  $image_info['timeCreated'] = remote_time($file_path);
  $image_info['timeEntered'] = time();
  $image_info['audioLength'] = get_URL_audio_data($file_path)[0];
  $image_info['path'] = $file_path;

  return $image_info;
}

 ?>
