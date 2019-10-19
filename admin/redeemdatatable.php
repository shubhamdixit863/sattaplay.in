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
$editor = Editor::inst( $db, 'withdrawls' );

Editor::inst( $db, 'withdrawls' )
    ->fields(
        Field::inst( 'id' ),
        Field::inst( 'userid' ),
        Field::inst( 'amount' ),
        Field::inst( 'date_t' ),
        Field::inst( 'bankaccount' ),
        Field::inst( 'accountnumber' ),
        Field::inst( 'ifsc' ),
        Field::inst( 'name' ),
        Field::inst( 'status' )
    ) ->process( $_POST )->json();













 ?>
