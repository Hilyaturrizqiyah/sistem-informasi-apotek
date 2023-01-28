<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak antrian</title>
    <style>

        th{
            text-align: left;
            height: 30px;
        }
        td{
            text-align: left;
        }

    </style>
</head>
<body>

    <div style="border: 2px solid grey; width: 400px; margin: 0 auto; height: 350px">
        <center>
        <h2>APOTEK ENGGAL SAE</h2>
        <small>Jl. Mayor Dasuki No.68, Jatibarang, Kec. Jatibarang Kab. Indramayu, Jawa Barat 45273</small><br><hr>

        <h2>Nomor Antrian</h2>
        <h1 style="color: red">{{$datas->nomor_antrian}}</h1>
        <h5>{{$praktik->jenis_dokter}}</h5>
        <p>{{$datas->created_at}}</p>
        </center>
    </div>
</body>
</html>
