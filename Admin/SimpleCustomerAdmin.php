<?php

namespace Softlogo\ShopBundle\Admin;

use Sonata\UserBundle\Admin\Model\UserAdmin as BaseUserAdmin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use FOS\UserBundle\Model\UserManagerInterface;


class SimpleCustomerAdmin extends BaseUserAdmin
{
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        // define group zoning
        $formMapper
            ->tab('User')
                ->with('Profile', array('class' => 'col-md-6'))->end()
                ->with('General', array('class' => 'col-md-6'))->end()
            ->end()
            ->tab('Security')
                ->with('Status', array('class' => 'col-md-4'))->end()
                ->with('Groups', array('class' => 'col-md-4'))->end()
                ->with('Keys', array('class' => 'col-md-4'))->end()
                ->with('Roles', array('class' => 'col-md-12'))->end()
            ->end()
        ;

        $now = new \DateTime();

        $formMapper
            ->tab('User')
                ->with('General')
                    ->add('username')
                    ->add('email')
                    ->add('plainPassword', 'text', array(
                        'required' => (!$this->getSubject() || is_null($this->getSubject()->getId()))
                    ))
                ->end()
                ->with('Profile')
					->add('firstname', null, array('required' => false))
                    ->add('lastname', null, array('required' => false))
                    ->add('phone', null, array('required' => false))
					->add('locale', 'locale', array('required' => false))
                ->end()
            ->end()
        ;

        if ($this->getSubject() && !$this->getSubject()->hasRole('ROLE_SUPER_ADMIN')) {
            $formMapper
                ->tab('Security')
                    ->with('Status')
                        ->add('locked', null, array('required' => false))
                        ->add('expired', null, array('required' => false))
                        ->add('enabled', null, array('required' => false))
                        ->add('credentialsExpired', null, array('required' => false))
                    ->end()
                    ->with('Groups')
                        ->add('groups', 'sonata_type_model', array(
                            'required' => false,
                            'expanded' => true,
                            'multiple' => true
                        ))
                    ->end()
                    ->with('Roles')
                        ->add('realRoles', 'sonata_security_roles', array(
                            'label'    => 'form.label_roles',
                            'expanded' => true,
                            'multiple' => true,
                            'required' => false
                        ))
                    ->end()
                ->end()
            ;
        }

        $formMapper
            ->tab('Security')
                ->with('Keys')
                    ->add('token', null, array('required' => false))
                    ->add('twoStepVerificationCode', null, array('required' => false))
                ->end()
            ->end()
        ;
    }

}
