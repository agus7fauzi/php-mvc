<?php

class Flasher {
    public static function setFlash($status, $pesan, $aksi, $tipe) {
        $_SESSION['flash'] = [
            'status' => $status,
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash() {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-'. $_SESSION['flash']['tipe'] .' alert-dismissible fade show" role="alert">
                    <strong>' . $_SESSION['flash']['status'] . '</strong> <em>' . $_SESSION['flash']['pesan'] . '</em> ' . $_SESSION['flash']['aksi'] . '.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            
            unset($_SESSION['flash']);
        }
    }
}