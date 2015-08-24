<?php

namespace Softlogo\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BasketType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('phone')
            ->add('email')
            ->add('company')
            ->add('nip')
            ->add('regon')
            ->add('isAccount')
            ->add('isInvoice')
            ->add('status')
            ->add('paid')
			->add('basketItems', 'collection', array(
				'type' => new BasketItemType(), 
				'by_reference' => false,
				'allow_delete' => true,
				'allow_add'    => true,
			))
			->add('addresses', 'collection', array(
				'type' => new \Softlogo\ShopBundle\Form\AddressType(), 
				'by_reference' => false,
				'allow_delete' => true,
				'allow_add'    => true,
			))

			->add('password', 'repeated', array(
				'type' => 'password',
				'invalid_message' => 'The password fields must match.',
				'options' => array('attr' => array('class' => 'password-field')),
				'required' => false,
				'first_options'  => array('label' => 'Password'),
				'second_options' => array('label' => 'Repeat Password'),
			))


            ->add('message', 'textarea', array('label'=>'Dodatowe informacje', 'required'=>false))
			->add('submit', 'submit', array(
				'label' => 'Zaktualizuj koszyk'
			))
			->add('submit2', 'submit', array(
				'label' => 'Przejdź do zamówienia',
				'attr' => array('class' => 'btn-red')
			))
			->add('submit3', 'submit', array(
				'label' => 'Złóż zamówienie',
				'attr' => array('class' => 'btn-red')
			))
            ->add('shippingMethod', 'choice', array(
                'choices'   => array('kurier' => 'Kurier', 'odbior_osobisty' => 'Odbiór Osobisty'),
                'required'  => true,
                'multiple'  => false,           
                'expanded'  => true,            
                'label'  => 'Sposób dostawy',            
            ))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Softlogo\ShopBundle\Entity\Basket'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'softlogo_shopbundle_basket';
    }
}
