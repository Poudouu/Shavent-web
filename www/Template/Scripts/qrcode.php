<?php

include "../phpqrcode/qrlib.php";
$fileName='event.png';
$tempDir= "../Temp";
$codeContents = 'event';
$pngAbsoluteFilePath = $tempDir.$fileName;
QRcode::png($codeContents,$pngAbsoluteFilePath);

$file = $pngAbsoluteFilePath;
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($file).'"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
readfile($file);

?>

