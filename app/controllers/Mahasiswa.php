<?php 
    class Mahasiswa extends Controller {
        public function index() {
            $data['judul'] = 'Daftar Mahasiswa';
            $data['mahasiswa'] = $this->model( 'Mahasiswa_model' )->get_all_mahasiswa();
            $this->view( 'templates/header', $data );
            $this->view( 'mahasiswa/index', $data );
            $this->view( 'templates/footer' );
        }

        public function detail( $id ) {
            $data['judul'] = 'Daftar Mahasiswa';
            $data['mahasiswa'] = $this->model( 'Mahasiswa_model' )->get_mahasiswa_by_id( $id );
            $this->view( 'templates/header', $data );
            $this->view( 'mahasiswa/detail', $data );
            $this->view( 'templates/footer' );
        }
        
        public function tambah() { 
            if ( $this->model( 'Mahasiswa_model' )->insert_mahasiswa( $_POST ) > 0 ) {
                Flasher::set_flash( 'Data berhasil', 'ditambahkan', 'success' );
                header( 'Location:' . BASEURL . "/mahasiswa" );
                exit;
            } else {
                Flasher::set_flash( 'Data gagal', 'ditambahkan', 'danger' );
                header( 'Location:' . BASEURL . "/mahasiswa" );
                exit;
            }
        }

        public function hapus( $id ) {
            // var_dump( $id );
            if ( $this->model( 'Mahasiswa_model' )->delete_mahasiswa( $id ) > 0 ) {
                Flasher::set_flash( 'Data berhasi', 'dihapus', 'success' );
                header( 'Location:' . BASEURL . '/mahasiswa' );
                exit;
            } else {
                Flasher::set_flash( 'Data gagal', 'dihapus', 'danger' );
                header( 'Location:' . BASEURL . '/mahasiswa' );
                exit;
            }
        }
    }
?>