<x-layout>
    <x-hero></x-hero>
   <x-blogs-section :blogs="$blogs" :categories="$categories" :currentCategory="$currentCategory??null"></x-blogs-section>
    <x-subscribe></x-subscribe>
</x-layout>    
