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
    print_r(dirname($pattern));
    print_r(glob(dirname($pattern) . '/*', GLOB_ONLYDIR));
    /* foreach (glob(dirname($pattern) . '/*', GLOB_ONLYDIR) as $dir)
        print_r(basename($pattern));
        // $files[basename($pattern)] = search_file_by($dir .'/'. basename($pattern), $flags);
    } */
    return $files;
}

print_r(search_file_by('/*.html'));
