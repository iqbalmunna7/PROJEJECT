<?php


namespace App\classes;


class FoodUpload
{
    protected $name;
    protected $email;
    protected $phone;
    protected $value;
    protected $imageFile;
    protected $imageName;
    protected $imageDirectory;
    protected $imagePath;
    protected $filePath;
    protected $file;
    protected $data;
    protected $array;
    protected $array1;
    protected $array2;

    public function __construct($file = null, $post = null)
    {
        if ($post)
        {
            $this->name = $post['name'];
            $this->email = $post['email'];
            $this->phone = $post['phone'];
            $this->value = $post;
        }
        if ($file)
        {
            $this->imageFile = $file['image'];
        }
    }

    public function index()
    {
        $this->imagePath = $this->imageUpload();
        $this->filePath = 'db/db.txt';
        $this->file = fopen($this->filePath, 'a');
        $this->data = "$this->name,$this->email,$this->phone,$this->imagePath$";

        fwrite($this->file, $this->data);
        fclose($this->file);
        return 'Done.';
    }

    protected function imageUpload ()
    {
        $this->imageName = time().$this->imageFile['name'];
        $this->imageDirectory = 'assets/img/upload/'.$this->imageName;
        move_uploaded_file($this->imageFile['tmp_name'], $this->imageDirectory);
        return $this->imageDirectory;
    }

    public function getAllStudentInfo ()
    {
        $this->filePath = 'db/db.txt';
        $this->data = file_get_contents($this->filePath);
        $this->array = explode('$', $this->data);
        foreach ($this->array as $key => $value)
        {
            $this->array1 = explode(',', $value);
            if ($this->array1[0])
            {
                $this->array2[$key]['name'] = $this->array1[0];
                $this->array2[$key]['email'] = $this->array1[1];
                $this->array2[$key]['phone'] = $this->array1[2];
                $this->array2[$key]['image'] = $this->array1[3];
            }

        }
        return $this->array2;
    }
}