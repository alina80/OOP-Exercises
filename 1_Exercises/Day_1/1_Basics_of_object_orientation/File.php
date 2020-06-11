<?php
//below, write code for defining class
class File{
    protected $path;
    protected $size;

    public function __construct(string $path, int $size)
    {
        $this->path = $path;
        $this->size = $size; // este marimea fisierului in kb
    }

    public function calculateSize(string $unit) : string {
        // 1MB = 1024kB
        // 1kB = 1024B

        $result = 0;
        if ($unit === 'MB'){
            $result = $this->size / 1024;
        }elseif($unit === 'B'){
            $result = $this->size * 1024;
        }
        return $result.$unit;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        if ($path[0] = '/') {
            $this->path = $path;
        }
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        if (is_numeric($size) && $size > 0) {
            $this->size = $size;
        }
    }
}

$file1 = new File('/file.txt',4000);
echo $file1->calculateSize('MB');
echo "<br>";
echo $file1->calculateSize('B');

$file2 = new File('/file.txt',2000);
echo $file2->calculateSize('MB');
echo "<br>";
echo $file2->calculateSize('B');