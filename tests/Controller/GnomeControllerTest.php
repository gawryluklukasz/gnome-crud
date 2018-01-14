<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Enum\GnomeValidatorReason;
use App\Entity\Gnome;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
class GnomeControllerTest extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->em = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    /**
     * Test validation in create method
     */
    public function testValidationCreate()
    {
        $client = static::createClient();
        $data = ['name' => 'test', 'strength' => 'it is bug', 'age' => 122];
        $client->request('POST', '/api/gnome/create', $data, [], ['CONTENT_TYPE' => 'application/json']);

        $this->assertGreaterThan(400, $client->getResponse()->getStatusCode());
        
        /* @var $response \Symfony\Component\HttpFoundation\JsonResponse */
        $response = json_decode($client->getResponse()->getContent());
        
        $this->assertTrue(is_array($data));
        $this->assertEquals(count($response), 2);
        $this->assertNotFalse(array_search(GnomeValidatorReason::AgeToHigh, $response));
        $this->assertNotFalse(array_search(GnomeValidatorReason::StrengthMustBeInt, $response));
    }

    /**
     * Test create method
     */
    public function testCreate()
    {
        $client = static::createClient();
        $data = ['name' => 'test' . time(), 'strength' => rand(0, 100), 'age' => rand(0, 100)];
        $client->request('POST', '/api/gnome/create', $data, [], ['CONTENT_TYPE' => 'application/json']);

        $this->assertEquals(201, $client->getResponse()->getStatusCode());
    }

    /**
     * Test update method
     */
    public function testUpdate()
    {
        $gnome = $this->getLastGnome();

        $client = static::createClient();
        $data = ['name' => 'dataAfterUpdate' . time(), 'strength' => 51, 'age' => 15];
        $client->request('PUT', '/api/gnome/update/' . $gnome->getId(), $data, [], ['CONTENT_TYPE' => 'application/json']);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * Test read gnome
     */
    public function testRead()
    {
        $client = static::createClient();
        $client->request('GET', '/api/gnome/read/1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * @return Gnome
     */
    private function getLastGnome()
    {
        $gnomes = $this->em->getRepository(Gnome::class)
                ->findBy([], ['id' => 'DESC'], 1);
        return reset($gnomes);
    }
}
