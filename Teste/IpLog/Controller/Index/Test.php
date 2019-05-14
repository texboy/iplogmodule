<?php
namespace Teste\IpLog\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $logger;
    

	public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Logger\Monolog $logger,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
	{
        $this->_pageFactory = $pageFactory;
        $this->logger = $logger;
		return parent::__construct($context);
	}

	public function execute()
	{
        
		function getRealIpAddr(){ //Fonte: http://itman.in/en/how-to-get-client-ip-address-in-php/
            if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
            {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
            }
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
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
        echo $date;
        $this->logger->debug($ip." ".$date);
	}
}
