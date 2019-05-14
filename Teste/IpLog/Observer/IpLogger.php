<?php
namespace Teste\IpLog\Observer;

use Magento\Framework\Event\ObserverInterface;

class IpLogger implements ObserverInterface
{
    protected $logger;
    

	public function __construct(\Magento\Framework\Logger\Monolog $logger){
         //Monolog é responsável por realizar a adição de entradas nos logs do framework.       
         $this->logger = $logger;
	}

	public function execute(\Magento\Framework\Event\Observer $observer)
	{
                //Esta função é utilizada para recuperar o IP do cliente.
                function getRealIpAddr(){ //Fonte: http://itman.in/en/how-to-get-client-ip-address-in-php/
                        if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
                        {
                        $ip=$_SERVER['HTTP_CLIENT_IP'];
                        }
                        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
                        {
                        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
                        }
                        else
                        {
                        $ip=$_SERVER['REMOTE_ADDR'];
                        }
                        return $ip;
                }

                $ip = getRealIpAddr();

                $date = date('m/d/Y h:i:s a', time()); 

                //Adicionando a data e o ip no Debug Log.
                $this->logger->debug($ip." ".$date);
	}
}
