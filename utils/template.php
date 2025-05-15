<?php

/**
 * Get the absolute path to the templates directory
 * 
 * @return string The absolute path to the templates directory
 */
function get_template_directory(): string {
    $base_dir = dirname(dirname(__FILE__));
    $template_dir = $base_dir . '/templates';

    return $template_dir;
}

/**
 * Include a template file with optional arguments
 * 
 * @param string $path The relative path to the template file (without .php extension)
 * @param array $args Optional arguments to pass to the template
 * @return void
 */
function get_template_part(string $path, array$args = []): void {
    $template_dir = get_template_directory();
    $template_path = $template_dir . '/' . $path . '.php';

    $file_exists = file_exists($template_path);

    if(!$file_exists) return;

    (function() use ($args, $template_path) {
        extract(['args' => $args]);
        include $template_path;
    })();
}

/**
 * Merge default arguments with provided arguments
 * 
 * @param array $args The arguments provided by the user
 * @param array $default_args The default arguments to use as fallback
 * @return array The merged arguments array
 */
function get_template_args(array $args, array $default_args): array {
    return array_merge($default_args, $args);
}