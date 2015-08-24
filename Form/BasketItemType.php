<?php

namespace Softlogo\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BasketItemType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('quantity' , 'text', array(
			            'label' => 'Sztuk'))
            //->add('description')
			->add('submit', 'submit', array(
				'label' => 'Dodaj do koszyka',
				'attr' => array('class' => 'btn-red')
			))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Softlogo\ShopBundle\Entity\BasketItem'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'softlogo_shopbundle_basketitem';
    }
}
