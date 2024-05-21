<?php

declare(strict_types=1);

// Interface para definir o método Factory Method
interface Restaurant {
    public function createOrder(): Order;
}

// Classe de Pedido
class Order {
    private string $item;

    public function __construct(string $item) {
        $this->item = $item;
    }

    public function getItem(): string {
        return $this->item;
    }
}

// Implementação da interface para um restaurante de pizza
class PizzaRestaurant implements Restaurant {
    public function createOrder(): Order {
        return new Order("Pizza");
    }
}

// Implementação da interface para um restaurante de hambúrguer
class BurgerRestaurant implements Restaurant {
    public function createOrder(): Order {
        return new Order("Hamburger");
    }
}

// Classe cliente
class Customer {
    public function placeOrder(Restaurant $restaurant) {
        $order = $restaurant->createOrder();
        echo "Pedido realizado: " . $order->getItem() . "\n";
    }
}

// Uso
$customer = new Customer();

// Pedido em um restaurante de pizza
$pizzaRestaurant = new PizzaRestaurant();
$customer->placeOrder($pizzaRestaurant);

// Pedido em um restaurante de hambúrguer
$burgerRestaurant = new BurgerRestaurant();
$customer->placeOrder($burgerRestaurant);
