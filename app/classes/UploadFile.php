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


    /**
     * Get the file name
     * @return mixed
     */
    public function getName()
    {
        return $this->filename;
    }

    /**
     * Set the file name
     * @param $file
     * @param string $name
     */
    protected function setName($file, $name = "")
    {
        if($name === "")
        {
            $name = pathinfo($file, PATHINFO_FILENAME);
        }
        $name = strtolower(str_replace(['_', ' '], '-', $name));

        //Gives random strings
        $hash = md5(microtime());
        $ext = $this->fileExtension($file);
        $this->filename = "{$name}-{$hash}.{$ext}";
    }

    /**
     * Get file extension
     * @param $file
     * @return mixed
     */
    protected function fileExtension($file)
    {
        return $this->extension = pathinfo($file, PATHINFO_EXTENSION);
    }

    /**
     * Validate file size
     * @param $file
     * @return bool
     */
    public static function fileSize($file)
    {
        $fileObj = new static();
        return $file > $fileObj->max_filesize ? true : false;
    }

    /**
     * Validate file type
     * @param $file
     * @return bool
     */
    public static function isImage($file)
    {
        $fileObj = new static();
        $ext = $fileObj->fileExtension($file);
        $validExtension = array('jpg', 'jpeg', 'bmp', 'png', 'gif');
        if (!in_array(strtolower($ext), $validExtension)) {
            return false;
        }
        return true;
    }

    /**
     * Get the path where a file was uploaded to
     * @return mixed
     */
    public function path()
    {
        return $this->path;
    }

    /**
     * Move the file to an intended location
     * @param $temp_folder
     * @param $folder
     * @param $file
     * @param string $new_filename
     * @return UploadFile|null
     */
    public static function move($temp_folder, $folder, $file, $new_filename = "")
    {
        $fileObj = new static();
        $fileObj->setName($file, $new_filename);
        $file_name = $fileObj->getName();

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $ds = DIRECTORY_SEPARATOR; // A slash
        $fileObj->path = "{$folder}{$ds}{$file_name}";
        $absolute_path = BASE_PATH . "{$ds}public{$ds}$fileObj->path";
        if (move_uploaded_file($temp_folder, $absolute_path)) {
            return $fileObj; //Return an object to use method chaining
        }
        return null;
    }
}