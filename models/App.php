<?php

namespace appbrowser;

/**
 * Model for themes.
 */
class App extends \Model {
	var $table = 'appbrowser_app';

	/**
	 * Get the most recently published posts.
	 */
	function latest ($type, $limit = 10, $offset = 0) {
		return App::query ()->where ('type', $type)->order ('ts desc')->fetch_orig ($limit, $offset);
	}
}

?>