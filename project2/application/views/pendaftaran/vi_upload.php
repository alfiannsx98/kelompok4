<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= form_open_multipart('pendaftaran/pr_upload'); ?>
        <label for="">upload file</label>
        <input type="file" name="PROPOSAL">
        <button type="submit">upload</button>
    </form>
</body>
</html>