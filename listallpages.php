<?php 
/**
 * поиск файлов по маске
 * @param $pattern - маска
 */
function search_file_by($pattern, $flags = 0) {
   
    // поиск по маске в папке
    $files = glob($pattern, $flags);
    foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR | GLOB_NOSORT) as $dir)
       
        // поиск в подпапках
        $files = array_merge($files, search_file_by($dir .'/'. basename($pattern), $flags));
    }
    return $files;
}

print_r(search_file_by('*.html'));
