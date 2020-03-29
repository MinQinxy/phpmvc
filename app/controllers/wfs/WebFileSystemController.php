<?php
namespace Controllers\Wfs;

use Vender\Core\ViewLoader;
use Models\FsModel;
class WebFileSystemController{
	
	public function index(){
		$now = isset($_GET['now'])?$_GET['now']:"/" ;

		$content = (new FsModel)->nowPathContent($now);

		(new ViewLoader("fsweb",$content) )->render();

	}

}