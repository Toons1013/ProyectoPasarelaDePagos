<h1>Inventario</h1>
    <div class="product-list">
        {{foreach productsNew}}
        <div class="product" data-productId="{{productId}}">
            <img src="{{productImgUrl}}" alt="{{productName}} " width="290" height="250">
            

            <h2>{{productName}}</h2>
            <p>{{productDescription}}</p>

            <span class="price">{{productPrice}}</span>
            <form action="index.php?page=checkout_checkout" method="post">
  <button type="submit">Place Order</button>
</form>
        </div>
        {{endfor productsNew}}
    </div>