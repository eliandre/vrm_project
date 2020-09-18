<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class BookingIndex extends AbstractController
{
    /**
     * @Route("/create_booking")
     */
    public function create_booking()
    {
        $form = $this->createFormBuilder()
            ->add('firstName', TextType::class, [
                'required' => true
            ])
            ->add('lastName', TextType::class, [
                'required' => true
            ])
            ->add('phone', TextType::class, [
                'required' => true
            ])
            ->add('email', TextType::class, [
                'required' => false
            ])
            ->add('birthday', DateType::class, [
                'required' => true,
                'widget' => 'single_text'
            ])
            ->add('startDate', DateType::class, [
                'required' => true,
                'widget' => 'single_text'
            ])
            ->add('endDate', DateType::class, [
                'required' => true,
                'widget' => 'single_text'
            ])
            ->add('arrivalTime', TimeType::class, [
                'required' => true,
                'widget' => 'single_text'
            ])
            ->add('nrOfPeople', IntegerType::class, [
                'required' => true
            ])
            ->add('payingMethod', ChoiceType::class, [
                'choices' => [
                    'cash' => 'cash',
                    'transfer' => 'transfer'
                ],
                'required' => true
            ])
            ->add('additionalInformation', TextareaType::class, [
                'required' => false
            ])
            ->add('submit', SubmitType::class, ['label' => 'Create Booking'])
            ->getForm();

        return $this->render('bookings/create_booking.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/bookings")
     */
    public function bookings()
    {
        return $this->render('bookings/bookings.html.twig');
    }
}