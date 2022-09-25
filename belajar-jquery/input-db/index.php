<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Database Jquery</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Membuat Input Database Tanpa Reload Dengan Ajax</h1>

    <div class="wrap">
        <form method="POST" class="form-user">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" id="nama"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" id="alamat"></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td><input type="text" name="pekerjaan" id="pekerjaan"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a class="tombol-simpan">Simpan</a></td>
                </tr>
            </table>
        </form>
        <div class="tampil-data"></div>
    </div>

    <script type="text/javascript">
        $(document).on('click', '.tombol-simpan', function(e) {
            var data = $('.form-user').serialize();
            $.ajax({
                data: data,
                type: "post",
                url: "aksi.php",
                success: function(data) {
                    alert(data);
                    $('.tampil-data').load("tampil.php");
                }
            });
        })
    </script>
</body>

</html>