<header id="nav-header"
    class="fixed top-0 left-0 right-0 z-50 px-10 py-4 w-full text-sm backdrop-blur-md bg-white/30 shadow-none transition-all duration-300 ease-in-out">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <h1 class="text-xl font-semibold text-blue-800">PT Bahtera Hasanah Agung</h1>
        <nav class="space-x-6">
            <a href="#home" class="text-blue-800 hover:text-blue-600 transition">Home</a>
            <a href="#about" class="text-blue-800 hover:text-blue-600 transition">About</a>
            <a href="#services" class="text-blue-800 hover:text-blue-600 transition">Services</a>
            <a href="#contact" class="text-blue-800 hover:text-blue-600 transition">Contact</a>
        </nav>
    </div>
</header>


<script>
    $(document).scroll(function() {
        const header = $('#nav-header');
        if ($(this).scrollTop() > 50) {
            header
                .removeClass('bg-white/30 shadow-none text-white')
                .addClass('bg-white shadow-md');
        } else {
            header
                .removeClass('bg-white shadow-md')
                .addClass('bg-white/30 shadow-none text-white');
        }
    });
</script>
