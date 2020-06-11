<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

#  Basics of object orientation

> Complete the exercises in appropriate files.

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

**Remember about type declarations**

In the exercises, conditions are written to check the loaded data; if the data do not meet the conditions, the method should return `false`.

#### Exercise 1 - done with the lecturer

Create a class named ```Calculator```. The constructor should not take any data.
Each newly created object should have an empty array in which it will keep the history of operations (create it in the constructor).
Next, add the following methods to the class:

1. ```add(float $num1, float $num2): float``` - method should add two variables and **return** the result. It should also add the message to the operations table: "added ```num1``` to ```num2``` got ```result```".
2. ```multiply(float $num1, float $num2): float``` - method should multiply two variables and **return** the result. It should also add the message to the operations table: "multiplied ```num1``` with ```num2``` got ```result```".  
3. ```subtract(float $num1, float $num2): float``` - method should subtract one variable from another and **return** the result. It should also add the message to the operations table: "subtracted ```num1``` from ```num2``` got ```result```".
4. ```divide(float $num1, float $num2): float``` - method should divide one variable by another and **return** the result. It should also add the message to the operations table: "divided ```num1``` by ```num2``` got ```result```". Remember that you cannot divide by zero.
5. ```printOperations(): void``` - method should display all operations from its history.
6. ```clearOperations(): void``` - method should clear all operations from its history.

Remember to use ```$this```.  
Create several calculators and test how they work.

#### Exercise 2 - done with the lecturer

Create a class named `File` that will meet the following criteria:

1. Having protected properties:
 * `path` - storing absolute path to the file
 * `size` - storing file size in `kB` as an integer
2. Having a constructor that takes parameters that determine `path` and `size`.
3. Having getters i setters for `path` and `size` attributes.
4. Remember to check if:
 * the file size is a numeric value equal to or greater than 0
 * the file path begins with `/`
5. Having a method named `calculateSize(string $unit): string` that calculates and returns file size in `MB` or `B`, e.g. `calculateSize('MB')` should **return** a `string`  
`Size in MB is: 0.234`, conversion methods can be found in the section [3_Snippets][bit_bytes]

Remember to use ```$this```.  
Create several files and test how your code works.

-------------------------------------------------------------------------------

#### Exercise 3

Create a class named `Member` that will meet the following criteria:

1. Having private properties:
 * `username` - storing user login
 * `password` - storing user password
 * `accessLevel` - storing user access level, 0 by default
2. Having a constructor that takes parameters that determine `username` and `password` values.
3. The constructor should use setters to save properties, and display information about the created object.
4. Remember to check:
 * if the type of passed parameters is `string` at least 5 character long
 * if the property does not meet this criteria, set it to random 5 characters - hint: [stackoverflow][random_string]
5. Having a destructor that **displays** information about the destructed user (`The object of user username is destructed`).
6. Having a `info(): void` method that **displays** information about a user, displaying his `username` and `password`.

Remember to use ```$this```.  
Create several users and test how your code works.

Check what happens when you change the access to method from public to private.
See what happens if you change the attributes of access to the constructor and destructor.

#### Exercise 4

Create a class named `BankAccount` that will meet the following criteria:

1. Having private properties:
 * `number` - for storing bank account id,
 * `balance` - for storing the amount of money in the account (account balance). This should be a float.
2. Having a constructor that takes only the account number. The `balance` property should always have the default value of `0` for a newly created account.  
3. Having getters for `number` and `balance` properties, but **NOT having** setters for them (we do not want an existing account to change number, and `balance` property will have special methods that will modify its value).
4. Having a method named `depositCash(float $amount): void` that will increase the value of `balance` attribute by a given amount. Remember to check if the given value is:
 * numeric,
 * greater than 0
5. Having a method named `withdrawCash(float $amount): void` that will decrease the value of `balance` attribute by a given amount.
The method should **return** the withdrawn amount and decrease the `balance` by the withdrawn amount.
To simplify things, we assume that **acount balance cannot be negative**, e.g. if we try to withdraw `530USD` from an acount that has only `320USD`, the method will **return** only `320USD`.
Remember to check if the given value is:
* numeric,
* greater than 0
6. Having a method named `printInfo(): void` that does not take any parameters. The method should **display** information about account number and its balance in the format: `Account ID: 43, Balance: 123.87USD`.  

Remember to use ```$this```.  
Create several accounts and test how your code works.

#### Exercise 5

Create a class named `Employee` that will meet the following criteria:

1. Having private properties:  
 * `id` - for storing employee id,
 * `firstName` - for employee name,
 * `lastName` - for employee surname,
 * `salary` - for employee's hourly salary.
2. Having a constructor that takes id, name, surname and hourly salary.  
3. Having getters and setters for `firstName`, `lastName` and `salary` attributes. For the `id` attribute we will only need a getter.
4. Having a method named `raiseSalary(float $percent): void` that will increase the value of the `salary` attribute **by a given percent**.  
Remember to check if the given value is:
* numeric,
* equal to or greater than 0.

Remember to use ```$this```.  
Create several employees and test how your code works.

<!--Links-->
[random_string]: http://stackoverflow.com/a/4356295/3668159
[bit_bytes]: ../../../3_Snippets#11-bits-and-bytes
