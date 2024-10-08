<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=page.add.add.done,page.edit.update.done
[END_COT_EXT]
==================== */

/**
 * Pageavatar for Cotonti CMF
 *
 * @author  esclkm
 * @copyright esclkm
 *
 * @var int $id Page ID
 */
defined('COT_CODE') or die('Wrong URL');

global $paset, $pageavatar, $pa_file_ext;

if (!cot_error_found()) {
	if (cot_import('rpageavatardelete', 'P', 'BOL')) {
		$rpageavatar = cot_import('rpage'. cot::$cfg['plugin']['pageavatar']['field'], 'P', 'TXT');
		$filename = $paset['path'] . $rpageavatar;
		if (file_exists($filename)) {
			@unlink($filename);
		}
		foreach ($paset['thumbs'] as $key => $val) {
			$newfilename = $paset['path'] . $key . $rpageavatar;
			if (file_exists($newfilename)) {
				@unlink($newfilename);
			}
		}

        cot::$db->update(
            cot::$db->pages,
            ['page_' . cot::$cfg['plugin']['pageavatar']['field'] => ''],
            'page_id=?',
            $id
        );
	}

	if (!empty($pageavatar["name"])) {
		$filename = $paset['path'] . 'page_' . $id . '.' . $pa_file_ext;
		if (file_exists($filename)) {
			@unlink($filename);
		}
		move_uploaded_file($pageavatar["tmp_name"], $filename);

		if (file_exists($filename) && in_array($pa_file_ext, ['jpg', 'jpeg', 'png', 'gif'])) {
			foreach ($paset['thumbs'] as $key => $val) {
				$newfilename = $paset['path'] . $key . "page_" . $id . "." . $pa_file_ext;
				if (file_exists($newfilename)) {
					@unlink($newfilename);
				}
				cot_thumb($filename, $newfilename, $val['x'], $val['y'], $val['set']);
			}
		}
		$pafname = 'page_' . $id . '.' . $pa_file_ext;

        cot::$db->update(
            cot::$db->pages,
            ['page_' . cot::$cfg['plugin']['pageavatar']['field'] => $pafname],
            'page_id=?',
            $id
        );
	}
}
