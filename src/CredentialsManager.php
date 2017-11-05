<?php


namespace ddlzz\AmoAPI;

use ddlzz\AmoAPI\Validators\CredentialsValidator;


/**
 * Class CredentialsManager. It stores and validates user credentials.
 * @package ddlzz\AmoAPI
 * @author ddlzz
 */
class CredentialsManager
{
    /** @var CredentialsValidator */
    private $validator;

    /** @var string */
    private $subdomain;

    /** @var string */
    private $login;

    /** @var string */
    private $hash;

    /**
     * CredentialsManager constructor.
     * @param string $domain
     * @param string $login
     * @param string $hash
     */
    public function __construct($domain, $login, $hash)
    {
        $this->validator = new CredentialsValidator(); // Composition

        $this->subdomain = $this->validator->validateSubdomain($domain);
        $this->login = $this->validator->validateLogin($login);
        $this->hash = $this->validator->validateHash($hash);
    }

    /**
     * @return string
     */
    public function getSubdomain()
    {
        return $this->subdomain;
    }

    /**
     * @return array
     */
    public function getCredentials()
    {
        return [
            'USER_LOGIN' => $this->login,
            'USER_HASH' => $this->hash,
        ];
    }
}