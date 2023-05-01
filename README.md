# Sayena Communication Channel
Online communication channel based on PHP programming language for SayenaChat as open source

## Create Channel
### Step 1
To create an online communication channel for SayenaChat, all you need to do is copy the existing code in the Source folder and upload it to your hosting or online server. Once you have done this, you can configure the database settings to get it up and running.
- Download From **Github**
```shell
git clone https://github.com/SayenaChat/Channel
```
- Jump to `Sayena Channel`
```shell
cd Channel
```
- Copy all `.php` files from source to `public_html` directory in your server/hosting
```shell
cp Source/* /foo/bar/public_html
```
### Step 2
After downloading SayenaChat, open the config.php file and follow the instructions to connect it to your hosting. Here's how:

1. Open the `config.php` file in a text editor.
2. Locate the database settings section.
3. Enter the details of your MySQL database, including the **host**, **username**, **password**, and **database** name.
4. Save the changes to the config.php file.

Once you have completed these steps, **SayenaChat** should be connected to your MySQL database and ready to use.

- Edit secret constant
```html
class SayenaChannel
{
    public $secret = "9c6f25afa2a395ff561c23231cbb2d8e";
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $name = "sayena";
...
```
Edit value of `secret` constant; for example open `python3` and write:
```python
import hashlib
print (hashlib.md5("SayenaExample".encode()).hexdigest())
```
Copy **output** of this code and **paste** in **secret** constant:
```shell
$ python3
>>> import hashlib
>>> print (hashlib.md5("SayenaExample".encode()).hexdigest())
9c6f25afa2a395ff561c23231cbb2d8e
```
Copy `9c6f25afa2a395ff561c23231cbb2d8e` to value of `secret`:
```html
    public $secret = "9c6f25afa2a395ff561c23231cbb2d8e";
```
- Connect to DataBase
```html
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $name = "sayena";
```
For first time you should create a database with `sayena` name.
### Step 3
Create DataBase in **phpMyAdmin** width `sayena` name and import `DataBase/SayenaChat.sql` in this database

### Finish
After completing these steps, the SayenaChat online communication channel is ready to use, and you can share it with others.

## Show link of Channel
- **Browse `showlink.php`**:

After setting up channel open `showlink.php` in your `browser` and copy output
```text
https://say.na/c/sayenachat.com/?secret=9c6f25afa2a395ff561c23231cbb2d8e
```
- Copy the **output link** and share it for your friends