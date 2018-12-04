$(document).ready(function() {
    let addToCartButtonCounter= 0;
    let products = [];
                //Load products from db
                $.ajax({
                   url: "products/load_products.php",
                   method:"GET",
                   success: (data) => {
                       if(data.includes("No Products to Load")){
                           alert("No Products to load");
                       }
                       if(Object.keys(data).length > 0){
                          
                          products = JSON.parse(data);
                          drawTables();
                        }
                   },
                   async: false 
                }); 
        
               
    //Render Products              
    function drawTables(){
        
        for(let key in Object.keys(products)){
            let divClass = '<div class="col-lg-3 col-md-3 col-sm-6"><div class="f_p_item"><div class="f_p_img">'
            let results = products[key];
            let productId = results["ProductID"];
            let productName = results["ProductName"];
            let productPrice = results["Price"];
            let imageName = results["ProductImage"];
            let imagDiv = '<img class="img-fluid" src="sachin_images/' + imageName.toLowerCase()  + '" alt="">'
            let addToCartFunction = "addToCart(" + productId +")";
            let cartIcon = '<div class="p_icon"><a href="#"><i class="lnr lnr-heart"></i></a><button name="addToCart" type="button" id="addToCart" value='+ productId + ' class="addToCart btn"><i class="lnr lnr-cart"></i></button></div></div>'
            let productNameDiv  = '<a href="#"><h4>' + productName + '</h4></a>';
            let priceDiv = "<h5>$" + productPrice + '.00</h5>';
            let endDiv = "</div></div>";
            let final = divClass  +imagDiv + cartIcon + productNameDiv + priceDiv + endDiv;
            $('#productsResults').append(final);
                     
        }
    }
    //Handle Function for Add To Cart Functionality
    $('body').on("click", "button[name=addToCart]", function (){
        addToCartButtonCounter++;
        let productId = $(this).attr("value");
        let detailedProduct = null;
        $.ajax({
            url: "products/fetch_product.php",
            method:"POST",
            data: {productId : productId},
            success: (data) => {
                if(data.includes("No Product Found")){
                    alert("Unable to add to to cart");
                }
                else  if(Object.keys(JSON.parse(data)).length > 0 ){
                    detailedProduct = JSON.parse(data)[0];   
                }
            },
            async: false 
         });
         
         if(!detailedProduct.hasOwnProperty("productCount")){
            detailedProduct.productCount = addToCartButtonCounter;
        }
        let data = {
            product: JSON.stringify(detailedProduct)
        }
        $.ajax({
            url: "cart/add_to_cart.php",
            method:"POST",
            data: data,
            success: (data) => {
                if(data.includes("Item Added To Cart")){
                    alert("Item Added To Cart");
                }
                else {
                    alert("Error occured");
                }
            },
            async: false 
         }); 
    });
});
