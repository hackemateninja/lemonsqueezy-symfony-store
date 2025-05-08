<?php

namespace App\Controller;

use App\Entity\Product;
use App\Store\ShoppingCart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OrderController extends AbstractController
{
	#[Route('/cart', name: 'app_order_cart')]
	public function cart(ShoppingCart $cart): Response
	{
		return $this->render('order/cart.html.twig', [
			'cart' => $cart,
		]);
	}

	#[Route('/cart/product/{slug:product}/add', name: 'app_cart_product_add', methods: ['POST'])]
	public function addProductToCart(Request $request, Product $product, ShoppingCart $cart): Response
	{
		$quantity = $request->request->getInt('quantity', 1);
		$quantity = $quantity > 0 ? $quantity : 1;
		$cart->addProduct($product, $quantity);

		$this->addFlash('success', 'Yummy lemonade has been added to your cart!');

		return $this->redirectToRoute('app_order_cart');
	}

	#[Route('/cart/product/{slug:product}/delete', name: 'app_cart_product_delete', methods: ['POST'])]
	public function deleteProductFromCart(Product $product, ShoppingCart $cart): Response
	{
		$cart->deleteProduct($product);

		$this->addFlash('success', 'Yummy lemonade has been deleted from your cart! Too sour?');

		return $this->redirectToRoute('app_order_cart');
	}

	#[Route('/cart/clear', name: 'app_cart_clear', methods: ['POST'])]
	public function clearCart(ShoppingCart $cart): Response
	{
		$cart->clear();

		$this->addFlash('success', 'Cart cleared!');

		return $this->redirectToRoute('app_order_cart');
	}
}
