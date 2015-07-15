<?php
$this->assign('title', 'Giỏ hàng');
$this->assign('page', 'page1');
echo $this->Html->css(array('bootstrap.min','css'),array('block' => 'addcss'));
?>
    <div class="container">
          <div class="container"> <br>
        <ul class="breadcrumb">
              <a href="/">Home</a> / Shopping Cart
            </ul>
        <h1 class="spc">Shopping Cart</h1>
        <form action="/shop/cartupdate" id="ProductCartForm" method="post" accept-charset="utf-8">
              <div style="display:none;">
            <input name="_method" value="POST" type="hidden">
          </div>
              <hr>
              <div class="row">
            <div class="col col-sm-1">#</div>
            <div class="col col-sm-7">ITEM</div>
            <div class="col col-sm-1">PRICE</div>
            <div class="col col-sm-1">QUANTITY</div>
            <div class="col col-sm-1">SUBTOTAL</div>
            <div class="col col-sm-1">REMOVE</div>
          </div>
              <div class="row" id="row-9_0">
            <div class="col col-sm-1"><img src="images/forum-shepherd-snowboard-boots-brown.jpg" class="px60" alt=""></div>
            <div class="col col-sm-7"> <strong><a href="/product/forum-shepherd-snowboard-boots-brown">Forum Shepherd Snowboard Boots Brown</a></strong> <br>
                  <small></small> </div>
            <div class="col col-sm-1" id="price-9_0">114.95</div>
            <div class="col col-sm-1">
                  <input name="data[Product][quantity-9_0]" class="numeric form-control input-small" size="2" maxlength="2" tabindex="1" data-id="9" data-mods="" value="1" id="ProductQuantity-90" type="text">
                </div>
            <div class="col col-sm-1" id="subtotal_9_0">114.95</div>
            <div class="col col-sm-1"><a class="remove" id="9_0" href="/shop/remove/9_0" title="Remove item"><img src="images/icon-remove.gif" alt="Remove"></a></div>
          </div>
              <hr>
              <div class="row">
            <div class="col col-sm-12">
                  <div class="pull-right"> <a href="/shop/clear" class="btn btn-danger"><i class="icon-remove icon"></i> Clear Cart</a> &nbsp; &nbsp;
                <button class="btn btn-default" type="submit"><i class="icon-refresh icon"></i> Recalculate</button>
              </div>
                </div>
          </div>
            </form>
        <hr>
        <div class="row">
              <div class="col col-sm-12 pull-right tr"> Subtotal: <span class="normal" id="subtotal">$114.95</span> <br>
            <br>
            Sales Tax: <span class="normal">N/A</span> <br>
            <br>
            Shipping: <span class="normal">N/A</span> <br>
            <br>
            Order Total: <span class="red" id="total">$114.95</span> <br>
            <br>
            <a href="/shop/address" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-right"></i> Checkout</a> <br>
            <br>
            <form action="/shop/step1" id="ProductCartForm" method="post" accept-charset="utf-8">
                  <div style="display:none;">
                <input name="_method" value="POST" type="">
              </div>
                  <input name="submit" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" alt="Check out with PayPal" class="sbumit" align="top" border="0" type="image">
                </form>
          </div>
            </div>
        <br>
        <br>
        <br>
        <div id="msg"></div>
 </div>