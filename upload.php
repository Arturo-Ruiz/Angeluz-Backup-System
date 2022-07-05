<?php

include 'api-google/vendor/autoload.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=respaldo-database-eabfd082c9ee.json');    // Path to service account credentials

$client = new Google_Client();

$client->useApplicationDefaultCredentials();

$client->setScopes(['https://www.googleapis.com/auth/drive.file']);

try {
    //code...
    $service = new Google_Service_Drive($client);

    $file_path = 'C:\Upload\test.txt';

    $file = new Google_Service_Drive_DriveFile();
    $file->setName('test.txt');
    $file->setParents(array("1Ai92X0uuovpO8Rcfeg-eXnzr3B0K3357"));


    $resultado = $service->files->create($file, array(
        'data' => file_get_contents($file_path),
        'uploadType' => 'multipart',
    ));

    

} catch (Google_Service_Exception $gs) {

    $mensaje = json_decode($gs->getMessage());
    echo $mensaje->error->message();

} catch (Exception $e) {

    echo $e->getMessage();

}
