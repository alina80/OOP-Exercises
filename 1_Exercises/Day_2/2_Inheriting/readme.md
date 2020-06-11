<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

#  Inheriting

> Complete the exercises in appropriate files.

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

**Remember about type declarations**

#### Exercise 1 - done with the lecturer

Create a class named ```AdvancedCalculator``` that inherits from ```Calculator``` class.
Use `require()` with an appropriate file from the section [1_Basics_of_object_orientation][object_orientation], instead of copying the code of `Calculator` class.  
Hint on how to properly add files in a relative way is in the section [3_Snippets][dirname_file]

The class should implement the following methods:

1. ```pow(float $num1, float $num2): float``` - should **return** ```num1``` to the power of ```num2```. Additionally, it should save the message in the operations table: "```num1```^```num2``` equals ```result```".
2. ```root(float $num1, float $num2): float``` - should **return** the ```num2```-th root of ```num1```. Additionally, it should save the message in the operations table: "root ```num2``` of ```num1``` equals ```result```".  

**Remember to change the access modifiers of methods, and properties of classes from day 1 to appropriate values if necessary.**
**Write in a comment, why we should do it.**

Create several advanced calculators and test how they work.

#### Exercise 2 - done with the lecturer

Create a class named `TextFile` that inherits from the `File` class.  
Use `require()` with an appropriate file from the section [1_Basics_of_object_orientation][object_orientation], instead of copying the code of `File` class.

The class should meet the following criteria:

1. Having additional properties, as well as getters and setters for them:
 * `encoding` - for storing character encoding, e.g.`utf-8` or `iso-8859-2`
 * `language` - for storing code of the language that the text of the file is written in, `pl` by default
 * `content` - that contains the contents of the text file
2. Having a method named `countWords()` that returns the number of words in the text file - `content` property.
3. Having a method named `countChars()` that returns the number of characters **excluding spaces** in the text file - `content` property.
4. Having a method named `truncate()` that will clear the contents of the file - `content` property.  

Create several text files and test how they work.

-------------------------------------------------------------------------------

#### Exercise 3

Create a class named `ImageFile` that inherits from the `File` class.

The class should:
1. Have additional properties, as well as getters and setters for them:  
 * `ext` - for storing file extension, e.g. `jpg`, `gif`, `bmp` or `png`
 * `width` - for storing image width
 * `height` - for storing image height
2. Have a method named `resize(float $scale): void` that will increase the value of width and height by multiplying **current** value by scale  
3. Have a method named `pxpkb(): float`, (pixels per kilobyte) that will calculate how many pixels fit in `1kB` of an image. To do this, follow these steps:
 * extract image size
 * calculate the product of its width and height
 * calculate `pxpkb`

 Create several image files and test how they work.

#### Exercise 4

Create a class named `HourlyEmployee` representing an employee paid hourly for their work.

The class should meet the following criteria:

1. Inherit from the `Employee` class.
2. Have an additional method named `computePayment(int $hours): float` that will return an amount payable to the employee for the hours he worked.    

Create several hourly employees and test how they work.

#### Exercise 5

Create a class named `SalariedEmployee` that represents an employee paid monthly. Klasa ma spełniać następujące wymogi:

1. Dziedziczyć po klasie `Employee`.  
2. Have an additional method named `computePayment(): float` that will return an amount payable to the employee for a month (to simplify, let's assume that each month has 160 working hours).   

Create several monthly employees and test how they work.

<!--Links-->
[object_orientation]: ../../Day_1/1_Basics_of_object_orientation
[dirname_file]: ../../../3_Snippets#12-jak-prawidłowo-używać-include-i-require-z-użyciem-__dir__
