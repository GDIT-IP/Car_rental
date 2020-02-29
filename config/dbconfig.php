<?php
const DB_USER = 'username';
const DB_PASS = 'password';
const DB_SERVER_NAME = 'server';
const DB_NAME = 'database';

$conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASS, DB_NAME);
