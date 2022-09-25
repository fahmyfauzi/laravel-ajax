<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Web</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="content">
        <header>
            <h1 class="judul">Web Apa Aja</h1>
            <h3 class="deskripsi">Membuat Halaman web</h3>
        </header>

        <div class="menu">
            <ul>
                <li><a class="klik_menu" id="home">HOME</a></li>
                <li><a class="klik_menu" id="tentang">TENTANG</a></li>
                <li><a class="klik_menu" id="tutorial">TUTORIAL</a></li>
                <li><a class="klik_menu" id="sosmed">SOSIAL MEDIA</a></li>
            </ul>
        </div>
        <div class="badan">

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.klik_menu').click(function() {
                var menu = $(this).attr('id');
                if (menu == 'home') {
                    $('.badan').load('home.php');
                } else if (menu == 'tentang') {
                    $('.badan').load('tentang.php');
                } else if (menu == 'tutorial') {
                    $('.badan').load('tutorial.php')
                } else if (menu == 'sosmed') {
                    $('.badan').load('sosial.php')

                }
            });

            //default reload 
            $('.badan').load('home.php');
        })
    </script>

</body>

</html>