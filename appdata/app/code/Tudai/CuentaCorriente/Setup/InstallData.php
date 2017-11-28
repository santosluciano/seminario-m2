<?php

namespace Tudai\CuentaCorriente\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Entity\Attribute\Set as AttributeSet;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;

class InstallData implements InstallDataInterface
{
    protected $customerSetupFactory;
    private $attributeSetFactory;

    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }
       
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
        $customerEntity = $customerSetup->getEavConfig()->getEntityType(Customer::ENTITY);
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();

        $attributeSet = $this->attributeSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);

        $customerSetup->addAttribute(Customer::ENTITY, 'enable_customer_credit', [
            'type' => 'int', //tipo del atributo
            'label' => 'Enable Customer Credit', //etiqueta
            'input' => 'boolean', //tipo del input del atributo que voy a ver
            'required' => false, //si es requerido
            'visible' => true, //si va a estar disponible
            'user_defined' => true, //se pone true para poder modificarlo por consola, significa que lo hice yo
            'position' => 210, //posicion en el form
            'system' => 0 //siempre es igual
        ]);

        $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'enable_customer_credit')
        ->addData([
            'attribute_set_id'   => $attributeSetId,
            'attribute_group_id' => $attributeGroupId,
            'used_in_forms'      => ['adminhtml_customer'],//you can use other forms also ['adminhtml_customer_address', 'customer_address_edit', 'customer_register_address']
        ]);
        
        $attribute->save();          
    
    }
}