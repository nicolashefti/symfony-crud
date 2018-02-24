<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductController
 * @package App\Controller
 */
class ProductController extends Controller
{
    /**
     * @Route("/product", name="product_list")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();


        return $this->render('product/index.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/product/new", name="product_create")
     * @param EntityManagerInterface $em
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(EntityManagerInterface $em, Request $request)
    {
        if ($request->getMethod() === 'POST') {
            $title = $request->request->get('title');
            $price = $request->request->get('price');
            $description = $request->request->get('description');

            $product = new Product();
            $product->setName($title)
                ->setPrice($price)
                ->setCreationDate(new \DateTime())
                ->setDescription($description);

            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product_list');
        }

        return $this->render('product/create.html.twig');
    }

    /**
     * @Route("/product/{productId}", name="product_show")
     * @param $productId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show($productId)
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($productId);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $productId
            );
        }

        return $this->render('product/show.html.twig', ['product' => $product]);
    }
}
