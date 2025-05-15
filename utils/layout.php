<?php

function get_header(): void {
    include get_template_directory() . '/layout/header.php';
}

function get_footer(): void {
    include get_template_directory() . '/layout/footer.php';
}