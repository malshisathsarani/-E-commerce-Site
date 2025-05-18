
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create Product</title>
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
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }
    
    .card {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 550px;
      padding: 30px;
      transition: transform 0.3s ease;
    }
    
    .card:hover {
      transform: translateY(-5px);
    }
    
    h2 {
      color: #333;
      margin-bottom: 25px;
      text-align: center;
      font-size: 24px;
      position: relative;
      padding-bottom: 10px;
    }
    
    h2:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 3px;
      background: linear-gradient(to right, #667eea, #764ba2);
    }
    
    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    
    label {
      color: #555;
      font-size: 14px;
      font-weight: 600;
      margin-bottom: -5px;
    }
    
    input, textarea {
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-size: 15px;
      transition: border 0.2s;
    }
    
    input:focus, textarea:focus {
      border-color: #6c63ff;
      outline: none;
    }
    
    textarea {
      resize: vertical;
      min-height: 120px;
    }
    
    input[type="file"] {
      padding: 10px 0;
      border: none;
    }
    
    button {
      background: linear-gradient(to right, #667eea, #764ba2);
      color: white;
      border: none;
      padding: 14px;
      border-radius: 6px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 10px;
      position: relative;
      overflow: hidden;
    }
    
    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
    }
    
    button:active {
      transform: translateY(1px);
    }
    
    .error {
      background-color: #fff5f5;
      color: #e53e3e;
      padding: 10px 15px;
      border-radius: 6px;
      border-left: 4px solid #e53e3e;
      margin: 10px 0;
    }
    
    .error ul {
      list-style-type: none;
      padding-left: 10px;
    }
    
    .error li {
      margin-bottom: 5px;
    }
    
    .field-container {
      position: relative;
    }
    
    .input-icon {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #aaa;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>Create Product</h2>
    
    <!-- Laravel Form Start -->
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      
      <div class="field-container">
        <label for="name">Product Name*</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required />
      </div>
      
      <div class="field-container">
        <label for="description">Description*</label>
        <textarea id="description" name="description" required>{{ old('description') }}</textarea>
      </div>
      
      <div class="field-container">
        <label for="price">Price (USD)*</label>
        <input type="number" id="price" name="price" min="0" step="0.01" value="{{ old('price') }}" required />
      </div>
      
      <div class="field-container">
        <label for="image">Image (Optional)</label>
        <input type="file" id="image" name="image" accept="image/*" />
      </div>
      
      @if ($errors->any())
        <div class="error">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      
      <button type="submit" id="submitBtn">Create Product</button>
    </form>
  </div>

  <script>
    // Simple form validation feedback
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.querySelector('form');
      const inputs = form.querySelectorAll('input[required], textarea[required]');
      
      inputs.forEach(input => {
        input.addEventListener('blur', function() {
          if (!this.value.trim()) {
            this.style.borderColor = '#e53e3e';
          } else {
            this.style.borderColor = '#ddd';
          }
        });
        
        input.addEventListener('focus', function() {
          this.style.borderColor = '#6c63ff';
        });
      });
      
      // Price input formatting
      const priceInput = document.getElementById('price');
      priceInput.addEventListener('input', function() {
        if (this.value && !isNaN(this.value)) {
          if (this.value < 0) this.value = 0;
        }
      });
      
      // Submit button animation
      const submitBtn = document.getElementById('submitBtn');
      submitBtn.addEventListener('mousedown', function() {
        this.style.transform = 'scale(0.98)';
      });
      
      submitBtn.addEventListener('mouseup', function() {
        this.style.transform = 'scale(1)';
      });
    });
  </script>
</body>
</html>