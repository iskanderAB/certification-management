<?php

namespace App\Controller;

use App\Entity\WorkCertificate;
use App\Entity\Worker;
use App\Form\CertifType;
use App\Form\WorkCertificateType;
use App\Repository\WorkCertificateRepository;
use App\Repository\WorkerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @Route("/workcertificate")
 */
class WorkCertificateController extends AbstractController
{
    /**
     * @Route("/", name="app_work_certificate_index", methods={"GET"})
     */
    public function index(WorkCertificateRepository $workCertificateRepository, ManagerRegistry $doctrine): Response
    {
        return $this->render('work_certificate/index.html.twig', [
            'work_certificates' => $workCertificateRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_work_certificate_new", methods={"GET", "POST"})
     */
    public function new(Request $request, WorkCertificateRepository $workCertificateRepository,ManagerRegistry $doctrine,WorkerRepository $workerRepository): Response
    {
        $entityManager = $doctrine->getManager();
        $workCertificate = new WorkCertificate();
        $worker = new Worker();
        $form = $this->createForm(CertifType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $workCertificate->setCreatedAt(new \DateTime());
            $workCertificate->setCreatedBy($this->getUser());
            $workCertificate->setChef($form['chef']->getData());
            if ($workerRepository->findBy(["ref"=>$form['reference']->getData()]) == null){
                $worker->setFirstname($form['firstname']->getData());
                $worker->setLastname($form['lastname']->getData());
                $worker->setRef($form['reference']->getData());
                $worker->setGender($form['gender']->getData());
                $worker->setType($form['type']->getData());
                $entityManager->persist($worker);
            }
            else{
                $worker = $workerRepository->findBy(["ref"=>$form['reference']->getData()])[0];
            }
            $workCertificate->setWorker($worker); // add worker object 
            $workCertificateRepository->add($workCertificate);
            return $this->redirectToRoute('app_work_certificate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('work_certificate/new.html.twig', [
            'work_certificate' => $workCertificate,
            'workers' => $workerRepository->findAll(),
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_work_certificate_show", methods={"GET"})
     */
    public function show(WorkCertificate $workCertificate): Response
    {
        return $this->render('work_certificate/show.html.twig', [
            'work_certificate' => $workCertificate,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_work_certificate_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, WorkCertificate $workCertificate, WorkCertificateRepository $workCertificateRepository): Response
    {
        $form = $this->createForm(WorkCertificateType::class, $workCertificate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $workCertificateRepository->add($workCertificate);
            return $this->redirectToRoute('app_work_certificate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('work_certificate/edit.html.twig', [
            'work_certificate' => $workCertificate,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_work_certificate_delete", methods={"POST"})
     */
    public function delete(Request $request, WorkCertificate $workCertificate, WorkCertificateRepository $workCertificateRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$workCertificate->getId(), $request->request->get('_token'))) {
            $workCertificateRepository->remove($workCertificate);
        }

        return $this->redirectToRoute('app_work_certificate_index', [], Response::HTTP_SEE_OTHER);
    }
}
