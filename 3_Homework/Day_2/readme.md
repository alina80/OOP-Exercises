# OOP - homework
> Complete the exercises in appropriate files.

>Additional exercise are for volunteers

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

**Remember about type declarations**

#### Exercise 1

Create a class named `FullTimeCourse` that inherits from `Course` class.  
Use `require()` with an appropriate file from section [Day_1][Day_1], instead of copying the code of `Course` class.  
Hint how to properly add files relatively is in the section [3_Snippets][dirname_file]

1. Add a private property named `location` for the address of the course location
2. Add a private property named `lecturer` for the name and surname of the course lecturer
3. Add a private property named `duration` for the length of the course in hours
4. Add setters and getters for each property

#### Exercise 2

Create a class named `OnlineCourse` that inherits from `Course` class.  
Użyj `require()` with an appropriate file from section [Day_1][Day_1], instead of copying the code of `Course` class.

1. Add a **constant** named `TOKEN_LENGTH` with the value of `8`
2. Add a private property named `link` that stores the link to the course
3. Add a private property named `accessToken` with the access token - hint: [random_string][random_string]
4. Add a private property named `accessTime` with date of online access to the course, should be in the format `YYYY-MM-DD HH:MM:SS` - hint: [php_date][php_date]
5. Add setters and getters for all properties

#### Exercise 3

To the `OnlineCourse` class add:  

1. A method named `generateAccessToken(): string` that generates a string with length of `TOKEN_LENGHT` and saves it in the `accessToken` property
2. The `generateAccessToken` method should be called in the constructor.

#### Exercise 4

Create a class named `DivHTML` that inherits from `HTML` class.  
Użyj `require()` with an appropriate file from section [Day_1][Day_1], instead of copying the code of `Course` class.

1. Set default value of `type` property to `block`
2. Add a private property named `width` that stores element width, `null` by default
3. Add a private property named `height` that stores the height of an element, `null` by default
4. Add setters and getters for all properties

#### Exercise 5

Create a class named `LinkHTML` that inherits from `HTML` class.  
Użyj `require()` with an appropriate file from section [Day_1][Day_1], instead of copying the code of `Course` class.

1. Set default value of `type` property to `inline`
2. Add a private property named `href` that stores link address, `#` by default
3. Add a private property named `target`, that stores the method of moving to the link, `_blank` by default
4. Add setters and getters for all properties

#### Exercise 6

Create a class named `InputHTML`that inherits from `HTML` class.  
Użyj `require()` with an appropriate file from section [Day_1][Day_1], instead of copying the code of `Course` class.

1. Set default value of `type` property to `inline`
2. Add a private property named `inputType` that stores input type, `text` by default
3. Add a private property named `value` that stores input value, `null` by default
4. Add a private property named `disabled`, that stores information if the input has the `disabled` state, `false` by default
5. Add setters and getters for all properties

#### Exercise 7 - additional

In php we have the option of using the so-called magical methods that are automatically called in appropriate situations.
In this exercise we will deal with the `__set()` and `__get()` methods.

These methods are called automatically when you try to download or save a non-existing property in our object.
For example, we have an object `$input = new InputHTML()` that does not have the `checked` property defined.  
If we call the code `$input->checked = 'fooBar'`, php will automatically call the magical method `__set()` (if it was defined) with the following parameters (passed automatically):  
`__set('checked', 'fooBar')` and our task is to handle data in this method in any way we want.

A detailed description can be found [here][get_set_magic_methods].  

The aim of this exercise is to extend the `FullTimeCourse` class by:  

1. Adding a private property named `days` - an array (empty by default) that stores the subject of each day of the course, e.g. `php`, along with a getter to the `days` property.
2. Defining the magical method `__set()` in such a way that it adds appropriate data to the `days` array when called:
 * `$obj->monday = 'php';` should add the key `monday` and value `php` to the `days` array
 * `$obj->thursday = 'workshop'` should add data analogically to the previous point
3. Defining the magical method `__get()` that will return appropriate data when called:
 * `echo $obj->thursday;` should display the subject of Thursday's classes
 * if the property was not set beforehand, the magical method should return `null`

#### Exercise 8 - additional

The aim of this exercise is to create the **generating of html code** of an element that represents one of the following classes: `DivHTML`, `LinkHTML`, `InputHTML`.  
For this purpose, we will use a next magical method `__toString()` which, if defined, will be automatically called if we try to change our object into a string.
This will happen, for example, when we try to display the object using `echo` function, but also if we add our object to a string using the dot operator (concatenation).

**This method must return a string**. This string will be a representation of our object.
An example of implementation and use of this method can be found here: [http://php.net/manual/en/language.oop5.magic.php#object.tostring][to_string].  

```php
$obj = new DivHTML();// creating an instance of an object  
echo $obj;// php automatically checks if our class has a magic method `__toString()` and passes its result to `echo`.
```
When we have an array with objects named `$objects`, the following example will also use the magic method `__toString()`
```php
$resultString = '';// variable storing a string
foreach($objects as $object){
    $resultString .= $object;// php automatically checks if our class has a magic method `__toString()` and returns its result, because we used concatenation
}
```  

In our case, we will use this method to generate the html code of our objects.

`DivHTML`:
 * the magic method should **return** a string containing the code of `div` element with appropriate attributes (`id`,`class`, `style`), e.g.  
   `<div id="foo" class="bar lorem" style="color:red; font-size: 12px;"></div>`  
 * attribute should be added **only** if the property representing it does not have the value of `null`
 * if `width` and `height` properties are not `null`, generate appropriate css properties in the `style` attribute, e.g.
   `<div id="foo" class="bar lorem" style="color:red; font-size: 12px; width: 200px; height: 150px;"></div>`
 * the `content` property is the text within our `div` element, e.g.  
   `<div id="foo" class="bar lorem" style="color:red; font-size: 12px; width: 200px; height: 150px;">lorem ipsum dolor</div>`

#### Exercise 9 - additional

Just like in task 8, create a magical method that generates the code of a link.

`LinkHTML`:
 * the magic method should **return** a string containing the code of `a` element with appropriate attributes (`id`,`class`, `style`), e.g.  
   `<a id="foo" class="bar lorem" style="color:red; font-size: 12px;"></a>`  
 * attribute should be added **only** if the property representing it does not have the value of `null`
 * the `href` and `target` propertes have default values so they will **always** be generated, e.g.  
   `<a id="foo" class="bar lorem" style="color:red; font-size: 12px; width: 200px; height: 150px;" href="#" target="_blank"></a>`
 * the `content` property is the text within our element, e.g.  
   `<a id="foo" class="bar lorem" style="color:red; font-size: 12px; width: 200px; height: 150px;" href="#" target="_blank">Google</a>`

#### Exercise 10 - additional

Just like in task 8 and 9, create a magical method that generates the code of an input.  

`InputHTML`:
 * the magic method should **return** a string containing the code of `input` element with appropriate attributes (`id`,`class`, `style`), e.g.  
   `<input id="foo" class="bar lorem" style="color:red; font-size: 12px;"></input>`  
 * attribute should be added **only** if the property representing it does not have the value of `null`
 * if `value` property is not `null`, also generate an appropriate attribute, e.g.  
   `<input id="foo" class="bar lorem" style="color:red; font-size: 12px;" value="Mark"></input>`  
 * the `type` property has a default value so it will **always** be generated, e.g.  
   `<input id="foo" class="bar lorem" style="color:red; font-size: 12px;" type="text"></input>`
 * the `disabled` property should be generated if its value is **other** than `false` and generated attribute should have the value of `disabled`, e.g.  
   `<input id="foo" class="bar lorem" style="color:red; font-size: 12px;" type="text" disabled="disabled"></input>`

#### Exercise 11 - additional

**The condition for completing this exercise is having done [exercise 5][Day_1_ex_5] from the previous day correctly**

The aim of the exercise is to create a structure of html objects and generate a ready html code for the whole structure.
In the previous exercises, we have created code that generates html code for a single element.

In exercise 5 from the previous day, a method named `addChildren(): void` was created that stores the children of an element in an array.  
In other words, our operating algorithm will be as follows:

1. We create an object of element, e.g. `DivHTML` which will be our parent
2. We create 2 element objects, e.g. `LinkHTML` which will be the childern of our `div` from point 1.
3. We add the created children using the `addChildren(): void` method called on the parent element named `DivHTML`
4. To understand what has happened so far, look at the code below - it is only an illustrative example:  

    ```html
    <div><!-- our parent from point 1-->
       <a></a><!-- our child from point 2-->
       <a></a><!-- our child from point 2-->
    </div>
    ```
5. In all classes that inherit from the `HTML` class, change the magic method `__toString` so that it:
 * generates a given opening tag (generating all of its attributes, such as `id`, `class`, etc. correctly)
 * checks if the tag has any children (elements in the `children` array)
 * changes any existing children into a string (note that `__toString()` method will be called in this object - thanks to this, the elements will be displayed cascading, you can use concatenation here)
 * generates the content (stored in `content` property) if there are no children
 * generates closing tag
 * **remember that the method `__toString()` must return a string**
6. It looks as follows: we have a structure as in point 4.
 * we call `echo` on `DivHTML` object
 * `DivHTML` calls the `__toString()` method, in which it checks if the object has children (it has 2 links, so the method does not generate `content`)
 * `__toString()` method iterated through the children array and concatenates subsequent objects `LinkHTML`, generating their html code
 * `__toString()` method is called in each `LinkHTML` object (because of concatenation) that checks if the link has children (no, it does not, so the method generates `content`)

In `exercise11.php`, create parent object (any element), create several child elements, and add them to the parent.
Next, try to generate html code doing `echo` of the parent, and check if your code works correctly.

<!-- Links -->
[Day_1]: ../Day_1
[Day_1_ex_5]: ../Day_1#exercise-5---additional
[dirname_file]: ../../3_Snippety#12-how-to-correctly-use-include-and-require-with-__dir__
[random_string]: http://stackoverflow.com/a/4356295/3668159
[php_date]: https://secure.php.net/manual/en/function.date.php
[get_set_magic_methods]: http://www.php.pl/Wortal/Artykuly/PHP/Podstawy/Programowanie-obiektowe-dla-poczatkujacych/Metody-magiczne
[to_string]: http://php.net/manual/en/language.oop5.magic.php#object.tostring
