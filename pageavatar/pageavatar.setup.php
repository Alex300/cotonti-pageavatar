<?php
/* ====================
[BEGIN_COT_EXT]
Code=pageavatar
Name=Page Avatar
Description=Page Avatar plugin enables you to upload, replace and delete images for a specific page bypassing PFS
Version=4.0.4
Date=2023-04-20
Author=esclkm, Seditio.by, Cotonti Team
Copyright=&copy; esclkm, Seditio.by, Cotonti Team 2011-2024
Notes=
Auth_guests=R
Lock_guests=W12345A
Auth_members=RW
Lock_members=
Requires_modules=page
[END_COT_EXT]

[BEGIN_COT_EXT_CONFIG]
set=01:textarea:::Format settings cat|path|thumb-x-y|reqiured|ext
field=02:string::avatar:field name
[END_COT_EXT_CONFIG]
==================== */

/**
 * Pageavatar plugin for Cotonti CMF
 *
 * @author  esclkm, Seditio.by, Cotonti Team
 * @copyright (c) esclkm, Seditio.by, Cotonti Team
 */

defined('COT_CODE') or die('Wrong URL.');

