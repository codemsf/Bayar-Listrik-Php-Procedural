<?php
$value = $_GET['query'];
$formfield = $_GET['field'];

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
if (strlen($value) < 5) {
echo "<span class='alert-danger'>Passwor Terlalu Pendek</span>";
} else {
echo "<span class='alert-success'>Kuat</span>";
}
}

?>