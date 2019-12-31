<?php 
    class Flasher {
        public static function set_flash( $pesan, $aksi, $tipe ) {
            $_SESSION['flash'] = [
                'tipe' => $tipe,
                'pesan' => $pesan,
                'aksi' => $aksi
            ];
        }
        public static function flash() {
            if ( isset( $_SESSION['flash'] ) ) {
                echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . '" role="alert">
                        ' . $_SESSION['flash']['pesan'] . ' <a href="" class="alert-link">' . $_SESSION['flash']['aksi'] . '</a>. 
                    </div>';
                unset( $_SESSION['flash'] );
            }   
        }
    }
?>