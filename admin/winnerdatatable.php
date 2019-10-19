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
$editor = Editor::inst( $db, 'winners' );

Editor::inst( $db, 'winners' )
    ->fields(
        
        Field::inst( 'userid' ),


        Field::inst( 'date_t' ),
        Field::inst( 'game' ),
        Field::inst( 'amount' )
    ) ->process( $_POST )->json();













 ?>
