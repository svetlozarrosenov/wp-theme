<?php
namespace App\Controllers\Web;

class SearchController {
    public function index( $request, $view ) {
    	ob_start();

		\WPEmerge\render( 'app/views/search/loop.php' );

    	$content = ob_get_clean();

        return \WPEmerge\view( 'app/views/search/index.php' )->with( ['content' => $content] );
    }
}