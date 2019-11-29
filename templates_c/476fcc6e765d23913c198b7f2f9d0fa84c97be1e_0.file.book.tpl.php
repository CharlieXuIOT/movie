<?php
/* Smarty version 3.1.33, created on 2019-11-29 11:31:31
  from 'C:\xampp\htdocs\movie\templates\book.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de0f38301dcc4_99855600',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '476fcc6e765d23913c198b7f2f9d0fa84c97be1e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\movie\\templates\\book.tpl',
      1 => 1575023486,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5de0f38301dcc4_99855600 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- jquery -->
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>

    <!-- bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <?php echo '<script'; ?>
 src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="//code.jquery.com/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>

    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/book.css">

    <?php if (isset($_smarty_tpl->tpl_vars['tokenCheckFail']->value)) {?>
        <?php echo '<script'; ?>
 src="js/tokenCheckFail.js"><?php echo '</script'; ?>
>
    <?php }?>
    <?php echo '<script'; ?>
 src="js/navbar.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/book.js"><?php echo '</script'; ?>
>
</head>
<body>
<?php ob_start();
$_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>


<main>
    <div class="basket">
        <div class="basket-module">
            <label for="promo-code">Enter a promotional code</label>
            <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
            <button class="promo-code-cta">Apply</button>
        </div>
        <div class="basket-labels">
            <ul>
                <li class="item item-heading">Item</li>
                <li class="price">Price</li>
                <li class="quantity">Quantity</li>
                <li class="subtotal">Subtotal</li>
            </ul>
        </div>
        <div class="basket-product">
            <div class="item">
                <div class="product-image">
                    <img src="http://placehold.it/120x166" alt="Placholder Image 2" class="product-frame">
                </div>
                <div class="product-details">
                    <h1><strong><span class="item-quantity">4</span> x Eliza J</strong> Lace Sleeve Cuff Dress</h1>
                    <p><strong>Navy, Size 18</strong></p>
                    <p>Product Code - 232321939</p>
                </div>
            </div>
            <div class="price">26.00</div>
            <div class="quantity">
                <input type="number" value="4" min="1" class="quantity-field">
            </div>
            <div class="subtotal">104.00</div>
            <div class="remove">
                <button>Remove</button>
            </div>
        </div>
        <div class="basket-product">
            <div class="item">
                <div class="product-image">
                    <img src="http://placehold.it/120x166" alt="Placholder Image 2" class="product-frame">
                </div>
                <div class="product-details">
                    <h1><strong><span class="item-quantity">1</span> x Whistles</strong> Amella Lace Midi Dress</h1>
                    <p><strong>Navy, Size 10</strong></p>
                    <p>Product Code - 232321939</p>
                </div>
            </div>
            <div class="price">26.00</div>
            <div class="quantity">
                <input type="number" value="1" min="1" class="quantity-field">
            </div>
            <div class="subtotal">26.00</div>
            <div class="remove">
                <button>Remove</button>
            </div>
        </div>
    </div>
    <aside>
        <div class="summary">
            <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
            <div class="summary-subtotal">
                <div class="subtotal-title">Subtotal</div>
                <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
                <div class="summary-promo hide">
                    <div class="promo-title">Promotion</div>
                    <div class="promo-value final-value" id="basket-promo"></div>
                </div>
            </div>
            <div class="summary-delivery">
                <select name="delivery-collection" class="summary-delivery-selection">
                    <option value="0" selected="selected">Select Collection or Delivery</option>
                    <option value="collection">Collection</option>
                    <option value="first-class">Royal Mail 1st Class</option>
                    <option value="second-class">Royal Mail 2nd Class</option>
                    <option value="signed-for">Royal Mail Special Delivery</option>
                </select>
            </div>
            <div class="summary-total">
                <div class="total-title">Total</div>
                <div class="total-value final-value" id="basket-total">130.00</div>
            </div>
            <div class="summary-checkout">
                <button class="checkout-cta">Go to Secure Checkout</button>
            </div>
        </div>
    </aside>
</main>

</body>
</html><?php }
}
