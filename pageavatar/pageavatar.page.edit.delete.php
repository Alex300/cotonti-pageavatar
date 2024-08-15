<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=page.edit.delete.done
[END_COT_EXT]
==================== */

/**
 * Pageavatar for Cotonti CMF
 *
 * @author  esclkm, Seditio.by, Cotonti Team
 * @copyright (c) esclkm, Seditio.by, Cotonti Team
 *
 * @var array $rpage Page data
 */
defined('COT_CODE') or die('Wrong URL');

global $sets;

require_once cot_incfile('pageavatar', 'plug');

$catp = $rpage['page_cat'];
$catp_p = cot_structure_parents('page', $catp, 'first');
$paset = isset($sets[$catp_p]) ? $sets[$catp_p] : $sets['all'];
$paset = isset($sets[$catp]) ? $sets[$catp] : $paset;

$filename = $paset['path'] . $rpage['page_'.Cot::$cfg['plugin']['pageavatar']['field']];
if (file_exists($filename)) {
	@unlink($filename);
}
foreach ($paset['thumbs'] as $key => $val) {
	$newfilename = $paset['path'] . $key . $rpage['page_' . Cot::$cfg['plugin']['pageavatar']['field']];
	if (file_exists($newfilename)) {
		@unlink($newfilename);
	}
}
