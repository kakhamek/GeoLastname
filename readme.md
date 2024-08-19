# GeoLastname

### This PHP class provides functionality to transform Georgian last names into their grammatical forms, including narrative, dative, and genitive cases.
### ქართული გვარების ბრუნვა (მოთხრობითი, მიცემითი და ნათესაობითი)

Requirements for GeoLastname Class:
* PHP Version: 7.0 or higher
* PHP mbstring extension for multi-byte string functions.

## ინსტალაცია
1. ჩამოტვირთეთ GeoLastname.php ფაილი.
2. ჩართეთ იგი თქვენს PHP სკრიპტში require_once("GeoLastname.php"); ფუნქციის გამოყენებით.

## გამოყენება
```php
// შექმენით GeoLastname კლასის ობიექტი
$output = new GeoLastname('მექვაბიშვილი');
```

## ხელმისაწვდომი  პარამეტრები
* MO - მოთხრობითი (მა) (მაგ: მექვაბიშვილმა, კეჟერაძემ, ჭყონიამ)
* MI - მიცემითი (ს) (მაგ: მექვაბიშვილს, კეჟერაძეს, ჭყონიას)
* NA - ნათესაობითი (ის) (მაგ: მექვაბიშვილის, კეჟერაძის, ჭყონიას)

მოთხრობითი ფორმა - (narrative) case
```php
echo $output->transform('MO');
// Output: მექვაბიშვილმა
```
მიცემითი ფორმა - (dative) case
```php
echo $output->transform('MI');
// Output: მექვაბიშვილს
```
ნათესაობითი ფორმა - (genitive) case
```php
echo $output->transform('NA');
// Output: მექვაბიშვილის
```
