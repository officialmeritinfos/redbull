<?php

namespace App\Defaults;

use App\Models\GeneralSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait Regular
{
    private function uniqueId($length=10)
    {
        $id = Str::random($length);
        return $id;
    }

    public function generateId($table,$column,$length=10): string
    {
        $id = $this->uniqueId($length);
        $query = DB::table($table)->select($column)->where($column,$id)->first();
        return (empty($query)) ? $id : $this->uniqueId($table,$column,$length);
    }
    private function uniqueCode($length=10)
    {
        return random_bytes($length);
    }

    public function generateCode($table,$column,$length=10): string
    {
        $id = $this->uniqueCode($length);
        $query = DB::table($table)->select($column)->where($column,$id)->first();
        return (empty($query)) ? $id : $this->generateId($table,$column,$length);
    }

    public function codeExpiration()
    {
        $web = GeneralSetting::where('id',1)->first();
        $codeExpiration = $web->codeExpiration;
        return $codeExpiration;
    }

}
