<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="<?php echo e(asset('images/logo ankes.jpeg')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <title>TLM Harbas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/YOUR-KIT-CODE.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 text-white shadow-md">
      <div class="container mx-auto flex justify-between items-center">
        
        <a href="<?php echo e(route('dashboard.index')); ?>" class="text-2xl font-bold text-white hover:text-gray-300 transition">
          TLM-HB
        </a>

        
        <div class="ml-10 flex items-left space-x-4 relative" x-data="{ open: false }">
          <button @click="open = !open" class="text-white-700 hover:text-gray-300 font-medium">
            <?php echo e(Auth::user()->name); ?> ▼
          </button>
          
          <!-- Dropdown Menu -->
          <div x-show="open" @click.away="open = false" class="absolute top-10 right-0 bg-white shadow-md md w-48">
              <a href="<?php echo e(route('admin.index')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Data Admin</a>
              <a href="<?php echo e(route('pasien.index')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Data Pasien</a>
              <a href="<?php echo e(route('dokter.index')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Data Dokter</a>
              <a href="<?php echo e(route('pemeriksaan.index')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Data Pemeriksaan</a>
              <a href="<?php echo e(route('logout')); ?>" class="block px-4 py-2 text-red-700 hover:bg-red-100">Log out</a>
            
          </div>
        </div>

        
        <?php echo $__env->yieldContent('logout'); ?>
      </div>

    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-6">
      <?php echo $__env->yieldContent('content'); ?>
    </div>

</body>
</html>
<?php /**PATH C:\xampp-hb-web\htdocs\telm\resources\views/layouts/main.blade.php ENDPATH**/ ?>