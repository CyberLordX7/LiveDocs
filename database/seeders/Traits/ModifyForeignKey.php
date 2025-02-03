<?php

 namespace Database\Seeders\Traits;
 use Illuminate\Support\Facades\DB;

 trait ModifyForeignKey{
    protected function DisableForeignKey(){
      DB::statement('SET FOREIGN_KEY_CHECKS=0');
    }
    protected function EnableForeignKey(){
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
 }
