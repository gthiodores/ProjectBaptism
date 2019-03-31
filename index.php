<?php

    require "connection.php";
    
    // Tambah angka 0 didepan $val
    // Contoh, 
    // kalau $val = 3 fungsi akan return 003
    // kalau $val = 44 fungsi akan return 044
    // dst.
    function addZero($val){
        $len=strlen($val);
        if($len<3){
            for($i=0;$i<3-$len;$i++){
                $val = "0".$val;
            }
        }
        return $val;
    }

    // Nomor bulan ke angka romawi
    $bulan = date("m");
    $romawi = array("X"=>"10","IX"=>"9","V"=>"5","IV"=>"4","I"=>"1");
    $bulan_romawi="";
    while($bulan<>0){
        foreach($romawi as $key => $value){
            if($bulan-$value>=0){
                $bulan-=$value;
                $bulan_romawi=$bulan_romawi.$key;
            }
        }
    }

    // format nomor
    // contoh ====> 001/GPT/A/III/19
    //              [Nomor]/GPT/A/[bulan]/[tahun]
    $year = date('y');
    $format_nomor = "/GPT/A/".$bulan_romawi."/".$year;
    
    // Auto Nomor
    // nomor mulai dari 1 untuk tahun berbeda
    $nomor = 1;
    $nomor = addZero($nomor);
    $found = true;
    while($found){
        $sql="SELECT nomor FROM data_kepastoran WHERE nomor LIKE '$nomor%' AND nomor LIKE '%$year'";
        $res = $conn->query($sql);    
        if($res->num_rows <> 0){
            $nomor= $nomor + 1;
            $nomor = addZero($nomor);
        } else {
            $found = false;
        }
    }
    $nomor = addZero($nomor).$format_nomor;

    // TAMBAH DATA PASTOR
    $pastors = array("Raymond");
    $countPastors = count($pastors);
    for($i=1;$i<=50-$countPastors;$i++){
        array_push($pastors,"pastor".$i);
    }

    mysqli_close($conn);
?>

<?php
    require 'head.php';
?>
    
    <form action="tes.php" method="post">
        
        <div class="form-group-row">
            <label class="col-sm-1 col-form-label" for="nomor">No</label>
            <input type="text" name="nomor" id="nomor" value="<?php echo $nomor ?>" readonly>
        </div>

        <div class="form-group-row">
            <label class="col-sm-1 col-form-label" for="nama">Nama</label>
            <input type="text" name="nama" id="nama">
        </div>
        
        <div class="form-group-row">
            <label class="col-sm-1 col-form-label" for="tempat_lahir">Lahir di</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir">
            <label class="" for="tanggal_lahir">tanggal</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir">
        </div>
        
        <div class="form-group-row">
            <label class="col-sm-1 col-form-label" for="nama_ayah">Ayah</label>
            <input type="text" name="nama_ayah" id="nama_ayah">
        </div>

        <div class="form-group-row">
            <label class="col-sm-1 col-form-label" for="nama_ibu">Ibu</label>
            <input type="text" name="nama_ibu" id="nama_ibu">
        </div>        

        <div class="form-group-row">
            <label class="col-sm-1 col-form-label" for="hari_baptis">Pada hari</label>
            <select name="hari_baptis" id="hari_baptis">
                <option value="1">Senin</option>
                <option value="2">Selasa</option>
                <option value="3">Rabu</option>
                <option value="4">Kamis</option>
                <option value="5">Jumat</option>
                <option value="6">Sabtu</option>
                <option value="7">Minggu</option>
            </select>
            <label class="" for="tanggal_baptis">tanggal</label>
            <input type="date" name="tanggal_baptis" id="tanggal_baptis">
        </div>

        <div class="form-group-row">
            <label class="col-sm-1 col-form-label" for="oleh">Oleh</label>

            <!-- Mendaftarkan semua nama pastor yang ada pada database -->
            <select name="oleh" id="oleh">
                <?php foreach($pastors as $pastor) { ?>
                <option value="<?php echo $pastor; ?>"><?php echo $pastor; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <button class="btn btn-success" type="submit">Submit</button> 
        <button class="btn btn-danger" type="reset">Reset</button>
    </form>
   
<?php
require 'footer.php';
?>