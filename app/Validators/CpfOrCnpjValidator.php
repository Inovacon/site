<?php

namespace App\Validators;

class CpfOrCnpjValidator
{
    /**
     * @var CpfValidator
     */
    private $cpfValidator;
    /**
     * @var CnpjValidator
     */
    private $cnpjValidator;

    /**
     * @param CpfValidator $cpfValidator
     * @param CnpjValidator $cnpjValidator
     */
    public function __construct(CpfValidator $cpfValidator, CnpjValidator $cnpjValidator)
    {
        $this->cpfValidator = $cpfValidator;
        $this->cnpjValidator = $cnpjValidator;
    }

    /**
     * @param string $attribute
     * @param string|null $value
     * @return bool
     */
    public function validate($attribute, $value = null)
    {
        if (null === $value) {
            $value = $attribute;
        }

        return $this->cpfValidator->validate($value) || $this->cnpjValidator->validate($value);
    }
}
