<?php
$save_dir = "/var/www/html/tmp/";
function file_upload(&$file)
{
global $save_dir;
$file_name = $save_dir.time().'@'.iconv("UTF-8","EUC-KR", $file['name']);
if(!move_uploaded_file($file['tmp_name'], $file_name))
die('<script type="text/javascript">alert("file upload fail!");history.back()</script>');
return $file_name;
}
function file_download($file_path)
{
if (file_exists($file_path)) {
$file_name = substr(strstr($file_path, '@'),2);
header('Content-Type: file/unknown');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="'.$file_name.'"');
header('Content-Length: ' . filesize($file_path));
header('Pragma: no-cache');
header('Expires: 0');
readfile($file_path);
exit;
}
}
?>
