# OOP - homework
> Complete the exercises in appropriate files.

>Additional exercise are for volunteers

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

**Remember about type declarations**

#### Exercise 1

In `Course.php`, create a class named `Course` that:  

1. Has a private property named `name` (of the course) - max 10 characters long
2. Has a private property named `hours` storing the number of hour f the course - an integer greater than zero `0` with max value of `50`
3. Has a private property named `startDate`- with a date in the format `YYYY-MM-DD` - hint: [php_date][php_date]
4. Remember to add setters and getters, where setter and getter name is `setProperty`, `getProperty`, e.g. `setStartDate`, `getStartDate`; other formats will be rejected
5. Setters should **return** `false` if the value to be set does not meet the criterion.

#### Exercise 2

In `Course.php` from exercise 1 add:  

1. Private property named `students` - an **array** storing student list with names and surnames
2. Getter for the `students` property.
3. Method named `addStudent(string $name): bool` that will add a student - the method cannot allow adding more than `6` students to a course, if the 7th student is added - the method returns `false`
4. Method named `removeStudent(string $name): bool` that deletes a student.

#### Exercise 3

In `Course.php` from exercise 1 and 2 add:  

1. a method named `daysToStart(): void` that will display days left to the beginning of the course:  
 * if the course date is not set, the method should return the string: `startDate not set`
 * if the course beginning is set to `2020-07-17` and current date is `2020-07-12`, the method should return `5`  
 * if the course beginning is in the past, the method should return the string: `Course started`

#### Exercise 4

In `HTML.php`, create a `HTML` class representing a html element that has:  

1. A protected value named `id`, to simplify we assume that there will only be one `HTML` class object with a given `id`
2. A constructor that takes 1 parameter - element `id`
3. A protected property named `type` which is the type of element - either `inline` or `block`
4. A protected property named `class` which is an array with a list of element classes - empty by default, setter should not allow any other value type than array, if a different type is passed, the method should return `false`
5. A protected property named `style` which is a string with css style of element, `null` by default
6. A protected property named `content` which is a string with the text of an element, `null` by default
7. A method named `setInline(): void` that sets `type` to `inline` value
8. A method named `setBlock(): void` that sets `type` to `block` value
9. Getters and setters for property, with the same naming as in exercise 1, add only a getter to `type` and to `id`.

#### Exercise 5 - additional

Add to the `HTML` class:  

1. A protected property named `children` - an **array** that contains zawierającą child objects within html element.
2. A method named `addChildren(HTML $obj): void` that adds child element to children array (other html element, **must be of HTML class**)
3. A method named `removeChildren(HTML $obj): void` that removes child element from children array (other html element, **must be of HTML class**), the best way to find an element is to check its id with the id of a passed element.
4. A method named `listChildren(): array` that returns an array of child elements (other html element/s).

#### Exercise 6 - additional

Add to the `HTML` class:  

1. A method named `addStyle(array $array): void` that will take an array of styles as a parameter, and from those styles a string will be generated and inserted into the `style` property.  

Call example:  
```php
$obj->addStyle([ 'background-color'=>'red','font-size'=>'10px' ])
```
will cause generating a string: `background-color: red; font-size: 10px;` and inserting it into the `style` property.

<!-- Links -->
[mysql_concat]: https://dev.mysql.com/doc/refman/5.7/en/string-functions.html#function_concat
[php_date]: https://secure.php.net/manual/en/function.date.php
