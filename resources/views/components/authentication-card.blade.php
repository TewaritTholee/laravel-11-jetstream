<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
style="background: linear-gradient(to right, rgba(255, 111, 111, 0.5), rgba(255, 204, 110, 0.5), rgba(221, 221, 107, 0.5), rgba(255, 255, 255, 0.5));">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
