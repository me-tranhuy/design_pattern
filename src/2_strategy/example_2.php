<?php

// Apply strategy pattern in Payment Method

// Init interface Payment strategy
interface PaymentStrategy {

    public function pay(int $amount);
}

// Payment via Paypal
class PaypalStrategy implements PaymentStrategy {
    
    private $email;
	private $password;

	public function initPaypal(string $email, string $pwd) {
		$this->email = $email;
		$this->password = $pwd;
	}

	public function pay(int $amount) {
		echo $amount . "$ paid using Paypal with email " . $this->email;
	}
}

// Payment with Credit Card
class CreditCardStrategy implements PaymentStrategy {

	private $name;
	private $cardNumber;
	private $cvv;
	private $dateOfExpiry;

	public function initCreditCard(string $nm, string $ccNum, string $cvv, string $expiryDate) {
		$this->name         = $nm;
		$this->cardNumber   = $ccNum;
		$this->cvv          = $cvv;
        $this->dateOfExpiry = $expiryDate;
	}

	public function pay(int $amount) {
        echo $amount . "$ paid with credit/debit card name " . $this->name;
		
	}

}

// Payment via Stripe 
class StripeStrategy implements PaymentStrategy {
    
    private $customer_id;
	public function initStripe(string $cus_id) {
		$this->customer_id = $cus_id;
	}

	public function pay(int $amount) {
		echo $amount . "$ paid using Stripe with customer ID " . $this->customer_id;
	}
}

// Init shopping Cart
class ShoppingCart {
    private $totalPrice ;

    public function __construct($total_price) {
        $this->totalPrice = $total_price;
	}

	public function pay(PaymentStrategy $paymentMethod) {
		$paymentMethod->pay($this->totalPrice);
	}
}

echo "<h3>";
echo "Use Stripe Payment.<br>";
$Stripe_method = new StripeStrategy();
$Stripe_method->initStripe('6868686');
$product_1 = new ShoppingCart(1000);
$product_1->pay($Stripe_method);

echo "<br><br>";

echo "Use PayPal Payment.<br>";
$Paypal_method = new PaypalStrategy();
$Paypal_method->initPaypal('tonyteo@gmail.com', '12345');
$product_2 = new ShoppingCart(2000);
$product_2->pay($Paypal_method);

echo "</h3>";