<?php

namespace Softlogo\ShopBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class BasketAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('status')
            ->add('paid')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('createdAt')
            ->add('subTotal')
            ->add('total')

            ->add('firstname')
            ->add('lastname')
            ->add('paid')
            ->add('_action', 'actions', array(
                'actions' => array(
                    //'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
			->tab('General')
                ->with('Order', array('class' => 'col-md-12'))->end()
            ->end()

            ->tab('Customer')
                ->with('Profile', array('class' => 'col-md-6'))->end()
                ->with('Company', array('class' => 'col-md-6'))->end()
            ->end()
			->tab('Addresses')
				->with('Addresses', array('class' => 'col-md-6'))->end()
			->end()
            ;


        $formMapper
            ->tab('General')
				->with('Order')
					->add('subTotal')
                    ->add('shippingCost')
					->add('total')
					->add('basketItems', 'sonata_type_collection', array('label' => 'Produkty', 'required' => false, 'by_reference' => false), array('edit' => 'inline','inline' => 'table'))
                ->end()
            ->end()

            ->tab('Customer')
				->with('Profile')
					->add('firstname', null, array('required' => false))
                    ->add('lastname', null, array('required' => false))
                    ->add('phone', null, array('required' => false))
                    ->add('email', null, array('required' => false))
                ->end()
                ->with('Company')
					->add('company', null, array('required' => false))
                    ->add('nip', null, array('required' => false))
                    ->add('regon', null, array('required' => false))
                ->end()
            ->end()
			->tab('Addresses')
				->with('Addresses')
					->add('addresses', 'sonata_type_collection', array('label' => 'Address', 'required' => false, 'by_reference' => false), array('edit' => 'inline','inline' => 'standard'))
				->end()
			->end()


        ;



    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('status')
            ->add('paid')
            ->add('customer')
            ->add('basketItems')
        ;
    }
}
