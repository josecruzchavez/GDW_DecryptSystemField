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

class DecryptValue extends Command
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
            new InputOption('value', null, InputOption::VALUE_REQUIRED, 'value')
        ];

       $this->setName('gdw:decrypt:value');
       $this->setDescription("decrypt a string.");
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

        $value = $input->getOption('value');

        if ($value){
                $decrypted = $this->enc->decrypt($value); 
                $output->writeln('<fg=blue>Value: '.$value.'</>');
                $output->writeln('<fg=yellow>Value Decrypted: '.$decrypted.'</>');
        }else{
            $output->writeln('<fg=red>Pattern is needed (--value).</>');
        }
        return 0; /* Prevent message deprecated */
    }
}