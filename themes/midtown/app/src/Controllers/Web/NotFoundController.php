<?php
namespace App\Controllers\Web;

class NotFoundController {
    public function index( $request, $view ) {
        return \WPEmerge\view( 'app/views/404/404.php' );
    }
}