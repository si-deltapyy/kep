<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTOH DOKUMEN EC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .content {
            text-align: justify;
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">CONTOH DOKUMEN EC</div>
        <div class="content">
            <p>Nama: {{ $data['nama'] }}</p>
            <p>Judul: {{ $data['judul'] }}</p>
            <p>Ini dokumen EC yang sudah rilis.</p>
        </div>
        <div class="footer">
            <p>Tanggal </p>
        </div>
    </div>
</body>
</html>
