<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <h2>Upload Three Images</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image1" accept="image/*" required><br>
        <input type="file" name="image2" accept="image/*" required><br>
        <input type="file" name="image3" accept="image/*" required><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
