<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Product List</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    body {
      background-color: #f5f5f5;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      padding: 40px 20px;
      position: relative;
    }
    
    .dashboard-button {
      position: absolute;
      top: 20px;
      left: 20px;
      background-color: #374151;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
    }
    
    .dashboard-button:hover {
      background-color: #1f2937;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(55, 65, 81, 0.3);
    }
    
    h1 {
      color: #333;
      margin-bottom: 15px;
      position: relative;
      padding-bottom: 12px;
      text-align: center;
    }
    
    h1:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 3px;
      background: linear-gradient(to right, #667eea, #764ba2);
    }
    
    .page-header {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
      max-width: 1200px;
      margin-bottom: 30px;
    }
    
    .create-button {
      margin-top: 15px;
      background: linear-gradient(to right, #667eea, #764ba2);
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 6px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
    }
    
    .create-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
    }
    
    .product-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 20px;
      width: 100%;
      max-width: 1200px;
    }
    
    .product-card {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      padding: 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: flex;
      flex-direction: column;
    }
    
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }
    
    .product-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }
    
    .product-info {
      flex-grow: 1;
    }
    
    .product-name {
      font-size: 18px;
      font-weight: 600;
      color: #333;
      margin-bottom: 5px;
      word-break: break-word;
    }
    
    .product-price {
      font-size: 16px;
      color: #6c63ff;
      font-weight: 700;
    }
    
    .product-image {
      width: 60px;
      height: 60px;
      background-color: #f3f4f6;
      border-radius: 8px;
      margin-left: 15px;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .product-image img {
      max-width: 100%;
      max-height: 100%;
      object-fit: cover;
    }
    
    .product-image-placeholder {
      color: #aaa;
      font-size: 24px;
    }
    
    .product-actions {
      display: flex;
      gap: 8px;
      justify-content: flex-end;
      margin-top: 5px;
    }
    
    .btn {
      padding: 8px 12px;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
      border: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
    }
    
    .btn-show {
      background-color: #3b82f6;
      color: white;
    }
    
    .btn-show:hover {
      background-color: #2563eb;
      transform: translateY(-2px);
    }
    
    .btn-edit {
      background-color: #10b981;
      color: white;
    }
    
    .btn-edit:hover {
      background-color: #059669;
      transform: translateY(-2px);
    }
    
    .btn-delete {
      background-color: #ef4444;
      color: white;
    }
    
    .btn-delete:hover {
      background-color: #dc2626;
      transform: translateY(-2px);
    }
    
    .empty-state {
      text-align: center;
      padding: 30px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }
    
    .empty-state p {
      color: #666;
      margin-bottom: 20px;
    }
    
    .add-product-btn {
      display: inline-block;
      background: linear-gradient(to right, #667eea, #764ba2);
      color: white;
      text-decoration: none;
      padding: 12px 24px;
      border-radius: 6px;
      font-weight: 600;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
      margin-top: 20px;
    }
    
    .add-product-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
    }
    
    @media (max-width: 768px) {
      .product-container {
        grid-template-columns: 1fr;
      }
      
      .product-actions {
        flex-wrap: wrap;
      }
      
      .btn {
        flex: 1;
        min-width: 80px;
      }
      
      .dashboard-button {
        position: static;
        margin-bottom: 20px;
        align-self: flex-start;
      }
    }
  </style>
</head>
<body>
  <a href="dashboard" class="dashboard-button">Back to Dashboard</a>
  
  <h1>Product List</h1>
  
  <div class="page-header">
    <a href="{{ route('products.create') }}" class="create-button">+ Create Product</a>
  </div>
  
  <div class="product-container">
    @forelse($products as $product)
      <div class="product-card">
        <div class="product-content">
          <div class="product-info">
            <div class="product-name">{{ $product->name }}</div>
            <div class="product-price">${{ number_format($product->price, 2) }}</div>
          </div>
          <div class="product-image">
            @if($product->image)
              <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @else
              <div class="product-image-placeholder">📷</div>
            @endif
          </div>
        </div>
        <div class="product-actions">
          <a href="{{ route('products.show', $product->id) }}" class="btn btn-show">Show</a>
          <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit">Edit</a>
          <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
          </form>
        </div>
      </div>
    @empty
      <div class="empty-state">
        <p>No products available yet.</p>
        <a href="{{ route('products.create') }}" class="add-product-btn">Add Your First Product</a>
      </div>
    @endforelse
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Add hover effect to cards
      const productCards = document.querySelectorAll('.product-card');
      
      productCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
          this.style.backgroundColor = '#fafafa';
        });
        
        card.addEventListener('mouseleave', function() {
          this.style.backgroundColor = '#ffffff';
        });
      });
      
      // Format prices (in case they aren't already formatted on the server)
      const prices = document.querySelectorAll('.product-price');
      prices.forEach(price => {
        const priceText = price.textContent;
        if (priceText && priceText.startsWith('$')) {
          const priceValue = parseFloat(priceText.substring(1));
          if (!isNaN(priceValue)) {
            price.textContent = '$' + priceValue.toFixed(2);
          }
        }
      });
      
      // Add confirmation for delete buttons
      const deleteForms = document.querySelectorAll('form');
      deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
          const confirmDelete = confirm('Are you sure you want to delete this product?');
          if (!confirmDelete) {
            e.preventDefault();
          }
        });
      });
    });
  </script>
</body>
</html>