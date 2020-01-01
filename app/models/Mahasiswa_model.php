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

        public function update_mahasiswa( $data ) {
            $this->db->query( "UPDATE mahasiswa 
                        SET nama = :nama,
                        nrp = :nrp,
                        email = :email,
                        jurusan = :jurusan
                        WHERE id=:id" );
            $this->db->bind( 'nama', $data['nama'] );
            $this->db->bind( 'nrp', $data['nrp'] );
            $this->db->bind( 'email', $data['email'] );
            $this->db->bind( 'jurusan', $data['jurusan'] );
            $this->db->bind( 'id', $data['id'] );

            var_dump( $data );
            
            $this->db->execute();

            return $this->db->rowCount();
        }
        public function get_mahasiswa_by_name( $nama ) {
            $this->db->query( "SELECT * FROM mahasiswa WHERE nama LIKE :nama" );
            $this->db->bind( 'nama', "%$nama%" );

            return $this->db->result_set();
        }
    }
 ?>