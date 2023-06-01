<?php
require_once 'includes/functions.inc.php';
if(isset($_GET["isbn"])){
    $isbn = cleanTextInput($_GET["isbn"]);
    $query = "SELECT file, title FROM book WHERE isbn = '$isbn'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $file = "assets/pdf/" . $row["file"];
        $file_type = mime_content_type($file);
        echo $file_type;
        header('Content-Description: Book Download');
        // header('Content-Type: application/force-download');
        header('Content-Type: ' . mime_content_type($file));
        header("Content-Disposition: attachment; filename=\"". basename($file) . "\";");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        // ob_clean();
        // flush();
        readfile($file);
        exit;        
    }
}