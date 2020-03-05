<?php
namespace App\Controllers\Web;

class PageController {
    public function index( $request, $view ) {
    	$loader = \WPEmerge\Facades\Application::resolve(\CrbLoader::class);
    	ob_start();
    	$loader->get_sections('crb_default_page_fields', 'app/views/page');
    	$content = ob_get_clean();

        return \WPEmerge\view( 'app/views/page/page.php' )->with( ['content' => $content] );
    }
}
