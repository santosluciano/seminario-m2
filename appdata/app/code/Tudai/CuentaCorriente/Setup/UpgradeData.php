<?php

namespace Tudai\CuentaCorriente\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
<<<<<<< HEAD
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Customer\Model\Customer;

=======
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Customer\Model\Customer;


>>>>>>> clase_4_completo
/**
 * Upgrade Data script
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{
<<<<<<< HEAD
    protected $customerSetupFactory;
    private $attributeSetFactory;

    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
=======
    /**
     * @var CustomerSetupFactory
     */
    protected $customerSetupFactory;
    /**
     * @var AttributeSetFactory
     */
    private $attributeSetFactory;

    /**
     * Init
     *
     * @param CategorySetupFactory $categorySetupFactory
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory
    )
    {
>>>>>>> clase_4_completo
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if ($context->getVersion()
<<<<<<< HEAD
            && version_compare($context->getVersion(), '1.1.0') < 0
        ) {
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
}
=======
            && version_compare($context->getVersion(), '1.1.1') < 0
        ) {
            /**
             * @var CustomerSetup $customerSetup
             */
            $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
            $customerEntity = $customerSetup->getEavConfig()->getEntityType(Customer::ENTITY);
            $attributeSetId = $customerEntity->getDefaultAttributeSetId();

            /**
             * @var $attributeSet AttributeSet
             */
            $attributeSet = $this->attributeSetFactory->create();
            $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);

            $customerSetup->addAttribute(Customer::ENTITY, 'enable_customer_credit', [
                'type'         => 'int',
                'label'        => 'Enable Customer Credit',
                'input'        => 'boolean',
                'required'     => false,
                'visible'      => true,
                'user_defined' => true,
                'position'     => 210,
                'system'       => 0
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
}
>>>>>>> clase_4_completo
