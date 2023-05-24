<?php
namespace App;
class Cart{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;
    public $coupons=null;
    public $couponPrice=0;

    public function __construct($cart){//Hàm dựng->khi người dùng tạo giỏ hàng thì sẽ truyền vào giỏ hàng hiện tại
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
            $this->coupons=$cart->coupons;
            $this->couponPrice=$cart->couponPrice;
        }
    }

    // Thêm vào giỏ hàng
    public function AddCart($product, $id){
        //tạo mới 1sp là 1 mảng
        $newProduct = ['quanty' => 0, 'price' => $product->price, 'productInfo' => $product];
        if($this->products){//nếu sp tồn tại
            if(array_key_exists($id, $this->products)){//Nếu sản phẩm có $id đã tồn tại
                $newProduct = $this->products[$id]; // sp mới tạo sẽ bằng chính sp vừa truyền vào
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty'] * ($product->price-$product->discount);
        $this->products[$id] = $newProduct;
        $this->totalPrice += ($product->price-$product->discount);
        $this->totalQuanty++;
    }

    public function DeleteItemCart($id){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    public function UpdateItemCart($id ,$quanty){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];

        $this->products[$id]['quanty'] = $quanty;
        $this->products[$id]['price'] = $quanty * ($this->products[$id]['productInfo']->price - $this->products[$id]['productInfo']->discount);

        $this->totalQuanty += $this->products[$id]['quanty'];
        $this->totalPrice += $this->products[$id]['price'];
    }
}


?>
