<html>

<head>
    <title>Cetak Data Karyawan</title>
    <link rel="stylesheet" media='all' href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!--Custom Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>

<body>

    <h3 style="text-align: center">DETAIL DATA KARYAWAN</h3>

    <?php include "./application/views/resume.php"; ?>
    
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>