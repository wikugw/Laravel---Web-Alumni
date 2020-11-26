<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    p {
      color: black;
    }
  </style>
</head>
<body>
  <p>Yth {{$user->name}}</p>
  <p>
    Souvenir anda telah dikirim pada alamat
    <br><br>
    {{$user->alamat->adrress}}, <br>
    {{$user->alamat->city->city_name}},<br>
    {{$user->alamat->province->province}},<br>
    Dengan kode pos, {{$user->alamat->postal_code}}<br>
    melalui paket pengiriman {{$user->souvenir->service}}
    <br><br>
    dengan nomor resi {{$user->souvenir->resi}}
    <br><br>
    Terimakasih
    <br>
    Best Regards, Admin Illumina
  </p>
</body>
</html>