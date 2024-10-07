<template>
    <section class="py-10 bg-white">
        <div class="max-w-5xl mx-auto px-4">

            <CursiveWriting text="Discover beautiful ideas to make your wedding uniquely yours." header="Wedding Inspiration" />
            <br>

            <h2 class="text-2xl font-semibold mb-4">Themes & Styles</h2>
            <p class="text-gray-600 mb-6">
                Explore a variety of wedding themes, from classic elegance to bohemian chic. Find the style that resonates with your vision.
            </p>
            <ul class="list-disc list-inside text-gray-600 mb-6">
                <li>Rustic & Barn Weddings</li>
                <li>Beach & Destination Weddings</li>
                <li>Vintage & Retro Themes</li>
                <li>Modern Minimalist Designs</li>
            </ul>

            <h2 class="text-2xl font-semibold mb-4">Color Palettes</h2>
            <p class="text-gray-600 mb-6">
                Choosing the right colors can set the mood for your entire event. Here are some trending palettes to consider:
            </p>
            <ul class="list-disc list-inside text-gray-600 mb-6">
                <li>Soft Pastels: Blush, Mint, and Lavender</li>
                <li>Bold Jewel Tones: Emerald, Ruby, and Sapphire</li>
                <li>Earthy Neutrals: Beige, Terracotta, and Olive</li>
                <li>Classic Black & White</li>
            </ul>

            <h2 class="text-2xl font-semibold mb-4">Decoration Ideas</h2>
            <p class="text-gray-600 mb-6">
                From centerpieces to backdrops, decorations play a crucial role in creating the ambiance. Here are some ideas:
            </p>
            <ul class="list-disc list-inside text-gray-600 mb-6">
                <li>Floral Arrangements: Use seasonal blooms for a fresh look.</li>
                <li>Lighting: Fairy lights and lanterns create a magical atmosphere.</li>
                <li>Table Settings: Unique plates and utensils can elevate your dining experience.</li>
                <li>Photo Booths: Add fun with creative backdrops and props.</li>
            </ul>

            <h2 class="text-2xl font-semibold mb-4">Inspiration Galleries</h2>
            <p class="text-gray-600 mb-6">
                Browse our galleries to find stunning visuals that ignite your imagination. From bridal looks to reception setups, let these images inspire your choices.
            </p>

            <h2 class="text-2xl font-semibold mb-4">Real Weddings</h2>
            <p class="text-gray-600 mb-6">
                Get inspired by real couples who have shared their love stories. Explore their unique themes, personal touches, and creative ideas that made their day unforgettable.
            </p>
            <div class="flex flex-wrap gap-4 mb-6">
                <div class="w-full md:w-1/3">
                    <img src="https://via.placeholder.com/300" alt="Real Wedding 1" class="w-full rounded-lg shadow-md" />
                </div>
                <div class="w-full md:w-1/3">
                    <img src="https://via.placeholder.com/300" alt="Real Wedding 2" class="w-full rounded-lg shadow-md" />
                </div>
                <div class="w-full md:w-1/3">
                    <img src="https://via.placeholder.com/300" alt="Real Wedding 3" class="w-full rounded-lg shadow-md" />
                </div>
            </div>

            <h2 class="text-2xl font-semibold mb-4">Connect with Us</h2>
            <p class="text-gray-600 mb-6">
                Join our community on social media for daily inspiration and updates. Share your ideas and see what others are creating!
            </p>
            <p class="mt-8 text-lg font-semibold text-center">Happy Planning!</p>
        </div>
    </section>
</template>

<script setup>
// You can add any relevant logic here if needed
import CursiveWriting from "@/Components/CursiveWriting.vue";
</script>
