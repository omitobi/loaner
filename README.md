#Loaner

Create a `cred.php` file and add at least `getCredential()` function. An example is below

```php

/**
 * @return mixed - array of 'username' and 'password'
 */
function getCredential () {
    $credential['username'] = '...'; //database username
    $credential['password'] = getPassword();

    return $credential;
}

function getPassword () {
    return '....'; // database password
}

``` 