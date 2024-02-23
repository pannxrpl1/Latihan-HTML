<html>
<head>
    <title>TAMBAH PEGAWAI</title>
</head>
<body>
    <h2>TAMBAH DATA PEGAWAI</h2>

    <?php
    // Establish database connection
    $conn = mysqli_connect("localhost", "root", "", "latihan_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve form data
    if(isset($_POST['proses'])) {
        $no_induk = $_POST['no_induk'];
        $nama = $_POST['nama'];
        $id_jab = $_POST['id_jab'];

        // Insert data into database
        $query = "INSERT INTO karyawan (no_induk, nama, id_jab) VALUES ('$no_induk', '$nama', '$id_jab')";
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        echo "<script>alert('Data berhasil disimpan')</script>";
    }
    ?>

    <form method="post">
        <table>
            <tr>
                <td width="100">NIK</td>
                <td><input type="text" name="no_induk" size="30"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" size="30"></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>
                    <select name="id_jab">
                        <option value="">--Pilih Jabatan--</option>
                        <?php  
                            $query = "SELECT * FROM jabatan";
                            $sql = mysqli_query($conn, $query);
                            while ($data = mysqli_fetch_array($sql)) {
                                echo "<option value='".$data[0]."'>".$data[1]."</option>";
                            }
                        ?>  
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="proses" value="Simpan Data"></td>
            </tr> 
        </table>
    </form>

</body>
</html>
