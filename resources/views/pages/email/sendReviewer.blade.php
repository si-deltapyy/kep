<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KEP FKIP Email</title>
    <style>
        /* General Reset */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f7;
        }

        table {
            border-spacing: 0;
            width: 100%;
        }

        td {
            padding: 0;
        }

        img {
            border: 0;
        }

        /* Container */
        .email-wrapper {
            width: 100%;
            background-color: #f4f4f7;
            padding: 20px 0;
        }

        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #e4e4e7;
            border-radius: 8px;
        }

        .email-header {
            background-color: #7e0089;
            color: #ffffff;
            padding: 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            text-align: center;
        }

        .email-header img {
            width: 48px;
            display: block;
            margin: 0 auto;
        }

        .email-header h1 {
            margin: 10px 0;
            font-size: 20px;
            font-weight: bold;
        }

        .email-body {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }

        .email-body h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333333;
        }

        .email-body p {
            margin: 0 0 10px;
        }

        .email-footer {
            background-color: #f4f4f7;
            color: #6b7280;
            text-align: center;
            padding: 20px;
            font-size: 12px;
            border-top: 1px solid #e4e4e7;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .email-button {
            display: inline-block;
            padding: 12px 24px;
            margin-top: 20px;
            background-color: #7e0089;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .email-button:hover {
            background-color: #efeeef;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <table class="email-content" cellpadding="0" cellspacing="0">
            <!-- Header -->
            <tr>
                <td class="email-header">
                    <img src="https://i.ibb.co.com/Z2Sw8rJ/logo-fkip-uns-fkip.png" alt="Logo">
                    <h1>KEP FKIP</h1>
                    <p>Universitas Sebelas Maret</p>
                </td>
            </tr>
            <!-- Body -->
            <tr>
                <td class="email-body">
                    <h2>{{ $mailData['title'] }}</h2><br>
                    <b><p>Halo, Reviewer KPPM FKIP UNS</p></b>
                    <p>{{ $mailData['body'] }}</p>
                    <a href="https://kepfkip.uns.ac.id/{{ $mailData['link'] }}}}" class="email-button">Cek Review</a>
                </td>
            </tr>
            <!-- Footer -->
            <tr>
                <td class="email-footer">
                    <p>Jl. Ir Sutami No.36 A, Kentingan, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126</p>
                    <p>&copy; {{ date('Y') }} KPPM FKIP Universitas Sebelas Maret. All Rights Reserved.</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
