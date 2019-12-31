<?php 

    class Mahasiswa_model {
        private $table = 'mahasiswa';
        private $db;

        public function __construct() {
            $this->db = new Database();
        }
        public function get_all_mahasiswa() {
            $this->db->query( "SELECT * FROM " . $this->table );
            return $this->db->result_set();
        }
        public function get_mahasiswa_by_id( $id ) {
            $this->db->query( "SELECT * FROM " . $this->table . " WHERE id=:id" );
            $this->db->bind( 'id', $id );
            return $this->db->single();
        }
        public function insert_mahasiswa( $data ) {
            $nama = htmlspecialchars( $data['nama'] );
            $nrp = htmlspecialchars( $data['nrp'] );
            $email = htmlspecialchars( $data['email'] );
            $jurusan = htmlspecialchars( $data['jurusan'] );
            
            $this->db->query( "INSERT INTO " . $this->table . " VALUES('', :nama, :nrp, :email, :jurusan)" );

            $this->db->bind( 'nama', $nama );
            $this->db->bind( 'nrp', $nrp );
            $this->db->bind( 'jurusan', $jurusan );
            $this->db->bind( 'email', $email );

            $this->db->execute();
            return $this->db->rowCount(); 
        }

        public function delete_mahasiswa( $id ) {
            $this->db->query( "DELETE FROM " . $this->table . " WHERE id=:id" );

            $this->db->bind( 'id', $id );
            $this->db->execute();

            return $this->db->rowCount();
        }
    }
 ?>