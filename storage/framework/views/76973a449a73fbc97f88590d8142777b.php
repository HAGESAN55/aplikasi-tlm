<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <div class="flex justify-center mb-7">
            <img src="<?php echo e(asset('images/logo ankes.jpeg')); ?>" alt="Logo" width="150">
        </div>
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-1">SMK Harapan Bangsa</h2>
        <p class="text-2xl font-medium text-center text-gray-700 mb-5">REGISTRASI FORM</p>

        <?php if($errors->any()): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
                <label class="block text-gray-700">Nama</label>
                <input type="text" name="name" class="w-full p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Usename</label>
                <input type="text" name="username" class="w-full p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" class="w-full p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg">
                Daftar
            </button>
        </form>

        <p class="text-center text-gray-600 mt-4">
            Sudah punya akun? <a href="<?php echo e(route('login')); ?>" class="text-blue-500">Login</a>
        </p>
    </div>

</body>
</html>
<?php /**PATH C:\xampp-hb-web\htdocs\telm\resources\views/register.blade.php ENDPATH**/ ?>