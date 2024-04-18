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

    <div id="product-display" class="flex flex-wrap gap-4 justify-center">
        <?php
        $products = file_get_contents('products.json');
        $products = json_decode($products);

        //var_dump($products); // You can use var_dump method to debug. It is very useful
        foreach ($products as $product) {
            // Heredoc string
            echo <<<PRODUCT
            <div class="max-w-sm rounded-xl overflow-hidden shadow-lg w-1/4 p-4">
                <img class="w-full p-12" src="$product->image_url" alt="Coke">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">$product->name</div>
                    <p class="text-gray-700 text-base">
                        Category: $product->category <br>
                        Sub Category: $product->sub_category <br>
                        Quantity: $product->quantity <br>
                        Price: PHP $product->price_php <br>
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Category: $product->category</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#SubCategory: $product->sub_category</span>
                </div>
            </div>
            PRODUCT;
        }
        ?>
    </div>
    <div class="flex justify-center my-8 px-12">
        <button class="px-8 py-4 w-full rounded text-gray-50 bg-gray-800" onclick="loadMore();">Load
            More</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        function loadMore() {
            $.getJSON("products-2.json", function (data) {
                // console.log helps you debug as well.
                console.log(data);
                $.each(data, function (index,element) {
                    console.log(element);
                    $("#product-display").append(
                        `<div class="max-w-sm rounded-xl overflow-hidden shadow-lg w-1/4 p-4">
                            <img class="w-full p-12" src="${element.image_url}" alt="Coke">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">${element.name}</div>
                                <p class="text-gray-700 text-base">
                                    Category: ${element.category} <br>
                                    Sub Category: ${element.sub_category} <br>
                                    Quantity: ${element.quantity} <br>
                                    Price: PHP ${element.price_php} <br>
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Category: ${element.category}</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#SubCategory: ${element.sub_category}</span>
                            </div>
                        </div>`
                    );
                });
            });
        }
    </script>
</body>

</html>