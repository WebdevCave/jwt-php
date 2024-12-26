# JWT

[![codecov](https://codecov.io/gh/WebdevCave/jwt-php/graph/badge.svg?token=U0OXfWrDJl)](https://codecov.io/gh/WebdevCave/jwt-php)
[![Latest Stable Version](https://poser.pugx.org/webdevcave/jwt/v/stable?format=flat-square)](https://packagist.org/packages/webdevcave/jwt)
[![Latest Unstable Version](https://poser.pugx.org/webdevcave/jwt/v/unstable?format=flat-square)](https://packagist.org/packages/webdevcave/jwt)
[![Total Downloads](https://poser.pugx.org/webdevcave/jwt/downloads?format=flat-square)](https://packagist.org/packages/webdevcave/jwt)
[![License](https://poser.pugx.org/webdevcave/jwt/license?format=flat-square)](https://packagist.org/packages/webdevcave/jwt)
[![StyleCI](https://github.styleci.io/repos/827326764/shield?branch=main)](https://github.styleci.io/repos/827326764?branch=main)

<div style="text-align: center">
<a href="https://jwt.io/" target="_blank">
<img src="https://jwt.io/img/logo-asset.svg">
</a>
</div>

## How to install

```
composer require webdevcave/jwt
```

## Provided signers

<table>
    <tr>
        <th>Algorithm</th>
        <th>Version</th>
    </tr>
    <tr>
        <td>HS256</td>
        <td>1.0</td>
    </tr>
    <tr>
        <td>HS384</td>
        <td>1.0</td>
    </tr>
    <tr>
        <td>HS512</td>
        <td>1.0</td>
    </tr>
    <tr>
        <td>RS256</td>
        <td>1.1</td>
    </tr>
    <tr>
        <td>RS384</td>
        <td>1.1</td>
    </tr>
    <tr>
        <td>RS512</td>
        <td>1.1</td>
    </tr>
</table>

## Provided claim validators
<table>
    <tr>
        <th>Claim</th>
        <th>Version</th>
        <th>Description</th>
        <th>RFC</th>
    </tr>
    <tr>
        <td>aud</td>
        <td>1.1</td>
        <td>Audience</td>
        <td>https://datatracker.ietf.org/doc/html/rfc7519#section-4.1.3</td>
    </tr>
    <tr>
        <td>exp</td>
        <td>1.0</td>
        <td>Expiration time (timestamp)</td>
        <td>https://datatracker.ietf.org/doc/html/rfc7519#section-4.1.4</td>
    </tr>
    <tr>
        <td>iss</td>
        <td>1.1</td>
        <td>Issuer</td>
        <td>https://datatracker.ietf.org/doc/html/rfc7519#section-4.1.1</td>
    </tr>
    <tr>
        <td>nbf</td>
        <td>1.0</td>
        <td>Not before (timestamp)</td>
        <td>https://datatracker.ietf.org/doc/html/rfc7519#section-4.1.5</td>
    </tr>
    <tr>
        <td>sub</td>
        <td>1.1</td>
        <td>Subject</td>
        <td>https://datatracker.ietf.org/doc/html/rfc7519#section-4.1.2</td>
    </tr>
</table>


- "typ" claim is defined as JWT by default.
- "iat" and "nbf" claims are starts with the current timestamp by default.
- "jti" validator isn't provided but it can be implemented by your application as presented in "Validating your private 
claims" section

## Basic Usage

### Generating a token

```php
<?php

use Webdevcave\Jwt\Token;
use Webdevcave\Jwt\SignerFactory;
use \Webdevcave\Jwt\Secrets\HsSecret;

$secret = new HsSecret('your_secret_here');
$token = Token::create()
    ->withSigner(SignerFactory::build('HS256')) //HS256 signer is provided by default. This could be omitted
    ->with('exp', strtotime('+ 1 hour')) //Expires in one hour
    ->sign($secret)
    ->toString();
```

### Validating and reading values from a token
```php
<?php

use Webdevcave\Jwt\Token;

$token = Token::fromString('xxxx.yyyyy.zzzzz');
$isValid = $token->validate($secret);

if ($isValid) {
    $payload = $token->getPayload();
    $headers = $token->getHeaders();
}
```

### RSA Tokens:

First of all, you will need a public/private key pair. If you don't have one, you can generate it easily at the 
following page: https://cryptotools.net/rsagen

With your public/private key pair in hand, the process will be similar to the hmac tokens in the above example:

```php
<?php

use Webdevcave\Jwt\Token;
use Webdevcave\Jwt\SignerFactory;
use \Webdevcave\Jwt\Secrets\RsSecret;

$secret = new RsSecret('private_key', 'public_key');

//Generate a token string
$tokenString = Token::create()
    ->withSigner(SignerFactory::build('RS256'))
    ->with('exp', strtotime('+ 1 hour')) //Expires in one hour
    ->sign($secret)
    ->toString();

//Validating...
$token = Token::fromString($tokenString);
if ($token->validate($secret)) {
    //token is valid...
    $creationDate = date(DATE_RFC3339, $token->getPayload('iat'));
    $expirationDate = date(DATE_RFC3339, $token->getPayload('exp'));
    
    echo "Your token was created at $creationDate.";
    echo "It will expire at $expirationDate.";
}
```

### Validating your private claims

First you have to create your validator

```php
use \Webdevcave\Jwt\Validator\Validator;

class MyClaimValidator extends Validator {
    /**
     * @return string
     */
    public function validates() : string
    {
        return 'my-claim'; //this will validate value inside 'my-claim', when set
    }
    
    /**
     * @param mixed $value
     * @return bool
     */
    public function validate(mixed $value) : bool
    {
        // this claim must contain value 'a', 'b' or 'c'
        $valid = in_array($value, ['a', 'b', 'c']);
        
        return $valid;
    }
}
```

Then all you have to do is assign your validator before running *validate()* method
```php
<?php

use Webdevcave\Jwt\Token;

$token = Token::fromString('xxxx.yyyyy.zzzzz')
            ->assignValidator(new MyClaimValidator());

$isValid = $token->validate($mySecret);

if ($isValid) {
    $myClaim = $token->getPayload('my-claim');
}
```

## Shortcuts

You can get an Token instance directly from the Authorization header or through a query parameter with the following 
methods:

```php

use Webdevcave\Jwt\Token;

//Load from authorization bearer
$token1 = Token::fromAuthorizationBearer();

//Load from get parameters
$token2 = Token::fromQueryString('token');
$token3 = Token::fromQueryString('token2');
```

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements,
please open an issue or a pull request on GitHub.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Credits

Original project can be found [here](https://github.com/corviz/jwt)
