<?php
function isValidGmail($email) {
    if (empty($email)) {
        return false;
    }
    return substr($email, -10) === '@gmail.com';
}
?>

