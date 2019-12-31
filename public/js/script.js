$( function () {
    $( '.tombol-tambah-modal' ).on( 'click', function () {
        $( '#judul-modal' ).html( 'Tambah data mahasiswa' );
        $( '.modal-footer button[type=submit]' ).html( 'Tambah data' );
        $( '.modal-body form' ).attr( 'action', 'http://localhost/phpmvc/public/mahasiswa/tambah' );
    } );

    $( '.tombol-ubah-modal').on( 'click', function () {
            $( '#judul-modal' ).html( 'Ubah data mahasiswa' );
            $( '.modal-footer button[type=submit]' ).html( 'Ubah Data' );
            $( '.modal-body form' ).attr( 'action', 'http://localhost/phpmvc/public/mahasiswa/ubah' );
            const id = $( this ).data( 'id' );
            
            $.ajax( {
                url: 'http://localhost/phpmvc/public/mahasiswa/get_mahasiswa',
                data: { id: id },
                method: 'POST',
                dataType: 'json',
                success: function ( data ) {
                    $( '#nama' ).val( data.nama );
                    $( '#nrp' ).val( data.nrp );
                    $( '#email' ).val( data.email );
                    $( '#jurusan' ).val( data.jurusan );
                    $( '#id' ).val( data.id );
                }
            } )
    } );
} )