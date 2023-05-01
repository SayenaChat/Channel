import hashlib
import subprocess

print("SayenaChat Channel Installer")
print("(c) 2023 Sayena Team, Free Software MIT License")
print("Sayena v0.1-alpha\n")

htdocs = "/opt/lampp/htdocs"

htdocs_ = input("Choose your htdocs location? [/opt/lampp/htdocs]: ")
if not htdocs_ == '':
    htdocs = htdocs_

hostname = "localhost"
username = "root"
password = ""
database = "sayena"

secret = hashlib.sha3_512(input("Enter your secret key name []: ").encode()).hexdigest()
hostname_ = input("MySQL Hostname [localhost]: ")
username_ = input("MySQL Username [root]: ")
password_ = input("MySQL Password []: ")
database_ = input("MySQL Database [sayena]: ")

if not hostname_ == '':
    hostname = hostname_

if not username_ == '':
    username = username_

if not password_ == '':
    password = password_

if not database_ == '':
    database = database_

print("Copying ...")
subprocess.call(f"mkdir -pv {htdocs}", shell=True)
subprocess.call(f"cp -rv Source/*.php {htdocs}", shell=True)

print("Installing ...")
f = open(f"{htdocs}/config.php", "r")
readit = f.read() \
    .replace('$host = "localhost";', f'$host = "{hostname}";') \
    .replace('$user = "root";', f'$user = "{username}";') \
    .replace('$pass = "";', f'$pass = "{password}";') \
    .replace('$name = "sayena";', f'$name = "{database}";') \
    .replace('$secret = "45375192bebd6cfeea1d613966700a1b";', f'$secret = "{secret}";')
f.close()

f = open(f"{htdocs}/config.php", "w")
f.write(readit)
f.close()

print("Finish Install")