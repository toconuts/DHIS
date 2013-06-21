<?php

namespace DHIS\Bundle\SComDisBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DHIS\Bundle\CommonBundle\Entity\Document;

/**
 * @Route("/admin") 
 * 
 */
class ImportController extends AdminAppController
{
    /**
     * @Route("/import", name="scomdis_admin_import")
     * @Template
     */
    public function importAction(Request $request)
    {
        $form = $this->createFormBuilder()
                ->add('attachment', 'file')
                ->getForm()
        ;
        
        if ($request->getMethod() === 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $file = $form['attachment']->getData();
                
                $document = new Document();
                $document->setName($file->getClientOriginalName());
                $document->setFile($file);
                $user = $this->get('security.context')->getToken()->getUser();
                $document->setUser($user);
                
                $manager = $this->get('doctrine')->getEntityManager('common');
                $manager->persist($document);
                $manager->flush();
                
                // Import
                $service = $this->get('surveillance.dailly_tally_import_service');
                if ($service->import($document)) {
                    $message = $service->getImportedRecordsNumber().' Records were successfully imported.';
                    $warnings = $service->getLogWarn();
                    if (count($warnings) > 0)
                        $message = $message.'   Warnings: '.implode(', ', $warnings);
                    $request->getSession()->setFlash('success', $message);
                    return $this->redirect($this->generateUrl('scomdis_list'));
                } else {
                    $request->getSession()->setFlash('error', $service->getErrorMessage());
                    return $this->redirect($this->generateUrl('scomdis_admin_import'));
                }
            }
        }
        
        return array('form' => $form->createView());
    }
}
