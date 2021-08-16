<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
  <style>
    table {
      font-family: 'Calibri';
      font-size: 14px;
      font-weight: 500;
      color: #2c2b2b;
      border-width: 1px;
      border-color: #FFA800;
      border-collapse: collapse;
    }

    table th {
      border-width: 1px;
      padding: 8px;
      border-style: solid;
      border-color: #ffff;
      background-color: skyblue;
      color: #ffffff;
    }

    table tr:hover td {
      cursor: pointer;
    }

    table tr:nth-child(even) td {
      background-color: skyblue;
    }

    table td {
      border-width: 1px;
      padding: 8px;
      border-style: solid;
      border-color: #ffff;
      background-color: #ffffff;
    }

    a {
      background-color: #f5365c;
      color: #ffffff;
      padding: 1em 1.5em;
      text-decoration: none;
      border-radius: 10px;
    }
  </style>
</head>

<body style="margin:0;padding:0;">
  <table align="center" role="presentation" style="background: #ffff;width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
    <tr>
      <td style="padding:0 20px 0 20px; background-color:#2dce89; color:#ffffff; border-radius:20px;">
        <h2>Assalamualaikum Wr Wb</h2>
        <p>Surat anda telah diterima oleh <?= $user['nama']; ?> Yang akan dilaksanakan pada Tanggal <?= $tgl_pelaksanaan['tgl_pelaksanaan']; ?>
          Untuk Informasi lebih lanjut silahkan melihat data surat masuk pada sistem kami
          Trimakasih atas perhatiannya
        <h3>Wassalamualaikum Wr Wb</h3>
        </p>
        <div align="center">
          <a href="<?= base_url(); ?>auth">Buka Ormawa Mail</a>
        </div>
        <br>
      </td>
    </tr>
  </table>
</body>

</html>