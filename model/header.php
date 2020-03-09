<?php
$navbar = [];

// 'Our Cars' doesn't require any special access level
$navbar[] = createNavbarLink('Our Cars');

// Elements created in this block are available for authorized users
if (isManagment()) {
    $navbar[] = createNavbarLink('Manager Panel', 'managerPanel');
}

// Authenticated user can see Profile link
if (isset($_SESSION['user'])) {
    $navbar[] = createNavbarLink('Profile', 'profile');
}
