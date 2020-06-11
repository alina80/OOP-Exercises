<?php
//below, write code for defining class
class HTML{
    protected $id;
    protected $type;
    protected $class;
    protected $style;
    protected $content;
    protected $children;

    public function __construct(string $id)
    {
        $this->id = $id;
        $this->class = [];
        $this->style = null;
        $this->content = null;
        $this->children = [];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getClass(): array
    {
        return $this->class;
    }

    /**
     * @param array $class
     */
    public function setClass(array $class): void
    {
        if (is_array($class)) {
            $this->class = $class;
        }
    }

    /**
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * @param string $style
     */
    public function setStyle($style): void
    {
        $this->style = $style;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function setInline() : void {
        $this->type = 'inline';
    }

    public function setBlock() : void {
        $this->type = 'block';
    }

    public function addChildren(HTML $obj): void{
        $this->children[] = $obj;
    }

    public function removeChildren(HTML $obj): void{
        foreach ($this->children as $key=>$child){
            if ($obj->getId() === $child->getId()){
                unset($this->children[$key]);
            }
        }

    }

    public function listChildren(): array{
        return $this->children;
    }

    public function  addStyle(array $array) : void {
        //"color:red;text-decoration:none";
        //TRANSFORM STRING-ul original in array de tip:
        $oldStyle = explode(";",$this->getStyle());
        //['color:red','text-decoration:none']

        $styleToArray = [];

        //parcurg array-ul oldStyle si il transform intr-un array de tip:
        foreach ($oldStyle as $value) {
            $tmp = explode(':',$value);
            $styleToArray[$tmp[0]] = $tmp[1];
        }
        //['color'=>'red','text-decoration'=>'none']


        $newStyle = [];

        //parcurg array-ul trimis ca parametru si il transform intr-un array-de tip
        //['color'=>'red','text-decoration'=>'none']
        foreach ($array as $k=>$v) {
            $newStyle[] = $k.':'.$v;
        }
        //['color:red','text-decoration:none']


        //parcurg styleToArray si copiez tot ce era vechi in array-ul nou
        foreach($styleToArray as $k=>$v) {
            //daca nu exista cheia $k in array-ul trimis ca parametru
            if(!isset($array[$k])) {
                //fac push in newStyle unei valor de tip 'color:red'
                $newStyle[] = $k.':'.$v;
            }
        }

        //voi obtine un array nou de tip
        //['background-color:red','font-size:10px']
        //care contine tot ce este si vechi si nou o singura data
        //cu prioritate pe ceea ce e nou

        //fac implode pe array-ul nou
        $strStyle = implode(";",$newStyle);
        //"background-color:red;font-size:10px"

        $this->setStyle($strStyle);

    }

}
/*
$a = new HTML('html1');
$a->setBlock();
$a->setStyle("background-color:blue;text-decoration:none;padding-top:0px");
$a->addStyle([ 'background-color'=>'red','font-size'=>'10px' ]);
echo $a->getStyle();
*/