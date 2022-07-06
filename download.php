<?php

include 'api-google/vendor/autoload.php'; // Loads the Google API PHP Client Library.

putenv('GOOGLE_APPLICATION_CREDENTIALS=respaldo-database-eabfd082c9ee.json');    // Path to service account credentials

$client = new Google_Client(); // Create a Google client.

$client->useApplicationDefaultCredentials(); // Use application default credentials.

$client->setScopes(['https://www.googleapis.com/auth/drive.file']); // Scopes required by the API.

try {
    //code...
    $service = new Google_Service_Drive($client); // Create a Google Drive service.

    $file_name = 'test.txt'; // File name to be download

    $result = $service->files->listFiles([ // List files in the user's Drive.
        'q' => "name = '".$file_name."'", // Search for a file by name.
        'fields' => 'files(id, size)' // Only return the file ID and size.
    ]);

    $num = count($result); // Get the number of files in the user's Drive.

    if ($num == 0) {
        echo 'No files found'; // Print the error message.
        die;
    }

    $fileId = $result[0]->id; // Get the file ID.

    $fileSize = $result[0]->size; // Get the file size.

    $http = $client->authorize(); // Get the HTTP client.

    $download_folder = 'C:\xampp\htdocs\Angeluz-Backup-System\download\test.txt'; // Folder to save the file.
    
    $fp = fopen($download_folder, 'w'); // Open a file for writing

    $chunkSizeBytes = 1 * 1024 * 1024; // Download in 1 MB chunks

    $chunkStart = 0; // Start byte for the current download

    // Iterate over each chunk and write it to our file
    while ($chunkStart < $fileSize) {
        $chunkEnd = $chunkStart + $chunkSizeBytes;
        $response = $http->request(
            'GET',
            sprintf('/drive/v3/files/%s', $fileId),
            [
                'query' => ['alt' => 'media'],
                'headers' => [
                    'Range' => sprintf('bytes=%s-%s', $chunkStart, $chunkEnd)
                ]
            ]
        );
        $chunkStart = $chunkEnd + 1;
        fwrite($fp, $response->getBody()->getContents());
    }
    // close the file pointer
    fclose($fp);

    header('Location: successful_download.php'); // Redirect to the success page.
} catch (Google_Service_Exception $gs) { // Google Drive API error.
    $msj = json_decode($gs->getMessage()); // Get the error message.
    echo $msj->error->message(); // Print the error message.
} catch (Exception $e) {
    echo $e->getMessage(); // Print the error message.
}
