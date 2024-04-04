<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-ExDebug-ShopProductLoadingPage</title>
</head>

<body>
    <div class="mb-4">
        <h1 class="text-xl text-red-800 bg-red-100 text-center p-2">PHP-ExDebug-ShopProductLoadingPage</h1>
    </div>

    <div class="flex flex-wrap gap-4 justify-center">
        <?php
        $products = file_get_contents('products.json');
        //var_dump($products); // You can use var_dump method to debug. It is very useful
        foreach ($products as $product) {
            // Heredoc string
            echo <<<<PRODUCT
            <div class="max-w-sm rounded-xl overflow-hidden shadow-lg w-1/4 p-4">
                <img class="w-full p-12" src="$product->image_url" alt="Coke">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">$product->name</div>
                    <p class="text-gray-700 text-base">
                        Category: $product->main_category <br>
                        Sub Category: $product->sub_category <br>
                        Quantity: $product->quantity <br>
                        Price: PHP $products->price_php
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Beverages</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#SoftDrinks</span>
                </div>
            </div>
        PRODUCT;
        }
        ?>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>