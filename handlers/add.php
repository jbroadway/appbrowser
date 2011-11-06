<?php

/**
 * App add form.
 */

$page->layout = 'admin';

if (! User::require_admin ()) {
	$this->redirect ('/admin');
}

$f = new Form ('post', 'appbrowser/add');
$f->verify_csrf = false;
if ($f->submit ()) {
	$_POST['ts'] = gmdate ('Y-m-d H:i:s');
	$t = new appbrowser\App ($_POST);
	$t->put ();

	Versions::add ($t);

	if (! $t->error) {
		$this->add_notification (i18n_get ('App added.'));

		$this->redirect ($_GET['return']);
	}
	$page->title = 'An Error Occurred';
	echo 'Error Message: ' . $t->error;
} else {
	$t = new StdClass;

	$t->failed = $f->failed;
	$t = $f->merge_values ($t);
	$page->title = i18n_get ('Add App');
	echo $tpl->render ('appbrowser/add', $t);
}

?>