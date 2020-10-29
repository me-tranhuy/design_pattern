<?php

interface Component{
    public function showProperties():void;
    public function totalSize():int;
}


class File implements Component{

    protected $name;
    protected $size;
    
    public function __construct($name,$size){
        $this->name = $name;
        $this->size = $size;
    
    }
    
    public function showProperties():void{
        printf('Tên: %s,Kích cỡ: %s'.'<br>'.PHP_EOL,$this->name,$this->size);
    
    }
    
    public function totalSize():int{
        
        // đệ quy
        echo "hàm File<br> ";

        return $this->size;
    }
}

class Folder implements Component{
    
    protected $files = [];
    
    public function __construct(array $files){
        $this->files = $files;
    }
    
    public function showProperties():void{
        foreach($this->files as $file){
            $file->showProperties();
        }
    }
    
    public function totalSize():int{
        $total =0;
        foreach($this->files as $file){
            
            echo "call đệ quy ";
            // call đệ quy class file
            $total += $file->totalSize();
        }
        return $total;
    }
}


class CLient {

    public function __construct()
    {

        $file1 = new File('File 1',10);
        $file1->showProperties();

        echo "<br>";
        $file2 = new File('File 2',20);
        $file2->showProperties();

        echo "<br>";
        $file3 = new File('File 3',30);
        $file3->showProperties();

        echo "<br>";
        $file4 = new File('File 4',40);
        $file4->showProperties();

        echo "<br>";
        $files = [$file1, $file2, $file3, $file4];
        $folder = new Folder($files);
        $folder->showProperties();
        
        echo "<br>";
        echo $folder->totalSize();
    }
}

$client = new Client();


