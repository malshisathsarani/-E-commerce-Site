<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details - {{ $product->name }}</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f9f9f9;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      padding: 20px;
    }

    .product-card {
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      width: 100%;
      padding: 30px;
    }

    h1 {
      margin-bottom: 20px;
      color: #333;
      font-size: 28px;
    }

    .product-image {
    width: 300px;
    height: auto;
    border-radius: 8px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    display: block;
    margin-left: auto;
    margin-right: auto;
    }


    .product-detail {
      margin-bottom: 15px;
    }

    .label {
      font-weight: bold;
      color: #555;
    }

    .back-link {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 15px;
      background: linear-gradient(to right, #667eea, #764ba2);
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 600;
      transition: background 0.3s;
    }

    .back-link:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>
  <div class="product-card">
    <h1>{{ $product->name }}</h1>

    @if ($product->image)
      <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
    @endif

    <div class="product-detail">
      <span class="label">Description:</span>
      <p>{{ $product->description }}</p>
    </div>

    <div class="product-detail">
      <span class="label">Price:</span>
      <p>${{ number_format($product->price, 2) }}</p>
    </div>

    <a href="{{ route('products.index') }}" class="back-link">← Back to Products</a>
  </div>
</body>
</html>
