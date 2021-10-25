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
    $files['..'] = glob($pattern, $flags);
    foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR | GLOB_NOSORT) as $dir)
       
        $files[basename($pattern)] = array_merge($files, search_file_by($dir .'/'. basename($pattern), $flags));
    }
    return $files;
}

print_r(search_file_by('*.html'));
