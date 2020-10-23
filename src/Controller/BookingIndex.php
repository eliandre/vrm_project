<?php


namespace App\Controller;

use App\Entity\Bookings;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
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

use Doctrine\ORM\EntityManagerInterface;

class BookingIndex extends AbstractController
{
    /**
     * @Route("/", name="create_booking")
     */
    public function create_booking(Request $request)
    {
        $this->generateUrl('create_booking');
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
                'required' => false,
                'empty_data' => 'no addidional information'
            ])
            ->add('submit', SubmitType::class, ['label' => 'Create Booking'])
            ->getForm();

        if($request -> isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));
            if($form->isSubmitted() && $form->isvalid()) {
                $data = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();

                $bookings = new Bookings();

                $bookings->setFirstName($data['firstName']);
                $bookings->setLastName($data['lastName']);
                $bookings->setPhone($data['phone']);
                $bookings->setEmail($data['email']);
                $bookings->setBirthday(new \DateTime($data['birthday']->format('Y-m-d')));
                $bookings->setStartDate(new \DateTime($data['startDate']->format('Y-m-d')));
                $bookings->setEndDate(new \DateTime($data['endDate']->format('Y-m-d')));
                $bookings->setArrivalTime(new \DateTime($data['arrivalTime']->format('H:i:s')));
                $bookings->setnrOfPeople($data['nrOfPeople']);
                $bookings->setPayingMethod($data['payingMethod']);
                $bookings->setAdditionalInformation($data['additionalInformation']);

                $entityManager->persist($bookings);

                $entityManager->flush();

                return $this->redirectToRoute('bookings');
            }
        }

        return $this->render('bookings/create_booking.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/bookings", name="bookings")
     */
    public function bookings()
    {
        $this->generateUrl('bookings');
        $repository = $this->getDoctrine()->getRepository(Bookings::class);
        $bookings = $repository->findAll();
        return $this->render('bookings/list.html.twig', ['bookings' => $bookings]);
    }
}