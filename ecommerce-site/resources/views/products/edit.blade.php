<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Product</title>
  <style>
    :root {
      --primary-color: #4f46e5;
      --primary-dark: #4338ca;
      --secondary-color: #f3f4f6;
      --text-color: #1f2937;
      --light-text: #6b7280;
      --border-color: #e5e7eb;
      --error-color: #ef4444;
      --success-color: #10b981;
      --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    body {
      background-color: #f9fafb;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 2rem;
    }
    
    .card {
      background: white;
      border-radius: 12px;
      box-shadow: var(--card-shadow);
      width: 100%;
      max-width: 550px;
      padding: 2rem;
      transition: transform 0.3s ease;
    }
    
    .card:hover {
      transform: translateY(-5px);
    }
    
    .card h2 {
      color: var(--text-color);
      font-size: 1.5rem;
      margin-bottom: 1.5rem;
      padding-bottom: 0.75rem;
      border-bottom: 2px solid var(--secondary-color);
    }
    
    .field-container {
      margin-bottom: 1.5rem;
    }
    
    label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 500;
      color: var(--text-color);
    }
    
    input[type="text"],
    input[type="number"],
    textarea {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid var(--border-color);
      border-radius: 6px;
      font-size: 1rem;
      transition: border 0.3s ease, box-shadow 0.3s ease;
    }
    
    input[type="text"]:focus,
    input[type="number"]:focus,
    textarea:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
    }
    
    textarea {
      min-height: 120px;
      resize: vertical;
    }
    
    .file-input-container {
      position: relative;
    }
    
    .custom-file-input {
      border: 2px dashed var(--border-color);
      border-radius: 6px;
      padding: 1.5rem;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    
    .custom-file-input:hover {
      border-color: var(--primary-color);
      background-color: rgba(79, 70, 229, 0.05);
    }
    
    .custom-file-input i {
      font-size: 1.5rem;
      color: var(--primary-color);
      margin-bottom: 0.5rem;
    }
    
    input[type="file"] {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      cursor: pointer;
    }
    
    .current-image {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-top: 0.75rem;
      padding: 0.5rem;
      background-color: var(--secondary-color);
      border-radius: 6px;
    }
    
    .current-image img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 4px;
    }
    
    .error {
      background-color: rgba(239, 68, 68, 0.1);
      border-left: 4px solid var(--error-color);
      padding: 1rem;
      border-radius: 0 6px 6px 0;
      margin-bottom: 1.5rem;
    }
    
    .error ul {
      list-style-position: inside;
      color: var(--error-color);
    }
    
    button {
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 6px;
      padding: 0.75rem 1.5rem;
      font-size: 1rem;
      font-weight: 500;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 0.5rem;
    }
    
    button:hover {
      background-color: var(--primary-dark);
    }
    
    button:active {
      transform: scale(0.98);
    }
    
    .form-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 1rem;
    }
    
    .cancel-link {
      color: var(--light-text);
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }
    
    .cancel-link:hover {
      color: var(--text-color);
    }
    
    .validation-feedback {
      font-size: 0.875rem;
      margin-top: 0.25rem;
      color: var(--error-color);
      display: none;
    }
    
    .input-group {
      position: relative;
    }
    
    .price-symbol {
      position: absolute;
      left: 0.75rem;
      top: 0.75rem;
      color: var(--light-text);
    }
    
    .input-with-symbol {
      padding-left: 1.75rem !important;
    }
    
    /* Loading state for button */
    .loading .spinner {
      display: inline-block;
      width: 1rem;
      height: 1rem;
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-radius: 50%;
      border-top-color: white;
      animation: spin 0.8s ease infinite;
    }
    
    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }
    
    .loading-text {
      display: none;
    }
    
    button.loading .loading-text {
      display: inline;
    }
    
    button.loading .default-text {
      display: none;
    }
    
    /* Toast notification */
    .toast {
      position: fixed;
      top: 1rem;
      right: 1rem;
      background-color: white;
      border-left: 4px solid var(--success-color);
      padding: 1rem 1.5rem;
      border-radius: 6px;
      box-shadow: var(--card-shadow);
      display: flex;
      align-items: center;
      gap: 0.75rem;
      transform: translateX(150%);
      transition: transform 0.3s ease;
      z-index: 1000;
    }
    
    .toast.show {
      transform: translateX(0);
    }
    
    .toast.error {
      border-left-color: var(--error-color);
    }
    
    .toast-icon {
      color: var(--success-color);
      font-size: 1.25rem;
    }
    
    .toast.error .toast-icon {
      color: var(--error-color);
    }
    
    /* Responsive styles */
    @media (max-width: 640px) {
      .card {
        padding: 1.5rem;
      }
      
      .form-footer {
        flex-direction: column-reverse;
        gap: 1rem;
      }
      
      .cancel-link {
        width: 100%;
        text-align: center;
        padding: 0.75rem;
        border: 1px solid var(--border-color);
        border-radius: 6px;
      }
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>Edit Product</h2>
    
    <!-- Laravel Form Start -->
   <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
      @csrf
      @method('PUT')
      
      <div class="field-container">
        <label for="name">Product Name*</label>
        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required />
        <span class="validation-feedback" id="name-feedback"></span>
      </div>
      
      <div class="field-container">
        <label for="description">Description*</label>
        <textarea id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
        <span class="validation-feedback" id="description-feedback"></span>
      </div>
      
      <div class="field-container">
        <label for="price">Price (USD)*</label>
        <div class="input-group">
          <span class="price-symbol">$</span>
          <input type="number" id="price" name="price" min="0" step="0.01" value="{{ old('price', $product->price) }}" required class="input-with-symbol" />
        </div>
        <span class="validation-feedback" id="price-feedback"></span>
      </div>
      
      <div class="field-container">
        <label for="image">Product Image</label>
        <div class="file-input-container">
          <div class="custom-file-input">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--primary-color); margin-bottom: 8px;">
              <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
              <polyline points="17 8 12 3 7 8"></polyline>
              <line x1="12" y1="3" x2="12" y2="15"></line>
            </svg>
            <p>Click or drag to upload an image</p>
            <p style="font-size: 0.875rem; color: var(--light-text); margin-top: 0.5rem;">PNG, JPG or GIF up to 5MB</p>
          </div>
          <input type="file" id="image" name="image" accept="image/*" />
        </div>
        
        @if ($product->image)
        <div class="current-image">
          <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" />
          <div>
            <p style="font-weight: 500;">Current Image</p>
            <p style="font-size: 0.875rem; color: var(--light-text);">Upload a new image to replace</p>
          </div>
        </div>
        @endif
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
      
      <div class="form-footer">
        <a href="#" class="cancel-link" id="cancelBtn">Cancel</a>
        <button type="submit" id="submitBtn">
          <span class="spinner"></span>
          <span class="default-text">Update Product</span>
          <span class="loading-text">Updating...</span>
        </button>
      </div>
    </form>
  </div>
  
  <div class="toast" id="toast">
    <span class="toast-icon">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
        <polyline points="22 4 12 14.01 9 11.01"></polyline>
      </svg>
    </span>
    <div class="toast-content">
      <p id="toast-message">Product updated successfully!</p>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('productForm');
      const submitBtn = document.getElementById('submitBtn');
      const cancelBtn = document.getElementById('cancelBtn');
      const fileInput = document.querySelector('input[type="file"]');
      const fileLabel = document.querySelector('.custom-file-input p');
      const nameInput = document.getElementById('name');
      const descriptionInput = document.getElementById('description');
      const priceInput = document.getElementById('price');
      const toast = document.getElementById('toast');
      
      // File input handling
      fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
          const fileName = this.files[0].name;
          fileLabel.textContent = fileName;
          
          // Add selected class to show visual feedback
          document.querySelector('.custom-file-input').style.borderColor = 'var(--primary-color)';
          document.querySelector('.custom-file-input').style.backgroundColor = 'rgba(79, 70, 229, 0.05)';
        } else {
          fileLabel.textContent = 'Click or drag to upload an image';
        }
      });
      
      // Form validation
      function validateForm() {
        let isValid = true;
        
        // Validate name
        if (nameInput.value.trim() === '') {
          document.getElementById('name-feedback').textContent = 'Product name is required';
          document.getElementById('name-feedback').style.display = 'block';
          nameInput.style.borderColor = 'var(--error-color)';
          isValid = false;
        } else {
          document.getElementById('name-feedback').style.display = 'none';
          nameInput.style.borderColor = 'var(--border-color)';
        }
        
        // Validate description
        if (descriptionInput.value.trim() === '') {
          document.getElementById('description-feedback').textContent = 'Description is required';
          document.getElementById('description-feedback').style.display = 'block';
          descriptionInput.style.borderColor = 'var(--error-color)';
          isValid = false;
        } else {
          document.getElementById('description-feedback').style.display = 'none';
          descriptionInput.style.borderColor = 'var(--border-color)';
        }
        
        // Validate price
        if (priceInput.value === '' || parseFloat(priceInput.value) < 0) {
          document.getElementById('price-feedback').textContent = 'Please enter a valid price';
          document.getElementById('price-feedback').style.display = 'block';
          priceInput.style.borderColor = 'var(--error-color)';
          isValid = false;
        } else {
          document.getElementById('price-feedback').style.display = 'none';
          priceInput.style.borderColor = 'var(--border-color)';
        }
        
        return isValid;
      }
      
      // Input fields validation on blur
      nameInput.addEventListener('blur', function() {
        if (this.value.trim() === '') {
          document.getElementById('name-feedback').textContent = 'Product name is required';
          document.getElementById('name-feedback').style.display = 'block';
          this.style.borderColor = 'var(--error-color)';
        } else {
          document.getElementById('name-feedback').style.display = 'none';
          this.style.borderColor = 'var(--border-color)';
        }
      });
      
      descriptionInput.addEventListener('blur', function() {
        if (this.value.trim() === '') {
          document.getElementById('description-feedback').textContent = 'Description is required';
          document.getElementById('description-feedback').style.display = 'block';
          this.style.borderColor = 'var(--error-color)';
        } else {
          document.getElementById('description-feedback').style.display = 'none';
          this.style.borderColor = 'var(--border-color)';
        }
      });
      
      priceInput.addEventListener('blur', function() {
        if (this.value === '' || parseFloat(this.value) < 0) {
          document.getElementById('price-feedback').textContent = 'Please enter a valid price';
          document.getElementById('price-feedback').style.display = 'block';
          this.style.borderColor = 'var(--error-color)';
        } else {
          document.getElementById('price-feedback').style.display = 'none';
          this.style.borderColor = 'var(--border-color)';
        }
      });
      
      // Form submission
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!validateForm()) {
          return false;
        }
        
        // Show loading state
        submitBtn.classList.add('loading');
        
        // Simulate form submission with timeout
        setTimeout(function() {
          submitBtn.classList.remove('loading');
          
          // Show success toast
          toast.classList.add('show');
          
          // Hide toast after 3 seconds
          setTimeout(function() {
            toast.classList.remove('show');
          }, 3000);
          
          // In a real application, you would submit the form here
          // form.submit();
        }, 1500);
      });
      
      // Cancel button
      cancelBtn.addEventListener('click', function(e) {
        e.preventDefault();
        // In a real application, you would redirect back
        // window.location.href = "{{ route('products.index') }}";
        
        // For demo, just reset the form
        form.reset();
        
        // Show toast message
        document.getElementById('toast-message').textContent = 'Changes discarded';
        toast.classList.add('error');
        toast.classList.add('show');
        
        // Hide toast after 3 seconds
        setTimeout(function() {
          toast.classList.remove('show');
          toast.classList.remove('error');
        }, 3000);
      });
      
      // Auto-resize textarea
      descriptionInput.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
      });
      
      // Trigger once on load for pre-filled content
      setTimeout(function() {
        descriptionInput.style.height = 'auto';
        descriptionInput.style.height = (descriptionInput.scrollHeight) + 'px';
      }, 100);
    });
  </script>
</body>
</html>