$(document).ready(function() {
    let addToCartButtonCounter= 0;
    
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
            url: "cart.php",
            method:"POST",
            data: data,
            success: (data) => {
                if(data.includes("Item Added To Cart")){
                    alert("Item " + detailedProduct.ProductID + " " + detailedProduct.ProductName + " is Added To Cart");
                }
                else {
                    alert("Error occured");
                }
            },
            async: false 
         }); 
    });
});
