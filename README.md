
# Angeluz Backup System

Angeluz backup system made with php using the google drive api 👨‍💻


## Requirements

- PHP 7.4

- Your google drive api key service account credentials in JSON format

- ❗🚧 Remember to give permissions in the folder where the files will be uploaded and downloaded in google drive to the service account otherwise it will not work

## Installation

- Clone the repository with

```bash
  git clone https://github.com/Arturo-Ruiz/Angeluz-Backup-System

  cd Angeluz-Backup-System
```

- Set up the google drive api key service account credentials in JSON format in the root of the folder


For Upload 👆☁ : 

- In the upload.php 

- Set up the google drive api key in the putenv (line 5 of the code)

```bash
  putenv('GOOGLE_APPLICATION_CREDENTIALS=YOUR_API_KEY.JSON');

```

- Set up the file path and file name (line 17 and 19 of the code) 

```bash
  $file_path = 'Your_File_Path\Your_File_Name.txt';

  $file_name = 'Your_File_Name.txt';

```
- Set up the folder for upload to google drive (line 36 of code)

```bash
  $file->setParents(array("Your_Folder_ID_In_Google_Drive"));

```

For Download 👇☁: 

- In the download.php 

- Set up the google drive api key in the putenv (line 5 of the code)

```bash
  putenv('GOOGLE_APPLICATION_CREDENTIALS=YOUR_API_KEY.JSON');

```

- Set up the file name of download (line 17 of the code)

```bash
  $file_name = 'Your_File_Name.txt';

```

- Set up the download folder (line 37 of the code)

```bash
  $download_folder = 'Your_Download_Folder/Your_File_Name.txt';

```
## Authors

- [@Arturo-Ruiz](https://github.com/Arturo-Ruiz)

