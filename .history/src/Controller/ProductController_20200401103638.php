<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/produits", name="showAllProducts")
     */
    public function showAllProducts(ProductRepository $repo)
    {
        $products = $repo->findAll();
        return $this->render('product/products.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route("/produit/{id}", name="show_product")
     */
    public function showProduct(Product $product)
    {
        return $this->render('product/showProduct.html.twig', [
            'product' => $product,
        ]);
    }
}
