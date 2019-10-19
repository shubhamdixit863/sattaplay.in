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
$editor = Editor::inst( $db, 'recharge' );

Editor::inst( $db, 'recharge' )
    ->fields(
        Field::inst( 'id' ),
        Field::inst( 'userid' ),
        Field::inst( 'amount' ),
        Field::inst( 'date_t' ),

        Field::inst( 'phone' ),
        Field::inst( 'status' )
    ) ->process( $_POST )->json();













 ?>
