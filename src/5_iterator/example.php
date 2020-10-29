<?php 

 class IteratorPack implements Iterator 
 {
    protected $values = array();
    public function __construct(array $values = array())
    {
        foreach ($values as $value) {
            $this->values[] = $value;
        }
        $this->rewind();  
    }

    public function rewind() // tương đương set $i = 0 trong vòng lặp
    {
        reset($this->values); // set con trỏ đến vị trí phần tử đầu tiên
    }

    public function valid() // tương đương check $i < chiều dài của mảng trong vòng lặp for
    {
        return false !== $this->current();
    }

    public function next() // tương đương $i++ trong vòng lặp for
    {
        next($this->values); // set con trỏ đến vị trí phần tử tiếp theo
    }

    public function current() // tương đương xuất giá trị với index trong vòng lặp for
    {
        return current($this->values);
    }

    public function key() // tương đương vị trí $i trong vòng lặp for
    {
        return key($this->values); // get vị trí key trong mảng
    }
 }

 class UserData {
     
    public $dataRepository;
    public function __construct($userCollection)
    {
        $this->dataRepository = new IteratorPack($userCollection);
    }

    public function print(){
        while ($this->dataRepository->valid()) {
            $current = $this->dataRepository->current();
            
            echo "Name : " . $current ."<br>";
            $this->dataRepository->next();
        }
        $this->dataRepository->rewind();
    }

    // có thể xử lý thêm cho collection data ví dụ sort, sortBy where, select, count, average ...
    
    public function where($where)
    {
        while ($this->dataRepository->valid()) {
            $current = $this->dataRepository->current();
            if($current == $where){
                echo "Name : " . $current ."<br>";
            }
            $this->dataRepository->next();
        }
        $this->dataRepository->rewind();
    }
 }

 $userData = ['Tý', 'Tèo', 'Tủn', 'Ty'];
 
 $user = new UserData($userData);

 $user->print();

 echo "print element with Where<br>";
 $user->where('Ty');


 


