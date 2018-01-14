<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Factory\GnomeDTOFactory;
use App\Repository\GnomeRepository;
use App\Validator\GnomeDTOValidator;
use App\Service\SaveGnomeService;
use App\DTO\GnomeDTO;

class GnomeController extends Controller
{
    /**
     * @Route("/api/gnome/create", name="gnome_create")
     * @Method("POST")
     */
    public function create(
        Request $request,
        GnomeDTOFactory $gnomeDTOFactory,
        GnomeDTOValidator $gnomeDTOValidator,
        SaveGnomeService $saveGnomeService
    ) {
        $gnomeDTO = $gnomeDTOFactory->setRequest($request)->createGnome();

        return $this->saveHelper($gnomeDTOValidator, $gnomeDTO, $saveGnomeService, 201);
    }

    /**
     * @Route("/api/gnome/update/{id}", name="gnome_update")
     * @Method("PUT")
     */
    public function update(
        Request $request,
        GnomeDTOFactory $gnomeDTOFactory,
        GnomeDTOValidator $gnomeDTOValidator,
        SaveGnomeService $saveGnomeService,
        $id
    ) {
        $gnomeDTOFactory->setRequest($request)->setId($id);
        $gnomeDTO = $gnomeDTOFactory->createGnome();

        return $this->saveHelper($gnomeDTOValidator, $gnomeDTO, $saveGnomeService, 200);
    }

    /**
     * @Route("/api/gnome/update/{id}", name="gnome_delete")
     * @Method("DELETE")
     */
    public function delete()
    {
        
    }

    /**
     * @Route("/api/gnome/read/{id}", name="gnome_read")
     * @Method("GET")
     */
    public function read(GnomeRepository $gnomeRepository)
    {
        $gnomeEntity = $gnomeRepository->find(1);

        $data = [
            'name' => $gnomeEntity->getName(),
            'strength' => $gnomeEntity->getStrength(),
            'age' => $gnomeEntity->getAge(),
        ];

        return new JsonResponse($data);
    }

    /**
     * Helper method to create and update
     * 
     * @param GnomeDTOValidator $gnomeDTOValidator
     * @param GnomeDTO          $gnomeDTO
     * @param SaveGnomeService  $saveGnomeService
     * @param int               $responseCode       http response code on success
     * @return JsonResponse
     */
    private function saveHelper(
        GnomeDTOValidator $gnomeDTOValidator,
        GnomeDTO $gnomeDTO,
        SaveGnomeService $saveGnomeService,
        $responseCode
    ) {
        $validResponse = $gnomeDTOValidator->isValid($gnomeDTO);
        if (!$validResponse->isValid()) {
            return new JsonResponse($validResponse->reason(), 422);
        }

        $saveGnomeService->save($gnomeDTO);

        return new JsonResponse(null, $responseCode);
    }
}
