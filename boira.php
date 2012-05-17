<?php if(!defined('PmWiki'))exit;
/**
  Boira Skin
  Written by (c) Carles Escrig 2011

  This text is written for PmWiki; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published
  by the Free Software Foundation; either version 3 of the License, or
  (at your option) any later version. See pmwiki.php for full details
  and lack of warranty.

  Copyright 2006-2011 Petko Yotov http://notamment.fr
  Copyright 2004-2007 Patrick R. Michaud http://www.pmichaud.com
*/

global $PageEditForm, $SiteGroup, $PageStorePath, $WikiLibDirs,
$XLLangs, $XL, $EnableSkinPrefs, $FmtPV, $AuthorGroup;

## Add a custom page storage location for bundled pages.
$PageStorePath = dirname(__FILE__)."/wikilib.d/\$FullName";
$FmtPV['$AuthorGroup'] = $AuthorGroup;

$where = count($WikiLibDirs);
if ($where>1) $where--;
array_splice($WikiLibDirs, $where, 0, array(new PageStore($PageStorePath)));

## Enable the Preferences page.
XLPage('boira', "$SiteGroup.BoiraXLPage");
array_splice($XLLangs, -1, 0, array_shift($XLLangs));

## Enable the skin's custom EditForm, either
## configurable via a prefs page (XLPage) or not.

if ($EnableEditFormPrefs == TRUE) {
  SDV($PageEditForm, "$[$SiteGroup.BoiraEditForm]");
} else {
  SDV($PageEditForm, "$SiteGroup.BoiraEditForm");
}

