<?php  
    $title = "Home";
    include '/admin/post/koneksi.php';
    include '/admin/post/header.php';


    // Buat prepared statement untuk mengambil semua data dari tbBiodata
    $query = $db->prepare("SELECT konten.nama_kat, episode.judul, episode.episodes, episode.480p,episode.720p,episode.1080p,episode.date FROM konten, episode WHERE konten.judul = episode.judul GROUP BY episode.judul, episode.episodes ORDER by episode.date DESC");
    // Jalankan perintah SQL
    $query->execute();
    // Ambil semua data dan masukkan ke variable $data
    $data = $query->fetchAll();

?>

<html>  
<head>
<style>
 table { table-layout: fixed; }
 table th, table td { overflow: hidden; }
 .spoiler {
  
}
.spoiler-toggle {
  font-weight: bold;
  cursor: pointer;
  padding: 5px;
  font-size: 14px;
  color: #ff0000;
}
.spoiler-text {
  padding: 5px;
}
</style>
</head>
    <body>
       <div class="container">
        <h1>New Release</h1>
        <hr>
        <form method="post" action="cari.php">

        <div style="float: left;">
    <input class="form-control" TYPE="text" id="carikategori" name="carifilm" placeholder="Search (e.g. Fate)"/>
    </div>
    <div style="float: right;"><a onclick="window.location='index.php'"><i class="fa fa-refresh"></i></a></div>

    </form>
            <!-- Perulangan Untuk Menampilkan Semua Data yang ada di Variable Data -->
            
<?php 
      function custom_echo($x, $length)
      {
        if(strlen($x)<=$length)
        {
          echo $x;
        }
        else
        {
          $y=substr($x,0,$length) . '...';
          echo $y;
        }
      }
      $i = 0;
foreach ($data as $key=>$value): ?>
                <table class="table table-hover">
                <tbody style="border-top-width: 0px;">
                <tr>
                <td style="padding-bottom: 0px;padding-top: 0px; border-top-width: 0px; width: 70%;">
               (<?php echo $value['date'] ?>) 
               [<?php echo $value['nama_kat'] ?>] 
               <a class"tes" style="text-decoration: none;" href="content.php?judul=<?php custom_echo ($value['judul'], 28); ?>"><u style="border-bottom: 1px dotted #000;text-decoration: none;"><?php echo $value['judul']?></u></a> - 
               <?php echo $value['episodes'] ?>
                </td>
                
                <td style="padding-bottom: 0px;padding-top: 0px; border-top-width: 0px; width: 13%;" align="right">
  <div class="spoiler">
  <div class="spoiler-toggle">
                480p</td>
  </div>
                <td style="padding-bottom: 0px;padding-top: 0px; border-top-width: 0px; width: 13%;" align="right">720p</td>
                <td style="padding-bottom: 0px;padding-top: 0px; border-top-width: 0px; width: 13%;" align="right">1080p</td>
                </tr>
                </tbody>
                </table>

 <div class="spoiler-text">
                        <table class="table table-hover">
                        <tbody style="border-top-width: 0px;">
                        <tr>
                        <td style="padding-bottom: 0px;padding-top: 0px; border-top-width: 0px;" align="left">
                        <div class"tes" style="text-decoration: none; font-style: italic;"><u style="border-bottom: 1px dotted #000;text-decoration: none;"><?php echo $value['judul']?></u> - <?php echo $value['episodes'] ?> [480p]</div>
                        </td>
                        <td style="padding-bottom: 0px;padding-top: 0px; border-top-width: 0px;" align="right">
                        <?php echo html_entity_decode ($value['480p'] ); ?>
                        </td>
                        </tr>
                        </tbody>
                        </table>
 </div>
</div>
                        <table class="table table-hover">
                        <tbody style="border-top-width: 0px;">
                        <tr>
                        <td style="padding-bottom: 0px;padding-top: 0px; border-top-width: 0px;" align="left">
                        <div class"tes" style="text-decoration: none; font-style: italic;"><u style="border-bottom: 1px dotted #000;text-decoration: none;"><?php echo $value['judul']?></u> - <?php echo $value['episodes'] ?> [720p]</div>
                        </td>
                        <td style="padding-bottom: 0px;padding-top: 0px; border-top-width: 0px;" align="right">
                        <?php echo html_entity_decode ($value['720p'] ); ?>
                        </td>
                        </tr>
                        </tbody>
                        </table>

                        <table class="table table-hover">
                        <tbody style="border-top-width: 0px;">
                        <tr>
                        <td style="padding-bottom: 0px;padding-top: 0px; border-top-width: 0px;" align="left">
                        <div class"tes" style="text-decoration: none; font-style: italic;"><u style="border-bottom: 1px dotted #000;text-decoration: none;"><?php echo $value['judul']?></u> - <?php echo $value['episodes'] ?> [1080p]</div>
                        </td>
                        <td style="padding-bottom: 0px;padding-top: 0px; border-top-width: 0px;" align="right">
                        <?php echo html_entity_decode ($value['1080p'] ); ?>
                        </td>
                        </tr>
                        </tbody>
                        </table>

          
<?php endforeach; ?>

        <script>
          $(function(){
    $('.spoiler-text').hide();
    $('.spoiler-toggle').click(function(){
        $(this).next().toggle();
    }); // end spoiler-toggle
}); // end document ready
        </script>
    </body>
    </div>
</html> 
