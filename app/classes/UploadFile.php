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
    protected $max_filesize = 2097152;
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
        $name = strtolower(str_replace(['_', ' '], '-', $name));

        //Gives random strings
        $hash = md5(microtime());
        $ext = $this->fileExtension($file);
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

    public function isImage($file)
    {
        $ext = $this->fileExtension($file);
        $validExtension = array('jpg', 'jpeg', 'bmp', 'png', 'gif');
        if (!in_array(strtolower($ext), $validExtension)) {
            return false;
        }
        return true;
    }

    public function path()
    {
        return $this->path;
    }

    public function move($temp_folder, $folder, $file, $new_filename)
    {
        $ds = DIRECTORY_SEPARATOR; // A slash

        $this->setName($file, $new_filename);
        $file_name = $this->getName();

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $this->path = "{$folder}{$ds}{$file_name}";
        $absolute_path = BASE_PATH . "{$ds}public{$ds}$this->path";
        if (move_uploaded_file($temp_folder, $absolute_path)) {
            return $this; //Return an object to use method chaining
        }
        return null;
    }
}