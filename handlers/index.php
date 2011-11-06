<?php

$o = new StdClass;

$o->type = isset ($_GET['type']) ? $_GET['type'] : 'app';
$o->num = isset ($_GET['num']) ? $_GET['num'] : 0;
$o->limit = 10;
$o->offset = $o->num * $o->limit;

$t = new appbrowser\App;
$o->apps = $t->latest ($o->type, $o->limit, $o->offset);

$o->count = $t->query ()->where ('type', $o->type)->count ();
$o->last = $o->offset + count ($o->apps);
$o->more = ($o->count > $o->last) ? true : false;
$o->next = $o->num + 2;

if (count ($o->apps) == 0) {
	echo '<p>' . i18n_get ('No apps available') . '</p>';
}

echo $tpl->render ('appbrowser/index', $o);

?>