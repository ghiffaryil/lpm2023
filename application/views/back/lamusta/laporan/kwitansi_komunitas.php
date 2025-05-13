<?php 
    $day = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );
    $bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
    );

    function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
 
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }           
        return $hasil;
    }
 
?>

<div style="font-size: 14.7px; font-family: 'Arial', sans-serif; margin-top: 3.2em;">
	<div style="margin-left: 3.5em;">
		<?php echo date('Ymd').$data->id_transaksi_komunitas ?><br>
		<?php echo strtoupper($day[date('D', strtotime($data->rencana_bantuan))]) ?><br>
		<?php echo date('d-m-Y', strtotime($data->rencana_bantuan)) ?><br>
	</div>
	<div style="margin-left: 16em;">
		<span><?php echo strtoupper($data->nama_komunitas) ?></span><br>
		<p style="margin-top: 15px;"><?php echo str_replace(',', '.', number_format($data->jumlah_bantuan)) .',-' ?></p>
		<span><?php if ($data->jumlah_bantuan == 0) {
			echo strtoupper(terbilang($data->jumlah_bantuan));
		}else{
			echo strtoupper(terbilang($data->jumlah_bantuan)).' RUPIAH';
		} ?></span>
	</div>
	<div style="margin-top: 7em;">
		<span><?php echo substr(strtoupper($data->nama),0,-9) ?></span>
		<span style="margin-left: 15px;"><?php echo substr(strtoupper($data->penyalur),0) ?></span>
		<span style="margin-left: 7em;"><?php echo strtoupper($data->asnaf.' : '.$data->jenis_bantuan) ?></span>
	</div>
</div>


 <br>

