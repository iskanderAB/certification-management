<?php

namespace App\Controller;

use App\Entity\SalaryCertificate;
use App\Form\SalaryCertificateType;
use App\Repository\SalaryCertificateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/salary/certificate")
 */
class SalaryCertificateController extends AbstractController
{
    /**
     * @Route("/", name="app_salary_certificate_index", methods={"GET"})
     */
    public function index(SalaryCertificateRepository $salaryCertificateRepository): Response
    {
        return $this->render('salary_certificate/index.html.twig', [
            'salary_certificates' => $salaryCertificateRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_salary_certificate_new", methods={"GET", "POST"})
     */
    public function new(Request $request, SalaryCertificateRepository $salaryCertificateRepository): Response
    {
        $salaryCertificate = new SalaryCertificate();
        $form = $this->createForm(SalaryCertificateType::class, $salaryCertificate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $salaryCertificateRepository->add($salaryCertificate);
            return $this->redirectToRoute('app_salary_certificate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('salary_certificate/new.html.twig', [
            'salary_certificate' => $salaryCertificate,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_salary_certificate_show", methods={"GET"})
     */
    public function show(SalaryCertificate $salaryCertificate): Response
    {
        return $this->render('salary_certificate/show.html.twig', [
            'salary_certificate' => $salaryCertificate,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_salary_certificate_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, SalaryCertificate $salaryCertificate, SalaryCertificateRepository $salaryCertificateRepository): Response
    {
        $form = $this->createForm(SalaryCertificateType::class, $salaryCertificate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $salaryCertificateRepository->add($salaryCertificate);
            return $this->redirectToRoute('app_salary_certificate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('salary_certificate/edit.html.twig', [
            'salary_certificate' => $salaryCertificate,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_salary_certificate_delete", methods={"POST"})
     */
    public function delete(Request $request, SalaryCertificate $salaryCertificate, SalaryCertificateRepository $salaryCertificateRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$salaryCertificate->getId(), $request->request->get('_token'))) {
            $salaryCertificateRepository->remove($salaryCertificate);
        }

        return $this->redirectToRoute('app_salary_certificate_index', [], Response::HTTP_SEE_OTHER);
    }
}
