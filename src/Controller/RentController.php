<?php

namespace App\Controller;

use App\Entity\Rent;
use App\Form\Rent1Type;
use App\Repository\RentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


#[Route('/rent')]
final class RentController extends AbstractController
{
    #[Route(name: 'app_rent_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager, RentRepository $rentRepository): Response
    {
//        $rents = $rentRepository->findOneBy(['id' => 5]);
//        $entityManager->remove($rents);
//        $entityManager->flush();


        $rents = (new Rent())
            ->setStatus('active')
            ->setCostTotal(300)
            ->setDriverId(2)
            ->setVehicleId(2);

        $entityManager->persist($rents);
        $entityManager->flush();
        return $this->render('rent/index.html.twig', [
            'rents' => $rentRepository->findAll(),
        ]);



    }

    #[Route('/new', name: 'app_rent_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rent = new Rent();
        $form = $this->createForm(Rent1Type::class, $rent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($rent);
            $entityManager->flush();

            return $this->redirectToRoute('app_rent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('rent/new.html.twig', [
            'rent' => $rent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rent_show', methods: ['GET'])]
    public function show(Rent $rent): Response
    {
        return $this->render('rent/show.html.twig', [
            'rent' => $rent,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_rent_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Rent $rent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Rent1Type::class, $rent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_rent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('rent/edit.html.twig', [
            'rent' => $rent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rent_delete', methods: ['POST'])]
    public function delete(Request $request, Rent $rent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $rent->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($rent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_rent_index', [], Response::HTTP_SEE_OTHER);
    }

}
