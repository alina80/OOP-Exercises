<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

# OOP - Snippets
> Short pieces of code that solve various problems, illustrate dependencies, or show how to use some more complicated functions.

#### 1. How to create a class object in PHP?

`$john = new Person();`

#### 2. How to use the so-called chaining?

In OOP, we have the possibility to implement methods in chains, e.g.
`$john->eat()->walk()->run()`

In order to be able to write code in this way, the methods must return an instance of the object - `$this`:

```PHP
class Person{
    private $weight;

    public function eat(){
        $this->weight+=5;
        return $this;
    }

    public function run(){
        $this->weight-=2;
        return $this;
    }
}
```

#### 3. How to copy a class object?

```PHP
$mark = clone $john;
```
Sklonowanie obiektu powoduje utworzenie jego nowej instancji, tutaj w zmiennej `$mark` z wszystkimi metodami i własnościami ustawionymi na takie wartości, jakie posiada `$john` na moment klonowania.
198/5000
Cloning the object creates its new instance (here in the `$mark` variable) with all methods and properties set to those values that `$john` has at the moment of cloning.

#### 4. How to check if a variable is an object of the selected class?

```PHP
$john = new Person();
if($john instanceof Person){
    echo '$john variable is object of class Person';
}

```

#### 5. How can I overwrite a method from a parent class?

Let's assume that `Employee` class inherits from `Person`.
```PHP
class Person{
    private $weight;

    public function eat(){
        $this->weight+=5;
        return $this;
    }

    public function run(){
        $this->weight-=2;
        return $this;
    }
}

class Employee extends Person{
    public function eat(){
        $this->weight+=3;
        return true;
    }
}
```

The `eat()` method is overwritten and calling it on an object of the `Person` class and on one of the `Employee` class will result in different behavior of the code.

#### 6. Access modifiers

* **private** methods and properties cannot be inherited and are not available in inheriting classes; access to them can only be obtained in the class that they were declared in.
* **protected** methods and properties can be inherited and are available in inheriting classes; access to them can only be obtained in the class that they were declared in and in inheriting classes.
* **public** methods and properties can be inherited and are available in inheriting classes; access to them can be obtained both in a class, and through a class object placed in the code (from the outside).

#### 7. Static methods and properties

* **static properties** - properties "with memory", that can be accessed directly from the class, without having to create a class object
* **static methods** - methods that can be accessed directly from the class, without having to create a class object; they do not grant access to `$this`

#### 8. Type hint for method arguments

We can impose in the method which class (or type in php7) the object passed as a parameter should be.
```PHP
...
    public function goWork(Vehicle $withWhat){
    }
...
```

In this case, the `goWork()` method will only accept a parameter that is an object of either the `Vehicle` class or classes that inherit from` Vehicle`.

#### 9. How to create a method with different number of arguments?

If you want to create a method with any number of parameters, e.g. once having 3 and another time having 2, you must create a method with no parameters in its definition.
When calling such method, you pass any number of parameters.

To find out how many arguments were passed and to extract their values, we use 2 special functions:
* `func_num_args()` - returns the number (`int`) of parameters passed to a function
* `func_get_args()` - returns an `array` of parameters passed to a function

```PHP
...
    public function bankTransfer(){ //method has no parameters in its definition
        $numargs = func_num_args();
        echo "Number of arguments: $numargs \n";
        if ($numargs >= 2) {
            echo "Second argument is: " . func_get_arg(1) . "\n";
        }
        $arg_list = func_get_args();
        for ($i = 0; $i < $numargs; $i++) {
            echo "Argument $i is: " . $arg_list[$i] . "\n";
        }
    }

    $john->bankTransfer(15, 'bzwbk'); //calling and passing 2 parameters
    $john->bankTransfer(25, 'mbank', 'credit'); //calling and passing 3 parameters
...
```

#### 10. "Magic" constants

They are constants predefined in php, which have a value automatically assigned by php.

| Constant       | Description                                                                                                            |
|----------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `__LINE__`     | returns the line of the file in which the constant was used                                                                                         |
| `__FILE__`     | returns full absolute path to file in which the constant was used, e.g. `/home/www/page.com/public_html/info.php`                    |
| `__DIR__`      | returns full absolute path to catalog containing the file, in which the constant was used, e.g. `/home/www/page.com/public_html` |
| `__FUNCTION__` | returns the name of the function/method in which the constant was used, e.g. `bankTransfer`                                                             |
| `__CLASS__`    | returns the name of the class, in which the constant was used                                               |
| `__METHOD__`   | returns the name of the method, in which the constant was used, along with the class, e.g. `Person::bankTransfer`    

#### 11. Bits and bytes

1 bit - (1**b**) stores one of the 2 states: `0` or `1`, the smallest information unit
1 Byte - (1**B**) contains 8 bits  
1 kiloByte - (1**kB**) - 1024 Bytes  
1 MegaByte - (1 **MB**) - 1024 ^ 2 Bytes - 1 048 576  

Depending on whether we convert from a smaller or larger unit, we divide or multiply by the appropriate numbers.
Conversion methods:
* `4MB -> kB = 4 * 1024 (1MB is 1024kB) = 4096kB`  
* `420kB -> MB = 420 / 1024kB (1MB is 1024kB) = 0.41MB`

#### 12. How to correctly use `include` and `require` with `__DIR__`?

Let's take the following catalog structure:  
* main catalog `public_html` contains  
  * catalog `includes`, contains:  
    * file `file1.php`
    * file `file2.php`
    * file `file3.php`
  * catalog `images` , contains:  
    * file `img1.jpg`
    * file `img2.jpg`
  * catalog `classes`, contains:  
    * file `first.class.php`
    * file `second.class.php`
    * file `third.class.php`
  * file `mainFile1.php`  
  * file `mainFile2.php`  
  * file `mainFile3.php`  
```
public_html
|___includes
    |___file1.php
    |___file2.php
    |___file3.php
|___images
    |___img1.jpg
    |___img2.jpg
|___classes
    |___first.class.php
    |___second.class.php
    |___third.class.php
|___mainFile1.php
|___mainFile2.php
|___mainFile3.php
```
In `php`, the magic constant `__DIR__` returns an **absolute** path to the catalog that contains the called file.
It is very important to use it because using just `../` may cause problems depending on whether the script in initiated on server level, browser level, or console.

In the `first.class.php` file the constant `__DIR__` will point to `/public_html/classes`.  
If you want to include the`file1.php` file from `includes` catalog, you should move from the absolute path to the includes catalog:  
`require('/public_html/classes/../includes/file1.php')` - or the same but using `__DIR__`  
`require(__DIR__' . /../includes/file1.php')`  

Similarly, if you want to use `require` for a file from a "deeper" catalog.
In the `mainFile1.php` file the constant `__DIR__` will point to `/public_html`.  
If you want to include the `file1.php` file from`includes` - you should move from the absolute path to the includes catalog:  
`require('/public_html/includes/file1.php')` or the same but using `__DIR__`  
`require(__DIR__' . /includes/file1.php')`  

Thanks to such a record, we always have 100% certainty that the correct file will be loaded because we are moving in relation to the absolute path.
