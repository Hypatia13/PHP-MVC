<?php
/**
 * Created by PhpStorm.
 * User: erie
 * Date: 07/12/2019
 * Time: 20.53
 */

namespace App\Classes;


class UploadFile
{
    protected $filename;
    protected $max_filesize = 209571;
    protected $extension;
    protected $path;


    public function getName()
    {
        return $this->filename;
    }

    protected function setName($file, $name = "")
    {
        if ($name == "") {
            $name = pathinfo($file, PATHINFO_FILENAME);
        }
        $name = strtolower(str_replace(['_', ' '], '-', $file));

        //Gives random strings
        $hash = md5(microtime());
        $ext = $this->fileExtension();
        $this->filename = "{$name}-{$hash}.{$ext}";
    }

    protected function fileExtension($file)
    {
        return $this->extension = pathinfo($file, PATHINFO_EXTENSION);
    }

    public function fileSize($file)
    {
        return $file > $this->max_filesize ? true : false;
    }
}