<?php
if (isset($_SESSION["login_error"])) {
    echo '<p>' . $_SESSION["login_error"] . '</p>';
    unset($_SESSION["login_error"]); // Clear the error message
}