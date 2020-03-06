<?php
$navbar = [];

// 'Our Cars' doesn't require any special access level
$navbar[] = createNavbarLink('Our Cars');

// Elements created in this block are available for authorized users
if (isUserAuthorized()) {
    $navbar[] = createNavbarLink('Manager Panel', 'managerPanel');
}
