<?php
namespace App\Controllers\Web;

class PlainPageController {
    public function index( $request, $view ) {
    	ob_start();

    	\WPEmerge\render( 'app/views/plain_page/content.php' );
    	
    	$content = ob_get_clean();

        return \WPEmerge\view( 'app/views/plain_page/plain_page.php' )->with( ['content' => $content] );
    }
}
