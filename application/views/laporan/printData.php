<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .line-title {
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }

    td {
      font-size: 12px;
    }

    tr {
      font-size: 12px;
    }

    .subtitle {
      font-size: 10px;
    }
  </style>

</head>

<body>

  <table style="width: 100%;">
    <tr>
      <td><img src="<?= 'assets/img/profile/' . $user['foto']; ?>" style="left:20px;position: absolute; width: 80px; height: auto;"></td>

      <td>
        <span style="margin-right:20px;font-size: 15px;line-height: 1.6; font-weight: bold;">
          <?= $user['nama']; ?>
          <br>Universitas Muhammadiyah Magelang
        </span>
        <br>
        <span class="subtitle">Sekertariat: Jl. Mayjen Bambang Soegeng, Glagak, Sumberrejo, Kec. Mertoyudan, Magelang, Jawa Tengah 56172</span>
      </td>
    </tr>
  </table>

  <hr class="line-title">
  <p align="center">
    <?= $ket ?> <br>
  </p>
  <table class="table table-bordered">
    <tr>
      <th>No</th>
      <th>Jenis Surat</th>
      <th>No Surat</th>
      <th>Tanggal Pelaksanaan</th>
      <th>Jam</th>
      <th>Keterangan</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($surat as $sm) : ?>
      <tr>
        <th scope="row">
          <?= $i; ?>
        </th>
        <td class="media-body">
          <?= $sm['nama_status_surat']; ?>
        </td>
        <td>
          <div>
            <?= $sm['no_surat']; ?>
          </div>
        <td>
          <div>
            <?= $sm['tgl_pelaksanaan']; ?>
          </div>
        </td>
        <td>
          <div>
            <?= $sm['jam']; ?>
          </div>
        </td>
        <td>
          <div class="wraptext">
            <?= $sm['keterangan']; ?>
          </div>
        </td>

      </tr>
      <?php $i++ ?>
    <?php endforeach; ?>
  </table>

</body>

</html>