$(document).ready(function() {
    
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
                        }
                   },
                   async: false 
                 }); 


    //Handle Function for Add To Cart Functionality
    $('body').on("click", "button[name=addToCart]", function (){

        let productId = $(this).attr("value");
        let productDetail = products.filter(product => product.ProductID === productId)[0];

        if(!productDetail.hasOwnProperty("productCount")){
            productDetail.productCount = 1;
        }
        else if(productDetail.hasOwnProperty("productCount")){
            let previousProductCount = productDetail.productCount;
            productDetail.productCount = previousProductCount + 1;
        }

        let data = {
            product: JSON.stringify(productDetail)
        }

        console.log(data);
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
