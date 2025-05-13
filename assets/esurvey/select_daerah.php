<?php
    include 'db_daerah.php';
    if (!empty($_GET['prop'])) {
        if (ctype_digit($_GET['prop'])) {
            $query = $db->prepare("SELECT * FROM kota_kab WHERE id_provinsi=:prop ORDER BY kota_kab");
            $query->execute(array(':prop' => $_GET['prop']));
            echo "<option value=''>Pilih Kota/Kab</option>";
            while ($d = $query->fetchObject()) {
                echo "<option value='{$d->id_kota_kab}'>{$d->kota_kab}</option>";
            }
        }
    }
    if (!empty($_GET['kab'])) {
        if (ctype_digit($_GET['kab'])) {
            $query = $db->prepare("SELECT * FROM kecamatan WHERE id_kab=:kab ORDER BY nama");
            $query->execute(array(':kab' => $_GET['kab']));
            echo "<option value=''>Pilih Kecamatan</option>";
            while ($d = $query->fetchObject()) {
                echo "<option value='{$d->id_kec}'>{$d->nama}</option>";
            }
        }
    }
    if (!empty($_GET['kec'])) {
        if (ctype_digit($_GET['kec'])) {
            $query = $db->prepare("SELECT * FROM kelurahan WHERE id_kec=:kec ORDER BY nama");
            $query->execute(array(':kec' => $_GET['kec']));
            echo "<option value=''>Pilih Kelurahan/Desa</option>";
            while ($d = $query->fetchObject()) {
                echo "<option value='{$d->id_kel}'>{$d->nama}</option>";
            }
        }
    }
