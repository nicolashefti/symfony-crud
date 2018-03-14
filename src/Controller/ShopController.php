<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Shop;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends Controller
{
    /**
     * @Route("/shop", name="shop")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Shop::class);
        $shops = $repository->findAll();

        return $this->render('shop/index.html.twig', [
            'shops' => $shops,
        ]);
    }

    /**
     * @Route("/shop/new", name="shop_new")
     * @param EntityManagerInterface $em
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(EntityManagerInterface $em)
    {
        $ShopRepository = $this->getDoctrine()->getRepository(Shop::class);
        $aShop = $ShopRepository->find(1);

        $newProduct = new Product();
        $newProduct
            ->setName("Test " . rand())
            ->setDescription('Et voici et voilà')
            ->setPrice(42)
            ->setCreationDate(new \DateTime());

        $em->persist($newProduct);
        $em->flush($newProduct);

        return $this->render('shop/create.html.twig');
    }
}
