<?php
namespace GDW\DecryptSystemField\Console\Command;

use Magento\Framework\Registry;
use Magento\Framework\App\Area;
use Magento\Framework\App\State;
use GDW\Core\Helper\Data as HelperData;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Magento\Framework\Encryption\EncryptorInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DecryptField extends Command
{
    protected $enc;
    protected $state;
    protected $registry;
    protected $helperData;
    protected $productRepository;
    protected $productCollectionFactory;


    public function __construct(
        State $state,
        Registry $registry,
        HelperData $helperData,
        EncryptorInterface $enc,
        $name = null
    ) {
        parent::__construct($name);
        $this->enc = $enc;
        $this->state = $state;
        $this->registry = $registry;
        $this->helperData = $helperData; 
    }

    protected function configure()
    {
       $commandoptions = [
            new InputOption('path', null, InputOption::VALUE_REQUIRED, 'path'),
            new InputOption('store_id', null, InputOption::VALUE_OPTIONAL, 'store_id')
        ];

       $this->setName('gdw:decrypt:field');
       $this->setDescription("decrypt a system.xml's field.");
       $this->setDefinition($commandoptions);    
       parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->registry->register('isSecureArea', true, true);

        try {
            $this->state->getAreaCode();
        }catch (\Exception $e) {
            $this->state->setAreaCode(Area::AREA_ADMINHTML);
        }
        $store = 0;
        $path = $input->getOption('path');
        $storeId = $input->getOption('store_id');

        if ($path){
            $store = $storeId;  
            if($storeId == null){
                $store = 0; $output->writeln('<fg=white>Remember to use --store_id={value} to get the field value of a specific store view.</>');
            }

            $field = $this->helperData->getConfigValue($path, $store);            
            
            if($field !== null){
                $decrypted = $this->enc->decrypt($field); 
                $hash = $this->enc->getHash($field);
                if($storeId !== null){
                    $output->writeln('<fg=white>Store Id: '.$storeId.'</>');
                }
                $output->writeln('<fg=blue>Field value Encrypt: '.$field.'</>');
                
                $output->writeln('<fg=yellow>Field value Decrypted: '.$decrypted.'</>');
            }else{
                $output->writeln("<fg=red>Don't found data of path {".$path."}.</>");   
            }
        }else{
            $output->writeln('<fg=red>Pattern is needed (--path).</>');
        }
        return 0; /* Prevent message deprecated */
    }
}