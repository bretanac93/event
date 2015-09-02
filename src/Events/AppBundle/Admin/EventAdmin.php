<?php

namespace Events\AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class EventAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title')
            ->add('category')
            ->add('description')
            ->add('skills')
            ->add('date')
            ->add('time')
            ->add('price')
            ->add('capacity')
            ->add('shareCost')
            ->add('eventType')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('title')
            ->add('category')
            ->add('description')
            ->add('skills')
            ->add('date')
            ->add('time')
            ->add('price')
            ->add('capacity')
            ->add('shareCost')
            ->add('eventType')
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
        $formMapper
            ->add('title')
            ->add('category')
            ->add('description')
            ->add('skills')
            ->add('date' , 'datetime')
            ->add('time' , 'datetime')
            ->add('price')
            ->add('capacity')
            ->add('shareCost')
            ->add('eventType')
            ->add('uploader')
            ->add('isOrganizer')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('title')
            ->add('category')
            ->add('description')
            ->add('skills')
            ->add('date')
            ->add('time')
            ->add('price')
            ->add('capacity')
            ->add('shareCost')
            ->add('eventType')
        ;
    }
}
