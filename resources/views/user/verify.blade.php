<html>
<head>
    <title>Selamat Datang Jahitin Academy!</title>
    <style>
        *{
        padding: 0;
        margin: 0;
        font-family: "Nunito", sans-serif;
        }
    </style>
</head>
<body>
    <div style="width:600px; height:100%; margin:0px auto;">
        <table style="border-collapse:collapse;width:590px;background:#ffffff;margin:auto">
            <tbody>
            <tr>
                <td colspan="2"  style="width:100%" align="center">
                    <img src="https://academy.jahitin.com/img/jahitin.png" alt="jahitin.com" class="CToWUd" width="150">
                    <hr>
                </td>
            </tr>
            <tr height="48">
                <td style="padding:0 25px;width:50%" align="left">
                    <p style="margin:5px 0;font-size:14px;line-height:1.8">
                        <?php Carbon\Carbon::setLocale('id');?>
                        {{Carbon\Carbon::parse($user->updated_at)->translatedFormat('l, d F Y')}}</p>
                </td>
                <td style="padding:0 25px;width:50%" align="right">
                    <p style="margin:5px 0;font-size:14px;line-height:1.8">{{Carbon\Carbon::parse($user->updated_at)->translatedFormat('h:i')}}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding:0 25px;width:50%">
                    <div style="display:inline-flex">
                        <h3 style="margin-right:8px;font-weight:400;margin-bottom:8px">Halo,</h3>
                        <h3 style="margin-bottom:8px;text-transform:uppercase">{{ $user->name }}</h3>
                    </div>
                </td>
            </tr>
            <tr style="background-color:#fef9f3">
                <td colspan="2" style="width:50%" align="center">
                    <a href="https://academy.jahitin.com" rel="noreferrer noreferrer" target="_blank">
                        <img style="max-width:535px;margin:2rem" src="https://academy.jahitin.com/img/img-verify.jpg" alt="product" class="CToWUd">
                    </a>
                </td>
            </tr>
            <tr style="background-color:#fef9f3">
                <td colspan="2" style="width:50%" align="center">
                    <h2>Akunmu telah berhasil terdaftar!</h2>
                    <p style="width:480px;margin:5px 0 1rem 0;font-size:17px;line-height:1.8; color:#000;">
                    Terima kasih telah membuat akun di Jahitin Academy. <br><br> Username kamu adalah {{ $user->name }}.<br>Kamu dapat mengakses Jahitin Academy untuk mengikuti pelatihan yang tersedia dan aktivitas lainnya melalui website kami
                    </p>
                </td>
            </tr>
            <tr style="background-color:#fef9f3" height="80">
                <td colspan="2" style="width:50%" align="center">
                    <a style="text-decoration:none;padding:1em 1.5em;text-decoration:none;text-transform:uppercase;font-weight:bold;color:white;background-color:#7e1037;border-radius:5px" href="https://academy.jahitin.com" rel="noreferrer noreferrer" target="_blank">
                        Coba Sekarang
                    </a>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="width:50%">
                    <hr style="width:540px">
                </td>
            </tr>
            <tr height="60">
                <td colspan="2" style="width:50%" align="center">
                    <h1 style="margin:2rem 0 1rem 0">Butuh Bantuan?</h1>
                </td>
            </tr>
            <tr height="30">
                <td colspan="2" style="width:50%" align="center">
                    <p style="margin:auto;font-size:14px;line-height:1.8">Untuk informasi lebih lanjut dan bertanya, silahkan
                        menghubungi</p>
                    <p style="margin:auto;font-size:14px;line-height:1.8">
                        <a href="https://api.whatsapp.com/send?phone=6285647160047" style="text-decoration:none;color:#000;font-weight:bold" target="_blank">
                            085647160047 (WhatsApp)
                        </a>
                        atau
                        <a href="mailto:cs@jahitin.com" style="text-decoration:none;color:#000;font-weight:bold" rel="noreferrer noreferrer" target="_blank">cs@jahitin.com</a>.
                    </p>
                </td>
            </tr>
            <tr height="120">
                <td colspan="2" style="width:50%" align="center">
                    <a style="text-decoration:none" href="https://www.youtube.com/channel/UCPXEdtrmRtvZZYVXGPk0qUA" rel="noreferrer noreferrer" target="_blank">
                        <img style="margin:12px" src="https://e7.pngegg.com/pngimages/901/503/png-clipart-black-play-button-icon-youtube-computer-icons-social-media-play-button-angle-rectangle.png" alt="Youtube" class="CToWUd" width="32">
                    </a>

                    <a style="text-decoration:none" href="https://www.instagram.com/jahitin_com/" rel="noreferrer noreferrer" target="_blank">
                        <img style="margin:12px" src="https://ci5.googleusercontent.com/proxy/G5CTMGte0Y4xAxOlvXURM5IwaGg_C6FUosimHE3WwGGveWdwKWDoXWO7QTYCk_TukJnfb-86VryDlHnUyxTShF63VH1vETivUiYmCfJ-YM0r4yJs_e63CqKESDKeJ4wgudbcr-TsdLTGKQ=s0-d-e1-ft#https://fabeliocms.s3.ap-southeast-1.amazonaws.com/3d2f5f8f075e4799a800eff3e2002fa1.png" alt="Instagram" class="CToWUd" width="32">
                    </a>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="width:50%">
                    <hr style="width:540px">
                </td>
            </tr>
            <tr height="90">
                <td colspan="2" style="width:50%" align="center"> 
                    <img src="https://academy.jahitin.com/img/jahitin.png" alt="Jahitin.com" class="CToWUd" width="100">
                </td>
            </tr>
        </tbody>
        </table>
    </div>
</body>
</html>
