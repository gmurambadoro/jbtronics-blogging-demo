<?php

namespace App\Controller;

use App\Settings\GlobalSettings;
use App\Settings\PaginationSettings;
use Jbtronics\SettingsBundle\Form\SettingsFormFactoryInterface;
use Jbtronics\SettingsBundle\Manager\SettingsManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/settings', name: 'app_settings_')]
final class SettingsController extends AbstractController
{
    function __construct(private readonly SettingsManagerInterface $settingsManager, private readonly SettingsFormFactoryInterface $settingsFormFactory)
    {
    }

    #[Route('/global', name: 'global', methods: ['GET', 'POST'])]
    public function globalSettings(Request $request): Response
    {
        //Create a temporary copy of the settings object
        $clone = $this->settingsManager->createTemporaryCopy(GlobalSettings::class);

        //Create a builder for the settings form
        $builder = $this->settingsFormFactory->createSettingsFormBuilder($clone);

        //Add a submit button, so we can save the form
        $builder->add('submit', SubmitType::class);

        //Create the form
        $form = $builder->getForm();

        //Handle the form submission
        $form->handleRequest($request);

        //If the form was submitted and the data is valid, then it
        if ($form->isSubmitted() && $form->isValid()) {
            //Merge the clone containing the modified data back into the managed instance
            $this->settingsManager->mergeTemporaryCopy($clone);

            //Save the settings
            $this->settingsManager->save();
        }

        return $this->render('settings/global.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/pagination', name: 'pagination', methods: ['GET', 'POST'])]
    public function paginationSettings(Request $request): Response
    {
        //Create a temporary copy of the settings object
        $clone = $this->settingsManager->createTemporaryCopy(PaginationSettings::class);

        //Create a builder for the settings form
        $builder = $this->settingsFormFactory->createSettingsFormBuilder($clone);

        //Add a submit button, so we can save the form
        $builder->add('submit', SubmitType::class);

        //Create the form
        $form = $builder->getForm();

        //Handle the form submission
        $form->handleRequest($request);

        //If the form was submitted and the data is valid, then it
        if ($form->isSubmitted() && $form->isValid()) {
            //Merge the clone containing the modified data back into the managed instance
            $this->settingsManager->mergeTemporaryCopy($clone);

            //Save the settings
            $this->settingsManager->save();

            return $this->redirectToRoute('app_default');
        }

        return $this->render('settings/pagination.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
