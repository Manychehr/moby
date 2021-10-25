<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/**
 * поиск файлов по маске
 * @param $pattern - маска
 */
function search_file_by($pattern, $flags = 0) {
    $files = [];
    $files = glob($pattern, $flags);

    $dirname = dirname($pattern);
    if ($dirname = '.') {
        $dirname = '';
    }

    foreach (glob($dirname . '/*', GLOB_ONLYDIR) as $dir)
        $files[dirname($dir)] = search_file_by($dir .'/'. basename($pattern), $flags);
    }
    return $files;
}

print_r(search_file_by('*.html'));
