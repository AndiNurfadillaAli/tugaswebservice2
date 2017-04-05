<?php
include 'koneksi.php';
    if( !$xml = simplexml_load_file('barang.xml') ) //using simplexml_load_file function to load xml file
    {
        echo 'load XML failed ! ';
    }
    else
    {
        echo '<h1>Data Barang</h1>';
		foreach( $xml as $simpan ) 
        {
			$kode = $simpan->kode; 
			$satuan = $simpan->satuan; 
			$harga = $simpan->harga; 
			$ptasal = $simpan->asal ->ptasal;
			$kodewilasal = $simpan->asal ->kodewilasal; 
			$pttujuan = $simpan->tujuan ->pttujuan;
			$kodewiltujuan = $simpan->tujuan ->kodewiltujuan;
			
			echo '<h4>barang</h4>';
            echo 'kode : '.$kode.'<br />';
			echo 'satuan : '.$satuan.'<br />';
			echo 'harga : '.$harga.'<br />';
			echo '<h4>Asal</h4>';
			echo 'asal : '.$ptasal.'<br />';
			echo 'kodewil : '.$kodewilasal.'<br />';
			echo '<h4>Tujuan</h4>';
			echo 'tujuan : '.$pttujuan.'<br />';
			echo 'kodewil1 : '.$kodewiltujuan.'<br />';
			echo '<br>';

//save to database
			$q = "INSERT INTO barang VALUES('','$kode','$satuan','$harga','$ptasal $kodewilasal','$pttujuan $kodewiltujuan')";
			$result = mysql_query($q);
        }
			if ($result) {
			echo '<h2>Data Berhasil di Simpan </h2>';
			}
			else echo '<h2>Data Gagal di Simpan</h2>';
    }
?> 