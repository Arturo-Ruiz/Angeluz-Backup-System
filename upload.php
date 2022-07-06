<?php

include 'api-google/vendor/autoload.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=respaldo-database-eabfd082c9ee.json');    // Path to service account credentials

$client = new Google_Client();

$client->useApplicationDefaultCredentials();

$client->setScopes(['https://www.googleapis.com/auth/drive.file']);

try {
    //code...
    $service = new Google_Service_Drive($client);

    $file_path = 'C:\xampp\htdocs\Angeluz-Backup-System\upload.txt';

    $file_name = 'test.txt';

    $file = new Google_Service_Drive_DriveFile();

    $result = $service->files->listFiles([
        'q' => "name = '$file_name'",
        'fields' => 'files(id, size)'
    ]);
    
    $num = count($result);
    
    $fileId = $result[0]->id;

    $service->files->delete($fileId);

    $file->setName($file_name);
    
    $file->setParents(array("1Ai92X0uuovpO8Rcfeg-eXnzr3B0K3357"));


    $result = $service->files->create($file, array(
        'data' => file_get_contents($file_path),
        'uploadType' => 'multipart',
    ));

} catch (Google_Service_Exception $gs) {

    $mensaje = json_decode($gs->getMessage());
    echo $mensaje->error->message();

} catch (Exception $e) {

    echo $e->getMessage();

}
