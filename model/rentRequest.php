<?php
if (!isset($_SESSION['user'])){
    header('location: ./?page=youNeedToLogin');
}
