<?php
$value = $_GET['query'];
$formfield = $_GET['field'];

// Check Valid 
if ($formfield == "name") {
if (strlen($value) < 4) {
echo "<span class='alert-danger'>Minimal 4 huruf</span>";
} else {
echo "<span class='alert-success'>Valid</span>";
}
}
// Check Valid 
if ($formfield == "email") {
if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $value)) {
echo "<span class='alert-danger'>Email tidak Valid</span>";
} else {
echo "<span class='alert-success'>Valid</span>";
}
}
// Check Valid 
if ($formfield == "username") {
if (strlen($value) < 4) {
echo "<span class='alert-danger'>Minimal 4 huruf</span>";
} else {
echo "<span class='alert-success'>Valid</span>";
}
}
// Check Valid 
if ($formfield == "password") {
if (strlen($value) < 6) {
echo "<span class='alert-danger'>Passwor Terlalu Pendek</span>";
} else {
echo "<span class='alert-success'>Kuat</span>";
}
}
// Check Valid 
if ($formfield == "nopeg") {
if (strlen($value) <5 ) {
echo "<span class='alert-danger'>Masukkan 6 anggka</span>";
} else {
echo "<span class='alert-success'>Valid</span>";
}
}
?>