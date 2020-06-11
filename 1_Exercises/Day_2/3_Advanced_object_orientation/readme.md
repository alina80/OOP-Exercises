<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

#  Advanced object orientation

> Complete the exercises in appropriate files.

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

#### Exercise 1 - done with the lecturer

Create a class named `CircleCalculator`that inherits from ```Calculator``` class and has:

1. **static** ```PI``` property with assigned value of **3.14**.  
2. **static** ```computeCircleArea($r)``` method that will return the field of a circle.
This method will not add calculations to the array (**write in a comment why he method cannot do this**).

#### Exercise 2 - done with the lecturer

Modify the `BankAccount` class (copy the code of the class created on the first day) in such a way that the constructor assigned account number by itself.
To simplify, subsequent integers will be assigned starting from `1`.  
To do this:

1. Add a **static** private property named `nextAccNumber` to the class.
2. Set its value to 1.
3. Modify the constructor in a way that it does not take account number, but it assigns `nextAccNumber` property value to its own `number` property, and then increases `nextAccNumber` by one.  

Create several accounts and test how their numbers are generated.


-------------------------------------------------------------------------------

#### Exercise 3

Modify the `HourlyEmployee` class (copy class code, remember that it inherits from `Employee`) in such a way that the salary is calculated regardless of seniority. To do this:

1. Add private property named `seniority` - `0` by default - for storing number of years worked; add getter and setter.
2. Add `ratio` **constant** - for storing the ratio of `1.05`  
3. Add a method named `computeSeniorityPayment($hours)` that will **return** the amount payable to the employee for the number of worked hours, taking seniority into account:
 * convert the hourly rate in the following way: `hourly rate * (ratio ^ seniority)`

#### Exercise 4

Modify the `HourlyEmployee` class from the previous exercise in such a way that the salary can be calculated for any data:

1. Add a **static** method named `computeEmployeePayment($hours, $salary, $seniority)` where:
 * `$hours` - number of hours worked
 * `$salary` - hourly salary
 * `$seniority` - seniority - `0` by default
2. Create an object named `HourlyEmployee` in the static method, passing id, name and surname as `null`, and hourly rate to the constructor
3. Using setter, set seniority on the object.
4. Call an appropriate method on the object that will calculate salary depending on the seniority.
5. **Return** the calculated salary from the **static** method.

Call the **static** method `computeEmployeePayment` several times and display the result to check if the calculations are correct.
Remember that static methods can be called directly on a class, without creating object instance.
