<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tiny.cloud/1/4gf9hah0fook9f8liwmty4688zrze0nr3cq55xs1tc7wmdts/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <link rel="stylesheet" href="instyle.css">
  <style>
    body {
      padding-top: 100px;
    }
  </style>
</head>

<body>
  <!DOCTYPE html>
  <html>

  <head>
    <script src="https://cdn.tiny.cloud/1/4gf9hah0fook9f8liwmty4688zrze0nr3cq55xs1tc7wmdts/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      const image_upload_handler_callback = (blobInfo, progress) => new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', 'upload.php');

        xhr.upload.onprogress = (e) => {
          progress(e.loaded / e.total * 100);
        };

        xhr.onload = () => {
          if (xhr.status === 403) {
            reject({
              message: 'HTTP Error: ' + xhr.status,
              remove: true
            });
            return;
          }

          if (xhr.status < 200 || xhr.status >= 300) {
            reject('HTTP Error: ' + xhr.status);
            return;
          }

          const json = JSON.parse(xhr.responseText);

          if (!json || typeof json.location != 'string') {
            reject('Invalid JSON: ' + xhr.responseText);
            return;
          }

          resolve(json.location);
        };

        xhr.onerror = () => {
          reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
        };

        const formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());

        xhr.send(formData);
      });



      tinymce.init({
        selector: 'textarea',
        height: 500,
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image',
        images_upload_url: 'upload.php',

        file_picker_callback: function(callback, value, meta) {

        }

      });
    </script>
  </head>

  <body>
    <?php include 'utils/nav.php';  ?>
    <form method="post" action="store_page.php">
      <textarea name="page_content"></textarea>
      <br>
      <input type="submit" value="Save Page">
    </form>
  </body>

  </html>

</body>

</html>