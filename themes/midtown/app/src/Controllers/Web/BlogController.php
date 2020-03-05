<?php
namespace App\Controllers\Web;

class BlogController {
    public function index( $request, $view ) {
    	ob_start();

		\WPEmerge\render( 'app/views/blog/loop.php' );

    	$content = ob_get_clean();

        return \WPEmerge\view( 'app/views/blog/index.php' )->with( ['content' => $content] );
    }
}