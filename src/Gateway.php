<?php

namespace Omnipay\IfthenPay;

use Omnipay\Common\AbstractGateway;
use Omnipay\IfthenPay\Message\CompletePurchaseRequest;
use Omnipay\IfthenPay\Message\PurchaseRequest;

/**
 * IfthenPay
 *
 * @link http://www.ifthenpay.com
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Ifthenpay';
    }

    public function getDefaultParameters()
    {
        return array(
            'Entidade' => '',
            'Subentidade' => '',
            'Chave Anti-Pishing' => '',
            'Endereço de Callback' => ''
        );
    }

    public function getEntidade()
    {
        return $this->getParameter('Entidade');
    }

    public function setEntidade($value)
    {
        return $this->setParameter('Entidade', $value);
    }

    public function getSubentidade()
    {
        return $this->getParameter('Subentidade');
    }

    public function setSubentidade($value)
    {
        return $this->setParameter('Subentidade', $value);
    }

    public function getChaveAntiPishing()
    {
        return $this->getParameter('Chave Anti-Pishing');
    }

    public function setChaveAntiPishing($value)
    {
        return $this->setParameter('Chave Anti-Pishing', $value);
    }

    public function getEnderecoCallback()
    {
        return $this->getParameter('Endereço de Callback');
    }

    public function setEnderecoCallback($value)
    {
        return $this->setParameter('Endereço de Callback', $value);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\WorldPay\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\WorldPay\Message\CompletePurchaseRequest', $parameters);
    }
}
