<?php

include( "php/DataTables.php" );

use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;
$editor = Editor::inst( $db, 'users' );

Editor::inst( $db, 'users' )
    ->fields(
        Field::inst( 'id' ),
        Field::inst( 'username' ),
          Field::inst( 'name' ),
        Field::inst( 'password' ),
        Field::inst( 'doj' ),
        Field::inst( 'phonenumber' ),
        Field::inst( 'balance' ),
        Field::inst( 'lastlogin' )
    ) ->process( $_POST )->json();













 ?>
