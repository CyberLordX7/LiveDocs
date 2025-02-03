<?php

namespace App\Helpers\Routes;

class RouteHelper {
    public static function includeRouteFiles($folder){
        $dirIterator = new \RecursiveDirectoryIterator($folder);
        /**@var \RecursiveDirectoryIterator | \RecursiveIteratorIterator $It */
        $It = new \RecursiveIteratorIterator($dirIterator);

        while($It->valid()){
            if(!$It->isDot()
               && $It->isFile()
               && $It->isReadable()
               && $It->current()->getExtension() === 'php')
               {
                require $It->key();
                require $It->current()->getPathname();
               }
               $It->next();
        }
    }
}


