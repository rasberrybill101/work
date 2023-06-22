<?php
$file = '/var/www/vhosts/verilert.com/backend/download/prod-apk/app-release.apk';

// necessary CORS headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/vnd.android.package-archive');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    
    // Output the file
    readfile($file);
    exit;
} else {
    // Handle the error
    echo 'File not found.';
}

?>