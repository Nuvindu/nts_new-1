<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style-header.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Roboto&display=swap" rel="stylesheet">
    <script src="./js/jquery-3.3.1.js"></script>

    <title>Log In</title>
</head>

<body>
    <div class="nts-text">
        <div>
        <a href="index.php"><img class="logo" src="./img/logo-highres.png" alt="logo"></a>
        <a href="index.php"><img class="logo-lowres" src="./img/logo-highres.png" alt="logo"></a>

        </div>
        <div style="flex-grow: 8;overflow: hidden;height: 108px;">
            <script>
            $(window).scroll(function() {
                if ($(document).scrollTop() > 0) {
                    $('.nts-text').addClass('color-change');
                    $('.logo').addClass('logo-change');
                    $('.logo-pp').addClass('logo-pp-change');
                    $('.nts-text-image').addClass('nts-text-image-none');
                    $('.logo-lowres').addClass('logo-lowres-resize');
                    $('.logo-pp').addClass('logo-pp-resize');


                } else {
                    $('.nts-text').removeClass('color-change');
                    $('.logo').removeClass('logo-change');
                    $('.logo-pp').removeClass('logo-pp-change');
                    $('.nts-text-image').removeClass('nts-text-image-none');
                    $('.logo-lowres').removeClass('logo-lowres-resize');
                    $('.logo-pp').removeClass('logo-pp-resize');


                }
            });
            </script>
            <img class="nts-text-image" src="./img/NTS-text.png">
        </div>
        <div>
            <a href="profiles.php"><img class="logo-pp profile-pic" src="./img/logo-highres.png" alt="profile-picture" id="profile-pic"
                    style="border-radius: 100px;"></a>
        </div>

    </div>

    <!-- retrieveing profile picture -->
    <script>
    $(document).ready(function() {
        if (sessionStorage.getItem('ProfilePictureDir') == null) {
            $.ajax({
                type: 'POST',
                url: '/nts_new/Model/db_load_profilePicture.php',
                data: {
                    // send this variable to server to identify user to database manipulate
                    UserSessionName: document.getElementById('index-no').textContent
                },
                dataType: 'JSON',
                success: function(data) {
                    var profPicDir = data[0];
                    if (profPicDir == '') {
                        // $('img').attr('src', './img/empty-pp.png');
                        document.getElementById('profile-pic').setAttribute('src',
                            './img/empty-pp.png');
                    } else {

                        document.getElementById('profile-pic').setAttribute('src',
                            './profile-pictures/' + profPicDir);

                    }
                    sessionStorage.setItem('ProfilePictureDir', profPicDir);
                }
            });
        } else {

            if (sessionStorage.getItem('ProfilePictureDir') == '') {
                // $('img').attr('src', './img/empty-pp.png');
                document.getElementById('profile-pic').setAttribute('src',
                    './img/empty-pp.png');
            } else {

                document.getElementById('profile-pic').setAttribute('src',
                    './profile-pictures/' + sessionStorage.getItem('ProfilePictureDir'));

            }
        }
    })
    </script>
</body>

</html>