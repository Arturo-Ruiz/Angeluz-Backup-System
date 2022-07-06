<?php

include 'api-google/vendor/autoload.php'; // Loads the Google API PHP Client Library.

putenv('GOOGLE_APPLICATION_CREDENTIALS=respaldo-database-eabfd082c9ee.json');    // Path to service account credentials

$client = new Google_Client(); // Create a Google client.

$client->useApplicationDefaultCredentials(); // Get credentials from the application default credentials.

$client->setScopes(['https://www.googleapis.com/auth/drive.file']); // Scopes required by the API.

try {
    //code...
    $service = new Google_Service_Drive($client); // Create a Google Drive service instance.

    $file_path = 'C:\xampp\htdocs\Angeluz-Backup-System\upload\test.txt'; // Path to the file to be uploaded

    $file_name = 'test.txt'; // File name to be uploaded

    $file = new Google_Service_Drive_DriveFile(); // Create a Google Drive file instance.

    $result = $service->files->listFiles([  // List all files in the user's Drive.
        'q' => "name = '$file_name'",       // Search for a file by name.
        'fields' => 'files(id, size)'       // Only return the file ID and size.
    ]);

    $num = count($result); // Get the number of files in the user's Drive.

    $fileId = $result[0]->id; // Get the file ID.

    $service->files->delete($fileId); // Delete the file

    $file->setName($file_name);   // Set the file name.

    $file->setParents(array("1Ai92X0uuovpO8Rcfeg-eXnzr3B0K3357")); // Parent folder id


    $result = $service->files->create($file, array( // Create a Google Drive file instance.
        'data' => file_get_contents($file_path), // Set the file contents.
        'uploadType' => 'multipart', // Use the resumable upload type.
    ));

    header('Location: successful_upload.php'); // Redirect to the success page.

} catch (Google_Service_Exception $gs) { // Google Drive API error.
    $msj = json_decode($gs->getMessage()); // Get the error message.
    echo $msj->error->message(); // Print the error message.
} catch (Exception $e) {
    echo $e->getMessage(); // Print the error message.
}
