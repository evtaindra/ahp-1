<?php  
    $title = "Tambah Film";
    include 'koneksi.php';
    include 'header.php';

    if(isset($_POST['submit'])){
        $judul = htmlentities($_POST['judul']);
        $nama_kat = htmlentities($_POST['nama_kat']);
        $nama_tag = htmlentities($_POST['nama_tag']);
        $konten = htmlentities($_POST['konten']);
var_dump($_POST);
        $query = $db->prepare("INSERT INTO `konten`(`judul`,`nama_kat`,`nama_tag`,`konten`)
        VALUES (:judul,:nama_kat,:nama_tag,:konten)");
        $query->bindParam(":judul", $judul);
        $query->bindParam(":nama_kat", $nama_kat);
        $query->bindParam(":nama_tag", $nama_tag);
        $query->bindParam(":konten", $konten);
        $query->execute();
    }
    $query = $db->prepare("SELECT * FROM tag");
    $query->execute();
    $data = $query->fetchAll();
    $query2 = $db->prepare("SELECT * FROM kategori");
    $query2->execute();
    $data2 = $query2->fetchAll();
?>
<!DOCTYPE html>  
<html>
<head>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
</head>
<div class="container">

<body>
<form>
<label for="judul">Judul:</label>
<input class="form-control" TYPE="text" id="judul" name="judul" placeholder="Judul"/>
<label for="kategori">Kategori:</label>
<select class="form-control" id="nama_kat" name="nama_kat">
<?php foreach ($data2 as $value): ?>
    <div class="form-group">
        <option><?php echo $value['nama_kat'] ?></option>
        <?php endforeach; ?>
      </select>
      <label for="nama_tag">Tags:</label>
<select class="form-control" id="nama_tag" name="nama_tag">
<?php foreach ($data as $value): ?>
    <div class="form-group">
        <option><?php echo $value['nama_tag'] ?></option>
        <?php endforeach; ?>
      </select>
      <label for="konten">Konten:</label>
        <textarea id="konten" name="konten"></textarea>
        <br />
        <input type="submit" name="submit" class="btn btn-default" value="Simpan" />
        </div>
        </form>
</body>
</div>
</html>
