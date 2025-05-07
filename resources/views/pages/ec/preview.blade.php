<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ethical Approval Document</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 30px;
            line-height: 1.6;
        }

        .header {
            margin-bottom: 20px;
            padding-bottom: 10px;
            font-size: 14px;
        }

        .header table {
            width: 100%;
            border-collapse: collapse;
        }

        .header td {
            vertical-align: middle;
        }

        .header .logo {
            width: 20%;
            text-align: center;
        }

        .header .logo img {
            width: 120px;
            height: auto;
        }

        .header .details {
            text-align: center;
            width: 80%;
        }

        .header .details h1 {
            font-size: 14px;
            font-weight: bold;
            margin: 2px 0;
        }

        .header .details h2 {
            font-size: 12px;
            margin: 2px 0;
        }

        .header .details p {
            font-size: 12px;
            margin: 2px 0;
        }

        /* CONTENT */
        .content {
            margin-top: 30px;
            text-align: justify;
        }

        .content p {
            margin: 12px 0;
        }

        .approval-number {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        /* SIGNATURE */
        .signature {
            text-align: right;
            margin-top: 50px;
        }

        .signature p {
            margin: 5px 0;
        }

        /* FOOTER */
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
        }

        .bold {
            font-weight: bold;
        }

        .italic {
            font-style: italic;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <div class="header">
        <table>
            <tr>
                <td class="logo">
                    <img src="{{ public_path('assets/images/logos/UNS-LOGO.png') }}" alt="Logo UNS">
                </td>
                <style>
                    .no-bold {
                        font-family: 'Times New Roman', Times, serif;
                        line-height: 1; /* Single line spacing */
                    }
                </style>
                <td class="details">
                    <h1 class="no-bold" style="font-size: 19px;  font-weight: 400 !important;">MINISTRY OF HIGHER EDUCATION, SCIENCE, AND <br> TECHNOLOGY</h1>
                    <h1 class="no-bold" style="font-size: 17px;  font-weight: 400 !important;">UNIVERSITAS SEBELAS MARET</h1>
                    <h2 class="no-bold" style="font-size: 17px;  font-weight: 400 !important;">FACULTY OF TEACHER TRAINING AND EDUCATION</h2>
                    <h2 class="no-bold" style="font-size: 17px;">RESEARCH ETHICS COMMISSION</h2>
                    <p class="no-bold">Jl Ir. Sutami Nomor 36A Kentingan Surakarta 57126</p>
                    <p class="no-bold" >Telephone (0271) 669124, Faximile (0271) 648939</p>
                    <p class="no-bold" >Website: <a href="https://kepfkip.uns.ac.id">https://kepfkip.uns.ac.id</a> / Email: kep@fkip.uns.ac.id</p>
                </td>
            </tr>
        </table>
    </div>

    <hr>

    <!-- CONTENT -->
    <style>
        .num {
            font-family: 'Times New Roman', Times, serif;
            font-weight: 400; /* Normal weight (not bold) */
            line-height: 1; /* Single line spacing */
            text-align: left; /* Align text to the left */
            display: flex;
            justify-content: center; /* Center content horizontally */
            align-items: center; /* Center content vertically */
            height: 100vh; /* Full viewport height */
            width: 100%; /* Full width */
        }
    </style>
    <div class="content">
        <h2 class="bold" style="text-align: center;"><i><u>ETHICAL APPROVAL</u></i></h2>
        <div class="approval-number num" style="text-align: center;">
            <p>Number:  {{ $data['ethical_number'] ?? 'ditulis admin' }}</p>
            <p>Date: {{ $data['tanggal'] ? $data['tanggal'] : '-'}}</p>

        </div>
        <p>
            The undersigned, Chair of the Research Ethics Commission, after a series of discussions and assessments, hereby decides on the research protocol entitled:
        </p>
        <p class="italic" style="text-align: center;">“{{$data['judul']}}.”</p>
        <p>
            which includes experimental humans as research participants, with the Chief Executive/Principal Researcher:
        </p>
        <p class="italic" style="text-align: center;">{{$data['nama']}}.</p>
        <p>
            can be approved to continue the research activities. This approval is valid from the date of signing until the finish time as stated in the protocol.
        </p>
    </div>

    <!-- SIGNATURE -->
    <div class="signature">
        <p>Surakarta, {{ $data['signed_date'] ? $data['tanggal'] : '-' }}</p>
        <p><strong>Chair of the Research Ethics Commission</strong></p>
        <br><br><br><br>
        <p><strong>Dr.rer.nat. Sri Mulyani, M.Si.</strong></p>
        <p>NIP. 196509161991032009</p>
    </div>
</body>
</html>
