<?php

namespace Softlogo\ShopBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class BasketItemAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('productCode')
            ->add('price')
            ->add('quantity')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
			//->add('product.firstProductMedia.media', 'sonata_type_model_list', array('template' => 'SoftlogoShopBundle:Admin:list-image.html.twig'), array('link_parameters' => array('context' => 'Foto')))
            ->add('productCode')
            ->add('price')
            ->add('quantity')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
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
		$nested = is_numeric($formMapper->getFormBuilder()->getForm()->getName());
        $formMapper
            ->add('productCode')
            ->add('price')
            ->add('quantity')
            ->add('product')
        ;
		if(!$nested){
        $formMapper
            ->add('itemorder')
            ->add('description');
		}
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('productCode')
            ->add('price')
            ->add('quantity')
            ->add('description')
        ;
    }
}
