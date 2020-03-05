<?php
\WPEmerge\render( 'header' ); 

if ( ! is_404() ) {
	the_post(); 
}

\WPEmerge\layout_content();

\WPEmerge\render( 'footer' );